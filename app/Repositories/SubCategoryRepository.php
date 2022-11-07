<?php

namespace App\Repositories;

use App\Interfaces\ISubCategoryRepository;
use App\Models\SubCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class SubCategoryRepository extends BaseRepository implements ISubCategoryRepository
{
    public function __construct(SubCategory $model)
    {
        parent::__construct($model);
    }

    public function subCategoryStore($request){
        try {
            $subCategory = $this->model;
            $subCategory->name_en = $request->name_en;
            $subCategory->name_bn = $request->name_bn;
            $subCategory->user_id = Auth::id();
            $subCategory->category_id = $request->category_id;
            $subCategory->status = $request->status;
            $subCategory->save();
            Toastr::success('SubCategory Create successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        } catch (\Throwable $th) {
            Toastr::error('somthing worng', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        }
    }   
    public function subCategoryUpdate($request ,$id){
        try {
            $subCategory = $this->myFind($id);
            $subCategory->name_en = $request->name_en;
            $subCategory->name_bn = $request->name_bn;
            $subCategory->user_id = Auth::id();
            $subCategory->category_id = $request->category_id;
            $subCategory->status = $request->status;
            $subCategory->save();
            Toastr::success('SubCategory Create successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        } catch (\Throwable $th) {
            Toastr::error('somthing worng', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        }
    } 
    
}
