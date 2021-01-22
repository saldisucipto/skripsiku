<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyInfo;
use Illuminate\Support\Facades\Route;


class NavigasiController extends Controller
{
    // index function
    function index(){
        $companyInfo = CompanyInfo::get()->first();
        $routeName = Route::getCurrentRoute()->uri();
        return view('backend.navigasi.index',[
            'routeName' => $routeName,
            'companyInfo' => $companyInfo,
        ]);
    }
}
