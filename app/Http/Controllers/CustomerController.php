<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;

use App\CompanyInfo;
use App\Navigasi;
use App\ParentNavigasi;
use App\Customers;

// use Hash;

class CustomerController extends Controller
{

    // index
    public function index(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validate = $request->validate([
            'nama_lengkap' => ['required', 'string', 'min:2'],
            'username' => ['required', 'string', 'max:255', 'unique:customers'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
            'password' => ['required', 'string', 'min:8'],
            ]);
            $data = $request->all();
            // dd($data);
            // die;
            $register = new Customers;
            $register->nama_lengkap = $data['nama_lengkap'];
            $register->email = $data['email'];
            $register->username = $data['username'];
            $register->password = Hash::make($data['password']);
            $register->save();
            return redirect()->back()->with('sukses', 'Check Email Anda Untuk Verifikasi Akun !');
        }

        $routeName = Route::getCurrentRoute()->uri();
        $companyInfo = CompanyInfo::get()->first();
        $navigasi = Navigasi::with('parent')->get();
        $parentNav = ParentNavigasi::with('navigasi')->get()->all();
        return view('frontend.registrasi.index', [
            'routeName' => $routeName,
            'companyInfo' => $companyInfo,
            'parentNav' => $parentNav,
            'navigasi' => $navigasi,
        ]);
    }

    public function customers()
    {
        // return "customers page";
        $routeName = Route::getCurrentRoute()->uri();
        $companyInfo = CompanyInfo::get()->first();
        $navigasi = Navigasi::with('parent')->get();
        $parentNav = ParentNavigasi::with('navigasi')->get()->all();
        $customer = Customers::get()->all();
        return view('backend.customers.index', [
            'routeName' => $routeName,
            'companyInfo' => $companyInfo,
            'parentNav' => $parentNav,
            'navigasi' => $navigasi,
            'customer' => $customer
        ]);
    }

    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {
            // if (auth()->guard('customer')->check()) {
            //     return redirect(route('beranda'));
            // }
            // return redirect('/');

            // Validasi Data yang diterima
            $this->validate($request, [
            'email' => 'required|email|exists:customers,email',
            'password' => 'required|string'
            ]);
            //CUKUP MENGAMBIL EMAIL DAN PASSWORD SAJA DARI REQUEST
            //KARENA JUGA DISERTAKAN TOKEN
            // $auth = $request->only('email', 'password');
            // $auth['active'] = 1; //TAMBAHKAN JUGA STATUS YANG BISA LOGIN HARUS 1


            //CHECK UNTUK PROSES OTENTIKASI
            // //DARI GUARD CUSTOMER, KITA ATTEMPT PROSESNYA DARI DATA $AUTH
            // if (auth()->guard('customer')->attempt($auth)) {
            //     //JIKA BERHASIL MAKA AKAN DIREDIRECT KE DASHBOARD
            //     // dd(auth()->guard('customer')->check());
            //     // die;
            //     return redirect()->intended(route('beranda'));
            // }
            if (Auth::guard('customer')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
                //Authentication passed...
                return redirect()
                    ->intended(route('beranda'))
                    ->with('status', 'You are Logged in as Admin!');
            }

            //JIKA GAGAL MAKA REDIRECT KEMBALI BERSERTA NOTIFIKASI
            return redirect()->back()->with(['error' => 'Email / Password Salah']);
        } else {
            $routeName = Route::getCurrentRoute()->uri();
            $companyInfo = CompanyInfo::get()->first();
            $navigasi = Navigasi::with('parent')->get();
            $parentNav = ParentNavigasi::with('navigasi')->get()->all();
            return view('frontend.login.index', [
                'routeName' => $routeName,
                'companyInfo' => $companyInfo,
                'parentNav' => $parentNav,
                'navigasi' => $navigasi,
            ]);
        }
    }
}
