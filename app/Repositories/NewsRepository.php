<?php

namespace App\Repositories;

use App\Interfaces\INewsRepository;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class NewsRepository extends BaseRepository implements INewsRepository
{

    public function __construct(News $model)
    {
        parent::__construct($model);
    }

    public function newsStore($request){

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_ex =  $image->getClientOriginalExtension();
            $file_path = date('ymdhis').'.'.$image_ex;
            Image::make($image)->resize(500, 310); 
            $image->storeAs('news_images', $file_path,'public');
        }else{
            $file_path = null;
        }

        try {
            $news                       = $this->model;
            $news->user_id              = Auth::id();
            $news->category_id          = $request->category_id;
            $news->subcategory_id       = $request->subcategory_id;
            $news->division_id          = $request->division_id;
            $news->district_id          = $request->district_id;
            $news->news_en              = $request->news_en;
            $news->news_bn              = $request->news_bn;
            $news->des_en               = $request->des_en;
            $news->des_bn               = $request->des_bn;
            $news->tags_en              = $request->tags_en;
            $news->tags_bn              = $request->tags_bn;
            $news->status               = $request->status;
            $news->headline             = $request->headline;
            $news->first_section_big    = $request->first_section_big;
            $news->first_section_small  = $request->first_section_small;
            $news->others_section_big   = $request->others_section_big;
            $news->others_section_small = $request->others_section_small;
            $news->news_date            = date('d-m-Y');
            $news->news_month           = date('F');
            $news->news_time            = date('h:s');
            $news->image                =  $file_path;
            $news->save();
            Toastr::success('News create successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
            
        } catch (\Throwable $th) {
            Toastr::error('somthing worng', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        }
    }

    public function newsUpdate($request,$id){
     
            $news = $this->myFind($id);
            if(!$news){
                return false;
            }

            if($request->hasFile('image')){
                if ($news->image) {
                    Storage::delete('public/news_images/' . $news->image);
                }
                $image = $request->file('image');
                $image_ex =  $image->getClientOriginalExtension();
                $file_path = date('ymdhis').'.'.$image_ex;
                Image::make($image)->resize(500, 310); 
                $image->storeAs('news_images', $file_path,'public');
            }else{
                $file_path = $news->image;
            }

        try {
            $news->category_id          = $request->category_id;
            $news->subcategory_id       = $request->subcategory_id;
            $news->division_id          = $request->division_id;
            $news->district_id          = $request->district_id;
            $news->news_en              = $request->news_en;
            $news->news_bn              = $request->news_bn;
            $news->des_en               = $request->des_en;
            $news->des_bn               = $request->des_bn;
            $news->tags_en              = $request->tags_en;
            $news->tags_bn              = $request->tags_bn;
            $news->status               = $request->status;
            $news->headline             = $request->headline;
            $news->first_section_big    = $request->first_section_big;
            $news->first_section_small  = $request->first_section_small;
            $news->others_section_big   = $request->others_section_big;
            $news->others_section_small = $request->others_section_small;
            $news->news_date            = date('d-m-Y');
            $news->news_month           = date('F');
            $news->news_time            = date('h:s');
            $news->image                =  $file_path;
            $news->save();
            Toastr::success('News Update successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
            
        } catch (\Throwable $th) {
            Toastr::error('somthing worng', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        }
    }


}
