<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\CompanyInfo;
use App\BannerSlider;
use App\Navigasi;
use App\ParentNavigasi;
use App\KatProduk;
use App\Produk;

class StaticController extends Controller
{
    // index welcome
    function welcome(){
        $routeName = Route::getCurrentRoute()->uri();
        $companyInfo = CompanyInfo::get()->first();
        $slider = BannerSlider::get()->all();
        $navigasi = Navigasi::with('parent')->get();
        $parentNav = ParentNavigasi::with('navigasi')->get()->all();
        $categoryproduct = KatProduk::get()->all();
        // $produk = Produk::get()->all();
        $produk = Produk::orderBy('created_at', 'desc')->paginate(6);
        $produkrecomended = Produk::inRandomOrder()->limit(3)->get();
        return view('welcome', [
            'routeName' => $routeName,
            'companyInfo' => $companyInfo,
            'slider' => $slider,
            'parentNav' => $parentNav,
            'navigasi' => $navigasi,
            'categoryproduct' => $categoryproduct,
            'produk' => $produk,
            'produkrecomended' => $produkrecomended,
        ]);
    }
}
