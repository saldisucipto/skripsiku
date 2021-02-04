<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyInfo;
use Illuminate\Support\Facades\Route;
use App\KatProduk;
use App\Produk;

class ProductController extends Controller
{
    // index Function
    function index(){
        $routeName = Route::getCurrentRoute()->uri();
        $companyInfo = CompanyInfo::get()->first();
        $kategori = KatProduk::get()->all();
        $produk = Produk::with('kategori')->get()->all();
        // dd($produk);
        // die;
        return view('backend.products.index',[
            'routeName' => $routeName,
            'companyInfo' => $companyInfo,
            'kategori' => $kategori,
            'produk' => $produk
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

    // create
    function productCreate(Request $create){
        $data = $create->all();
        // dd($data);
        // die;
        $image = $create->file('foto_produk');
        $rename_image = preg_replace('/\s+/', '',$image->getClientOriginalName());
        $nama_image = "foto-produk"."-".time()."-".$rename_image;
        $path = "produk/images";
        $image->move($path, $nama_image);

        // proses
        $produkBaru = new Produk;
        $produkBaru->id_kategori = $data['id_kategori'];
        $produkBaru->nama_produk = $data['nama_produk'];
        $produkBaru->deskripsi_produk = $data['deskripsi_produk'];
        $produkBaru->foto_produk = $nama_image;
        $produkBaru->harga_produk = $data['harga_produk'];
        $produkBaru->part_number = $data['part_number'];
        $produkBaru->stok_barang = $data['stok_barang'];
        $produkBaru->save();
        return redirect()->back()->with('pesan_sukses', 'Berhasil Menambahkan Produk Baru');
    }

    // update
    function productUpdate(Request $update, $id_produk = null){
        $data = $update->all();
        $image = $update->file('foto_produk');
        // dd($data);
        // die;
        if($image){
            $hapusimagelama = Produk::find($id_produk);
            $image_path = public_path("produk\images\\") .$hapusimagelama->foto_produk;
            if(file_exists($image_path)) {
                @unlink($image_path);
            }
            $rename_image = preg_replace('/\s+/', '',$image->getClientOriginalName());
            $nama_image = "foto-produk"."-".time()."-".$rename_image;
            $path = "produk/images";
            $image->move($path, $nama_image);

            // proses
            $updateProduk = Produk::find($id_produk);
            $updateProduk->id_kategori = $data['id_kategori'];
            $updateProduk->nama_produk = $data['nama_produk'];
            $updateProduk->deskripsi_produk = $data['deskripsi_produk'];
            $updateProduk->foto_produk = $nama_image;
            $updateProduk->harga_produk = $data['harga_produk'];
            $updateProduk->part_number = $data['part_number'];
            $updateProduk->stok_barang = $data['stok_barang'];
            $updateProduk->save();
            return redirect()->back()->with('pesan_sukses', 'Berhasil Update Produk');
        }
            $updateProduk = Produk::find($id_produk);
            $updateProduk->id_kategori = $data['id_kategori'];
            $updateProduk->nama_produk = $data['nama_produk'];
            $updateProduk->deskripsi_produk = $data['deskripsi_produk'];
            $updateProduk->harga_produk = $data['harga_produk'];
            $updateProduk->part_number = $data['part_number'];
            $updateProduk->stok_barang = $data['stok_barang'];
            $updateProduk->save();
            return redirect()->back()->with('pesan_sukses', 'Berhasil Update Produk');
    }
}
