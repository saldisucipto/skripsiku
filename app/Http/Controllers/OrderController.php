<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\CompanyInfo;
use App\Navigasi;
use App\ParentNavigasi;
use App\Produk;
use App\TransaksiOrder;
use App\MetodePengiriman;

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

    public function tambahKeranjang(Request $request)
    {
        $data = $request->all();
        $newTrksiOrder = new TransaksiOrder;
        $newTrksiOrder->id_produk = $data['id_produk'];
        $newTrksiOrder->id_customer = $data['id_customer'];
        $newTrksiOrder->qty_orders = $data['qtyorder'];
        $newTrksiOrder->save();
        return response()->json('success', 200);
    }

    public function keranjang($id_customers)
    {
        $data = TransaksiOrder::with('produk')->where('id_customer', $id_customers)->where('id_order', null)->get();
        // dd($data);
        // die;
        $routeName = Route::getCurrentRoute()->uri();
        $companyInfo = CompanyInfo::get()->first();
        $navigasi = Navigasi::with('parent')->get();
        $parentNav = ParentNavigasi::with('navigasi')->get()->all();
        $pengiriman = MetodePengiriman::get()->all();
        return view('frontend.order.transaksi-order', [
        'routeName' => $routeName,
            'companyInfo' => $companyInfo,
            'parentNav' => $parentNav,
            'navigasi' => $navigasi,
            'data' => $data,
            'pengiriman' => $pengiriman
       ]);
    }

    public function getPengiriman($id=null)
    {
        $id_metode_pengiriman = $id;
        $pengiriman = MetodePengiriman::find($id_metode_pengiriman);
        return response()->json($pengiriman);
    }

    public function deleteItemKeranjang($id)
    {
        $Item = TransaksiOrder::find($id);
        $Item->delete();
        return response()->json('berhasil di japus', 200);
    }

    public function makeOrder(Request $create)
    {
        $data = $create->all();
        return response()->json($data, 200);
    }
}
