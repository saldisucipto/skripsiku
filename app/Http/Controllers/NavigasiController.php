<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyInfo;
use Illuminate\Support\Facades\Route;
use App\ParentNavigasi;
use App\Navigasi;


class NavigasiController extends Controller
{
    // index function
    function index(){
        $companyInfo = CompanyInfo::get()->first();
        $routeName = Route::getCurrentRoute()->uri();
        $parentNav = ParentNavigasi::get()->all();
        $nav = Navigasi::with('parent')->get();
        return view('backend.navigasi.index',[
            'routeName' => $routeName,
            'companyInfo' => $companyInfo,
            'parentNav' => $parentNav,
            'nav' => $nav
        ]);
    }

    // Parent Navigasi
    function craetaParentNav(Request $create){
        $data = $create->all();

        $parentNav = new ParentNavigasi;
        $parentNav->title = $data['title'];
        $parentNav->link = str_slug($data['title']);
        $parentNav->save();
        return redirect()->back()->with('pesan_sukses', 'Berhasil Parent Navigasi');
    }

    // edit Parent Navigasi 
    function editNav(Request $update, $id = null){
        $data = $update->all();
        dd($data);
        die;
    }

    // navigasi 
    function createNav(Request $create){
        $data = $create->all();

        $nav = new Navigasi;
        $nav->title = $data['title'];
        $nav->id_parent = $data['id_parent'];
        $nav->link = str_slug($data['title']);
        $nav->save();
        return redirect()->back()->with('pesan_sukses', 'Berhasil Membuat Navigasi Baru');
    }
}
