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
use App\Order;
use App\MetodePembayaran;
use App\Invoice;
use App\TransaksiPengiriman;
use DB;

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
        $createOrder = new Order;
        $createOrder->id_pengiriman = $data['id_pengiriman'];
        $createOrder->id_customer = $data['id_customer'];
        $createOrder->catatan = $data['catatan'];
        $createOrder->sub_total = $data['sub_total'];
        $createOrder->ppn = $data['ppn'];
        $createOrder->total = $data['total'];
        $createOrder->save();
        $id_lastOrder = Order::all()->last()->id_order;
        $id_trksi_order = TransaksiOrder::all()->where('id_order', null);
        $id_trksi_orders = [];
        foreach ($id_trksi_order as $item) {
            $id_trksi_orders[] = $item->id_trksi_order;
        }
        DB::table('transaksi_orders')->whereIn('id_trksi_order', $id_trksi_orders)->update(array('id_order' => $id_lastOrder));
        return response()->json('Succes', 200);
    }

    // get count Order
    public function getCountOrder($id_customer)
    {
        $data = Order::where('id_customer', $id_customer)->where('id_invoice', null)->count();
        return response()->json($data, 200);
    }

    // order show
    public function OrderShow($id_customer)
    {
        $routeName = Route::getCurrentRoute()->uri();
        $companyInfo = CompanyInfo::get()->first();
        $navigasi = Navigasi::with('parent')->get();
        $parentNav = ParentNavigasi::with('navigasi')->get()->all();
        $data = Order::with('pengiriman')->where('id_customer', $id_customer)->where('id_invoice', null)->get();
        // dd($data);
        // die;
        $metode_pembayaran = MetodePembayaran::all();
        return view('frontend.order.order-show', [
            'routeName' => $routeName,
                'companyInfo' => $companyInfo,
                'parentNav' => $parentNav,
                'navigasi' => $navigasi,
                'data' => $data,
                'metode_pembayaran' => $metode_pembayaran
           ]);
    }

    public function makeInvoice(Request $request, $id_customer = null)
    {
        $data = $request->all();
        $amount = preg_replace('/[Rp.]/', '', $data['total_amount']);
        $newInvoice = new Invoice;
        $newInvoice->id_metode_pembayaran = $data['id_metode_pembayaran'];
        $newInvoice->id_customer = $data['id_customer'];
        $newInvoice->jumlah_pembayaran = $amount;
        $newInvoice->tanggal = $data['tanggal'];
        $newInvoice->save();

        // get the last order id
        $id_INVOICE = Invoice::all()->last()->id_invoice;
        $id_ORDER = Order::where('id_customer', $id_customer)->where('id_invoice', null)->get();
        $list_ORDER = [];
        foreach ($id_ORDER as $item) {
            $list_ORDER[] = $item->id_order;
        }
        DB::table('orders')->whereIn('id_order', $list_ORDER)->update(array('id_invoice' => $id_INVOICE));

        return response()->json($data, 200);
    }


    public function backendOrders(Request $request)
    {
        $routeName = Route::getCurrentRoute()->uri();
        $companyInfo = CompanyInfo::get()->first();
        $list_ORDER = Order::with('pengiriman', 'customer', 'transaksi')->get();
        // dd($list_ORDER);
        // die;
        return view('backend.order.index', [
            'routeName' => $routeName,
            'companyInfo' => $companyInfo,
            'list_ORDER' => $list_ORDER,
        ]);
    }

    // count invoice
    public function countInv($id_customer)
    {
        $data = Invoice::where('id_customer', $id_customer)->where('terverifikasi', 0)->get()->count();
        return response()->json($data);
    }
    public function checkout($id_customer)
    {
        $routeName = Route::getCurrentRoute()->uri();
        $companyInfo = CompanyInfo::get()->first();
        $navigasi = Navigasi::with('parent')->get();
        $parentNav = ParentNavigasi::with('navigasi')->get()->all();
        $data = Invoice::with('pembayaran')->where('id_customer', $id_customer)->get();
        // dd($data);
        // die;
        return view('frontend.checkout.index', [
            'routeName' => $routeName,
            'companyInfo' => $companyInfo,
            'parentNav' => $parentNav,
            'navigasi' => $navigasi,
            'data' => $data
        ]);
    }

    public function pembayaran(Request $request, $id_invoice = null)
    {
        if ($request->isMethod('PUT')) {
            $data = $request->all();
            $dataUpdate = Invoice::find($id_invoice);
            $dataUpdate->id_user = $data['id_user'];
            $dataUpdate->verify_by = $dataUpdate['nama_user'];
            $dataUpdate->tanggal_verifikasi = date(Y-m-d);
            $dataUpdate->save();
            return response()->json("done");
        }
        $routeName = Route::getCurrentRoute()->uri();
        $companyInfo = CompanyInfo::get()->first();
        $navigasi = Navigasi::with('parent')->get();
        $parentNav = ParentNavigasi::with('navigasi')->get()->all();
        $data = Invoice::with('pembayaran')->get();
        return view('backend.pembayaran.listInvoice', [
            'routeName' => $routeName,
            'companyInfo' => $companyInfo,
            'parentNav' => $parentNav,
            'navigasi' => $navigasi,
            'data' => $data
        ]);
    }
    public function verifikasi(Request $request, $id_invoice = null)
    {
        $data = $request->all();
        $dataUpdate = Invoice::find($id_invoice);
        $dataUpdate->id_user = $data['id_user'];
        $dataUpdate->verify_by = $data['nama_user'];
        $dataUpdate->terverifikasi = 1;
        $dataUpdate->tanggal_verifikasi = date('Y-m-d');
        $dataUpdate->save();
        return response()->json("done");
    }

    public function prosesPengiriman()
    {
        $routeName = Route::getCurrentRoute()->uri();
        $companyInfo = CompanyInfo::get()->first();
        $navigasi = Navigasi::with('parent')->get();
        $parentNav = ParentNavigasi::with('navigasi')->get()->all();
        $data = Invoice::with('pembayaran')->get();
        return view('backend.pengiriman.list-pengiriman', [
            'routeName' => $routeName,
            'companyInfo' => $companyInfo,
            'parentNav' => $parentNav,
            'navigasi' => $navigasi,
            'data' => $data,
        ]);
    }

    public function createPengiriman(Request $create, $id_invoice=null)
    {
        if ($create->isMethod('POST')) {
            $data = $create->all();

            $createPengiriman = new TransaksiPengiriman;
            $createPengiriman->id_user = $data['id_user'];
            $createPengiriman->id_invoice = $data['id_invoice'];
            $createPengiriman->id_customer = $data['id_customer'];
            $createPengiriman->catatan_pengiriman = $data['catatan_pengiriman'];
            $createPengiriman->save();
            return redirect()->back()->with('pesan_sukses', 'Berhasil Membuat Pengiriman');
        }
        $routeName = Route::getCurrentRoute()->uri();
        $companyInfo = CompanyInfo::get()->first();
        $navigasi = Navigasi::with('parent')->get();
        $parentNav = ParentNavigasi::with('navigasi')->get()->all();
        $data = Invoice::find($id_invoice);
        return view('backend.pengiriman.create', [
            'routeName' => $routeName,
            'companyInfo' => $companyInfo,
            'parentNav' => $parentNav,
            'navigasi' => $navigasi,
            'data' => $data,
        ]);
    }
}
