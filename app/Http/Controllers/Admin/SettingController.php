<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LiveTv;
use App\Models\Namaz;
use App\Models\Seo;
use App\Models\Social;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
         $namaz->fajr    = $request->fajr;
         $namaz->johr    = $request->johr;
         $namaz->asor    = $request->asor;
         $namaz->magrib  = $request->magrib;
         $namaz->esha    = $request->esha;
         $namaz->jummah  = $request->jummah;
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
}
