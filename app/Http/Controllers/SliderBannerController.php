<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class SliderBannerController extends Controller
{
    // index slider
    public function index(){
        $routeName = Route::getCurrentRoute()->uri();
        return view('backend.slider-banner.index',[
            'routeName' => $routeName,
        ]);
    }
}
