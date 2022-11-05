<?php

namespace App\Repositories;

use App\Interfaces\ICategoryRepository;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class CategoryRepository extends BaseRepository implements ICategoryRepository
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function categoryStore($request){
        try {
            $category = $this->model;
            $category->user_id = Auth::id();
            $category->name_en = $request->name_en;
            $category->name_bn = $request->name_bn;
            $category->status = $request->status;
            $category->save();
            Toastr::success('Category create successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        } catch (\Throwable $th) {
            Toastr::error('somthing worng', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        }
    } 

    public function categoryUpdate($request,$id){   
            try {
                $category = $this->myFind($id);
                $category->user_id = Auth::id();
                $category->name_en = $request->name_en;
                $category->name_bn = $request->name_bn;
                $category->status = $request->status;
                $category->save();
                Toastr::success('Category Update successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
            } catch (\Throwable $th) {
                Toastr::error('somthing worng', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
            }
    }

    public function categoryStatus($request){
          $category = $this->myFind($request->id);
          $category->status = $request->status;
          $category->save();
    }

}
