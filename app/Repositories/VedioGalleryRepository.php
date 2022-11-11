<?php

namespace App\Repositories;

use App\Interfaces\IVedioGalleryRepository;
use App\Models\VideoGallery;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class VedioGalleryRepository extends BaseRepository implements IVedioGalleryRepository
{

    public function __construct(VideoGallery $model)
    {
        parent::__construct($model);
    }

    public function vedioStore($request){
      
        try {
            $vedio = $this->model;
            $vedio->user_id    = Auth::id();
            $vedio->title_en   = $request->title_en;
            $vedio->title_bn   = $request->title_bn;
            $vedio->embed_code = $request->embed_code;
            $vedio->type       = $request->type;
            $vedio->save();
            Toastr::success('Vedio gallery create successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        } catch (\Throwable $th) {
            Toastr::error('something worng', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        } 
    }
    public function vedioUpdate($request,$id){
        try {
            $vedio = $this->myFind($id);
            $vedio->title_en   = $request->title_en;
            $vedio->title_bn   = $request->title_bn;
            $vedio->embed_code = $request->embed_code;
            $vedio->type       = $request->type;
            $vedio->save();
            Toastr::success('Vedio gallery update successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        } catch (\Throwable $th) {
            Toastr::error('something worng', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        } 
    }
}
