<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CustomerLoginController extends Controller
{
    // //
    // public function __construct()
    // {
    //     $this->middleware('auth:customer');
    // }

    public function loginCustomer(Request $request)
    {
        if (Auth::guard('customer')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            //Authentication passed...
            // return response()->json(Auth::guard('customer')->attempt($request->only('email', 'password'), $request->filled('remember')));
            // die;
            return redirect('/')->with('status', 'You are Logged in as Admin!');
        } else {
            return response()->json(Auth::guard('customer')->attempt($request->only('email', 'password'), $request->filled('remember')));
        }
    }
}
