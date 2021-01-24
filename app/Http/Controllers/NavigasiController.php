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
    function updateParentNav(Request $update, $id = null){
        $data = $update->all();
        if($update->isMethod('PUT')){
            $updateNav = ParentNavigasi::find($id);
            $updateNav->title = $data['title'];
            $updateNav->link = $data['link'];
            $updateNav->save();
            return redirect()->back()->with('pesan_sukses', 'Berhasil Update Navigasi');
        }elseif($update->isMethod('GET')){
            $updateNav = ParentNavigasi::find($id);
            $updateNav->delete();
            return redirect()->back()->with('pesan_sukses', 'Berhasil Hapus Data');
        }
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

    // update nav
    function updateNav(Request $update, $id = null){
        $data = $update->all();
        if($update->isMethod('PUT')){
            $navUpdate = Navigasi::find($id);
            $navUpdate->title = $data['title'];
            $navUpdate->id_parent = $data['id_parent'];
            $navUpdate->link = $data['link'];
            $navUpdate->save();
            return redirect()->back()->with('pesan_sukses', 'Berhasil Memperbaharui Navigasi');
        }elseif($update->isMethod('GET')){
            $navDel = Navigasi::find($id);
            $navDel->delete();
            return redirect()->back();
        }
    }
}
