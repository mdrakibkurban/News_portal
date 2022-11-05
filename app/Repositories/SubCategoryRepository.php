<?php

namespace App\Repositories;

use App\Interfaces\ISubCategoryRepository;
use App\Models\SubCategory;
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
            flash('Sub-Category create successfully')->success();
        } catch (\Throwable $th) {
            flash($th->getMessage())->error();
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
            flash('Sub-Category Update successfully')->success();
        } catch (\Throwable $th) {
            flash($th->getMessage())->error();
        }
    } 
    
    public function subCategoryStatus($request){
        $category = $this->myFind($request->id);
        $category->status = $request->status;
        $category->save();
    }
}
