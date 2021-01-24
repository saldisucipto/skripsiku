<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\CompanyInfo;
use App\BannerSlider;
use App\Navigasi;
use App\ParentNavigasi;

class StaticController extends Controller
{
    // index welcome
    function welcome(){
        $routeName = Route::getCurrentRoute()->uri();
        $companyInfo = CompanyInfo::get()->first();
        $slider = BannerSlider::get()->all();
        $navigasi = Navigasi::with('parent')->get();
        $parentNav = ParentNavigasi::with('navigasi')->get()->all();
        return view('welcome', [
            'routeName' => $routeName,
            'companyInfo' => $companyInfo,
            'slider' => $slider,
            'parentNav' => $parentNav,
            'navigasi' => $navigasi
        ]);
    }
}
