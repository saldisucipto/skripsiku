<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyInfo;
use Illuminate\Support\Facades\Route;
use App\KatProduk;

class ProductController extends Controller
{
    // index Function
    function index(){
        $routeName = Route::getCurrentRoute()->uri();
        $companyInfo = CompanyInfo::get()->first();
        return view('backend.products.index',[
            'routeName' => $routeName,
            'companyInfo' => $companyInfo
        ]);
    }

    // category Index
    function catIndex(Request $create){
        if($create->isMethod('POST')){
            $data = $create->all();
            // handling image
            $image = $create->file('foto_kategori');
            $rename_image = preg_replace('/\s+/', '', $image->getClientOriginalName());
            $nama_image = "kat_produk_image"."-".time()."-".$rename_image;
            $path = "produk/images";
            $image->move($path, $nama_image);
            $createCatPro = new KatProduk;
            $createCatPro->nama_kategori = $data['nama_kategori'];
            $createCatPro->deskripsi_kategori = $data['deskripsi_kategori'];
            $createCatPro->foto_kategori = $nama_image;
            $createCatPro->link = str_slug($data['nama_kategori']);
            $createCatPro->save();
            return redirect()->back()->with('pesan_sukses', 'Berhasil Menambahkan Kategori Produk Baru');
        }
        $routeName = Route::getCurrentRoute()->uri();
        $companyInfo = CompanyInfo::get()->first();
        $category = KatProduk::get()->all();
        return view('backend.products.catindex',[
            'routeName' => $routeName,
            'companyInfo' => $companyInfo,
            'category' => $category
        ]);
    }
}
