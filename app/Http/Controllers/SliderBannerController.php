<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use File;
use App\BannerSlider;
use App\CompanyInfo;


class SliderBannerController extends Controller
{
    // index slider
    public function index(Request $create){
        if($create->isMethod('POST')){
            $data = $create->all();
            // dd($data);
            // die;
            // image handling
            $image = $create->file('images_slider');
            if($image){
                $nama_image = time()."-".$image->getClientOriginalName();
                $path = 'slider/';
                $image->move($path, $nama_image);
                $crateNew = new BannerSlider;
                $crateNew->title_slider = $data['title_slider'];
                $crateNew->deksripsi_slider = $data['description_slider'];
                $crateNew->link_slider = $data['link_slider'];
                $crateNew->image_slider = $nama_image;
                $crateNew->save();
                return redirect()->back()->with('pesan_sukses', 'Berhasil Menambhkan Slider Baru');
            }else{
                $crateNew = new BannerSlider;
                $crateNew->title_slider = $data['title_slider'];
                $crateNew->deksripsi_slider = $data['description_slider'];
                $crateNew->save();
                return redirect()->back()->with('pesan_sukses', 'Berhasil Menambhkan Slider Baru');
            }
        }
        $routeName = Route::getCurrentRoute()->uri();
        $companyInfo = CompanyInfo::get()->first();
        $bannerSlider = BannerSlider::get()->all();
        return view('backend.slider-banner.index',[
            'routeName' => $routeName,
            'companyInfo' => $companyInfo,
            'bannerSlider' => $bannerSlider,
        ]);
    }
    function update(Request $update, $id = null){
        if($update->isMethod('PUT')){
            $data = $update->all();
            $image = $update->file('images_slider');
            if($image){
                $hapusimagelama = BannerSlider::find($id);
                $image_path = public_path("\slider\\") .$hapusimagelama->image_slider;
                if(file_exists($image_path)) {
                    @unlink($image_path);
                }
                $nama_image = time()."-".$image->getClientOriginalName();
                $path = 'slider/';
                $image->move($path, $nama_image);
                $updateData = BannerSlider::find($id);
                $updateData->title_slider = $data['title_slider'];
                $updateData->deksripsi_slider = $data['description_slider'];
                $updateData->link_slider = $data['link_slider'];
                $updateData->image_slider = $nama_image;
                $updateData->save();
                return redirect()->back()->with('pesan_sukses', 'Berhasil Memperbharui Slider');
            }else{
                $updateData = BannerSlider::find($id);
                $updateData->title_slider = $data['title_slider'];
                $updateData->deksripsi_slider = $data['description_slider'];
                $updateData->link_slider = $data['link_slider'];
                $updateData->save();
                return redirect()->back()->with('pesan_sukses', 'Berhasil Memperbharui Slider');
            }

        }else{
            $deleteData = BannerSlider::find($id);
            $image_path = public_path("\slider\\") .$deleteData->image_slider;
            if(file_exists($image_path)) {
                @unlink($image_path);
                $deleteData->delete();
            }
            else{
                $deleteData->delete();
            }
            return redirect()->back()->with('pesan_sukses', 'Berhasil Menghapus Slider');
        }
    }
}
