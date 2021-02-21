<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyInfo;
use Illuminate\Support\Facades\Route;
use App\MetodePengiriman;

class MetodePengirimanController extends Controller
{
    // index
    public function index(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->all();
            // create
            $itemBaru = new MetodePengiriman;
            $itemBaru->nama_pengiriman = $data['nama_pengiriman'];
            $itemBaru->jarak_pengiriman = $data['jarak_pengiriman'];
            if ($data['jarak_pengiriman'] == 'jabodetabek') {
                $itemBaru->harga_pengiriman = 250000;
            } else {
                $itemBaru->harga_pengiriman = 500000;
            }
            $itemBaru->save();
            return redirect('/metode-pengiriman')->with('pesan_sukses', 'Berhasil Menambahkan Metode Pengiriman Baru');
        }
        $routeName = Route::getCurrentRoute()->uri();
        $companyInfo = CompanyInfo::get()->first();
        $data = MetodePengiriman::all();
        return view('backend.pengiriman.index', [
            'routeName' => $routeName,
            'companyInfo' => $companyInfo,
            'data' => $data
        ]);
    }

    // update
    public function update(Request $request, $id = null)
    {
        if ($request->isMethod('PUT')) {
            $data = $request->all();
            $itemUpdate = MetodePengiriman::find($id);
            $itemUpdate->nama_pengiriman = $data['nama_pengiriman'];
            $itemUpdate->jarak_pengiriman = $data['jarak_pengiriman'];
            if ($data['jarak_pengiriman'] == 'jabodetabek') {
                $itemUpdate->harga_pengiriman = 250000;
            } else {
                $itemUpdate->harga_pengiriman = 500000;
            }
            $itemUpdate->save();
            return redirect('/metode-pengiriman')->with('pesan_sukses', 'Berhasil Memperbaharui Pengiriman');
        } elseif ($request->isMethod('GET')) {
            $itemUpdate = MetodePengiriman::find($id);
            $itemUpdate->delete();
            return redirect('/metode-pengiriman')->with('pesan_sukses', 'Berhasil Menghapus Pengiriman');
        }
    }
}
