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
use App\TransaksiOrder;
use App\Order;
use App\Invoice;

class StaticController extends Controller
{
    // index welcome
    public function welcome()
    {
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

    public function produkShow($slug)
    {
        $routeName = Route::getCurrentRoute()->uri();
        $companyInfo = CompanyInfo::get()->first();
        $produkDetail = Produk::where('slug', $slug)->with('kategori')->first();
        $parentNav = ParentNavigasi::with('navigasi')->get()->all();
        $navigasi = Navigasi::with('parent')->get();
        // dd($produkDetail);
        // die;
        return view('produk-show', [
            'routeName' => $routeName,
            'companyInfo' => $companyInfo,
            'parentNav' => $parentNav,
            'navigasi' => $navigasi,
            'produkDetail' => $produkDetail
        ]);
    }

    // function get keranjang
    public function getCountKeranjang($id_customer)
    {
        $countKerjang = TransaksiOrder::where('id_customer', $id_customer)->where('id_order', null)->get()->count();
        return response()->json($countKerjang, 200);
    }

    // function checkout
    public function invoice($id_invoice)
    {
        //
        $invoice = Invoice::with('customer')->find($id_invoice);
        $data = Order::with('transaksi')->where('id_invoice', $id_invoice)->get();
        $companyInfo = CompanyInfo::get()->first();
        // dd($data);
        // die;
        return view('invoice', [
            'companyInfo' => $companyInfo,
            'data' => $data,
            'invoice' => $invoice
        ]);
    }
}
