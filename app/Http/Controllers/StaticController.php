<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyInfo;
use App\BannerSlider;

class StaticController extends Controller
{
    // index welcome
    function welcome(){
        $companyInfo = CompanyInfo::get()->first();
        $slider = BannerSlider::get()->all();
        return view('welcome', [
            'companyInfo' => $companyInfo,
            'slider' => $slider
        ]);
    }
}
