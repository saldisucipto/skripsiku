<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyInfo;
use Illuminate\Support\Facades\Route;
use App\MetodePembayaran;

class MetodePembayaranController extends Controller
{
    // index
    public function index(Request $create)
    {
        if ($create->isMethod('POST')) {
            $data = $create->all();
            $newMethod = new MetodePembayaran;
            $newMethod->nama_metode = $data['nama_metode'];
            $newMethod->account_number = $data['account_number'];
            $newMethod->save();
            return redirect('/account-number')->with('pesan_sukses', 'Berhasil Menambahkan Metode Pembayaran Baru');
        }
        $routeName = Route::getCurrentRoute()->uri();
        $companyInfo = CompanyInfo::get()->first();
        $data = MetodePembayaran::all();
        return view('backend.pembayaran.index', [
            'routeName' => $routeName,
            'companyInfo' => $companyInfo,
            'data' => $data
        ]);
    }

    // update
    public function update(Request $update, $id = null)
    {
        if ($update->isMethod('PUT')) {
            $data = $update->all();
            $updateData = MetodePembayaran::find($id);
            $updateData->nama_metode = $data['nama_metode'];
            $updateData->account_number = $data['account_number'];
            $updateData->save();
            return redirect('/account-number')->with('pesan_sukses', 'Berhasil Memperbaharui Metode Pembayaran');
        } else {
            $updateData = MetodePembayaran::find($id);
            $updateData->delete();
            return redirect()->back()->with('pesan_sukses', 'Berhasil Menghapus Metode Pembayaran');
            ;
        }
    }
}
