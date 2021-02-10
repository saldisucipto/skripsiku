<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\CompanyInfo;
use App\Navigasi;
use App\ParentNavigasi;
use App\Customers;
use Auth;

class CustomerLoginController extends Controller
{
    // menggunkan constructtor customer
    // cusntructor
    // public function __cosntructor()
    // {
    //     $this->middleware('guest:customer');
    // }


    public function showLoginForm()
    {
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

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        // cek login
        // $data = $request->all();
        // dd($data);
        // die;
        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect(route('beranda'));
        }
        // jika gagal
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/');
    }
}
