<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LiveTv;
use App\Models\Namaz;
use App\Models\Seo;
use App\Models\Setting;
use App\Models\Social;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class SettingController extends Controller
{
     public function socialSetting(){
         $data['social'] = Social::first();
         return view('admin.setting.social',$data);
     }

     public function socialSettingUpdate(Request $request, $id){
          $social            = Social::find($id);
          $social->facebook  = $request->facebook;
          $social->twitter   = $request->twitter;
          $social->youtube   = $request->youtube;
          $social->instagram = $request->instagram;
          $social->linkedin  = $request->linkedin;
          $social->save();
          Toastr::success('Social setting update successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
          return redirect()->back();
     }


    public function seoSetting(){
        $data['seo'] = Seo::first();
        return view('admin.setting.seo',$data);
    }

    public function seoSettingUpdate(Request $request, $id){
         $seo                      = Seo::find($id);
         $seo->meta_author         = $request->meta_author;
         $seo->meta_title          = $request->meta_title;
         $seo->meta_keyword        = $request->meta_keyword;
         $seo->meta_description    = $request->meta_description;
         $seo->google_analytics    = $request->google_analytics;
         $seo->google_verification = $request->google_verification;
         $seo->alexa_analytics     = $request->alexa_analytics;
         $seo->save();
         Toastr::success('Seo setting update successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
         return redirect()->back();
    }


    public function namazTime(){
        $data['namaz'] = Namaz::first();
        return view('admin.setting.namaz',$data);
    }

    public function namazTimeUpdate(Request $request, $id){
         $namaz          = Namaz::find($id);
         $namaz->fojor_en    = $request->fojor_en;
         $namaz->johr_en    = $request->johr_en;
         $namaz->asor_en    = $request->asor_en;
         $namaz->magrib_en  = $request->magrib_en;
         $namaz->esha_en    = $request->esha_en;
         $namaz->jummah_en  = $request->jummah_en;
         $namaz->fojor_bn   = $request->fojor_bn;
         $namaz->johr_bn    = $request->johr_bn;
         $namaz->asor_bn    = $request->asor_bn;
         $namaz->magrib_bn  = $request->magrib_bn;
         $namaz->esha_bn    = $request->esha_bn;
         $namaz->jummah_bn  = $request->jummah_bn;
         $namaz->save();
         Toastr::success('Prayer time update successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
         return redirect()->back();
    }



    public function livetvSetting(){
        $data['livetv'] = LiveTv::first();
        return view('admin.setting.livetv',$data);
    }

    public function livetvSettingUpdate(Request $request, $id){
         $livetv             = LiveTv::find($id);
         $livetv->embed_code = $request->embed_code;
         $livetv->save();
         Toastr::success('Embed_code update successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
         return redirect()->back();
    }

    public function status(Request $request){
         $livetv = LiveTv::find($request->id);
         $livetv->status = $request->status;
         $livetv->save();
         return response()->json([
            'success' =>true,
            'message' => "livetv status"
        ]); 

    }

    public function setting(){
        $data['setting'] = Setting::first();
        return view('admin.setting.setting',$data);
    }

    public function settingUpdate(Request $request, $id){
        $setting             = Setting::find($id);
        if($request->hasFile('logo')){
            if ($setting->logo) {
                Storage::delete('public/website_image/' . $setting ->image);
            }
            $logo = $request->file('logo');
            $logo_ex =  $logo->getClientOriginalExtension();
            $file_path = date('ymdhis').'.'.$logo_ex;
            Image::make($logo)->resize(320, 130); 
            $logo->storeAs('website_image', $file_path,'public');
        }else{
            $file_path = $setting->image;
        }
        $setting->email      = $request->email;
        $setting->address_en = $request->address_en;
        $setting->address_bn = $request->address_bn;
        $setting->phone_en   = $request->phone_en;
        $setting->phone_en   = $request->phone_en;
        $setting->address_en = $request->address_en;
        $setting-> copy_right = $request->copy_right;
        $setting->logo       =  $file_path;
        $setting->save();
        Toastr::success('Setting update successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        return redirect()->back();
    }
}
