<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\CompanyInfo;
use App\Navigasi;
use App\ParentNavigasi;
use App\Produk;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
    }

    public function trksiOrder(Request $request)
    {
        $data = $request->all();
        $id_produk = $data['id_produk'];
        // dd($data);
        // die;
        $routeName = Route::getCurrentRoute()->uri();
        $companyInfo = CompanyInfo::get()->first();
        $navigasi = Navigasi::with('parent')->get();
        $parentNav = ParentNavigasi::with('navigasi')->get()->all();
        $produkOrder = Produk::find($id_produk);
        return view('frontend.order.transaksi-order', [
            'routeName' => $routeName,
            'companyInfo' => $companyInfo,
            'parentNav' => $parentNav,
            'navigasi' => $navigasi,
            'produkOrder' => $produkOrder
        ]);
    }
}
