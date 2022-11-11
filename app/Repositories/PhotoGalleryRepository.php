<?php

namespace App\Repositories;

use App\Interfaces\IPhotoGalleryRepository;
use App\Models\PhotoGallery;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class PhotoGalleryRepository extends BaseRepository implements IPhotoGalleryRepository
{
    public function __construct(PhotoGallery $model)
    {
        parent::__construct($model);
    }

    public function photoStore($request){

        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $image_ex =   $image->getClientOriginalExtension();
            $file_path = date('ymdhis').'.'.  $image_ex;
            Image::make($image)->resize(300, 210); 
            $image->storeAs('photo_images', $file_path,'public');

        }else{
            $file_path = null;
        }
        try {
            $photo = $this->model;
            $photo->user_id = Auth::id();
            $photo->title_en = $request->title_en;
            $photo->title_bn = $request->title_bn;
            $photo->type     = $request->type;
            $photo->photo = $file_path;
            $photo->save();
            Toastr::success('photo gallery create successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        } catch (\Throwable $th) {
            Toastr::error('something worng', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        } 
    }

    public function photoUpdate($request,$id){

        $photo = $this->myFind($id);
        if(!$photo){
            return false;
        }

        if($request->hasFile('photo')){
            if ($photo->photo) {
                Storage::delete('public/photo_images/' . $photo->photo);
            }
            $image = $request->file('photo');
            $image_ex =   $image->getClientOriginalExtension();
            $file_path = date('ymdhis').'.'. $image_ex;
            Image::make($image)->resize(300, 210); 
            $image->storeAs('photo_images', $file_path,'public');
        }else{
            $file_path = $photo->photo;
        }

        try {
            $photo->title_en = $request->title_en;
            $photo->title_bn = $request->title_bn;
            $photo->type     = $request->type;
            $photo->photo    = $file_path;
            $photo->save();
            Toastr::success('photo gallery Update successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        } catch (\Throwable $th) {
            Toastr::error($th->getMessage(), 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        } 
    }
}
