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
}
