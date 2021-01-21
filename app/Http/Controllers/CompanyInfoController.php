<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\CompanyInfo;

class CompanyInfoController extends Controller
{
    // Index Function
    public function index(){
        $routeName = Route::getCurrentRoute()->uri();
        $companyInfo = CompanyInfo::get()->first();
        // dd($companyInfo);
        // die;
        return view('backend.company.index',[
            'routeName'=>$routeName,
            'companyInfo' => $companyInfo
        ]);
    }

    // Edit Function
    public function edit(Request $edit, $id = null){
        $data = $edit->all();
        // dd($data);
        // die;
        // logo handling
        $logo1 = $edit->file('logo1');
        $logo2 = $edit->file('logo2');
        if($logo1 || $logo2){
            $nama_logo1 = time()."-".$logo1->getClientOriginalName();
            $path = 'company-info/image';
            $logo1->move($path, $nama_logo1);
            $nama_logo2 = time()."-".$logo2->getClientOriginalName();
            $path = 'company-info/image';
            $logo2->move($path, $nama_logo2);

            $save = CompanyInfo::find($id);
            $save->nama_perushaan = $data['nama_perusahaan'];
            $save->nomor_telepon = $data['nomor_telepon'];
            $save->email = $data['email'];
            $save->alamat_perusahaan = $data['alamat_perusahaan'];
            $save->logo1 = $nama_logo1;
            $save->logo2 = $nama_logo2;
            $save->save();
            return redirect()->back();
        }else{
            $save = CompanyInfo::find($id);
            $save->nama_perushaan = $data['nama_perusahaan'];
            $save->nomor_telepon = $data['nomor_telepon'];
            $save->email = $data['email'];
            $save->alamat_perusahaan = $data['alamat_perusahaan'];
            $save->save();
            return redirect()->back();
        }
    }
}
