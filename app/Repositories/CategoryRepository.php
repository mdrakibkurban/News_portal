<?php

namespace App\Repositories;

use App\Interfaces\ICategoryRepository;
use App\Models\Category;
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
            $category->name = $request->name;
            $category->status = $request->status;
            $category->save();
            flash('Category Create successfully')->success();
        } catch (\Throwable $th) {
            flash($th->getMessage())->error();
        }
    } 

    public function categoryUpdate($request,$id){   
            try {
                $category = $this->myFind($id);
                $category->user_id = Auth::id();
                $category->name = $request->name;
                $category->status = $request->status;
                $category->save();
                flash('Category Update Successfully')->success();
            } catch (\Throwable $th) {
                flash($th->getMessage())->error();
            }
    }

    public function categoryStatus($request){
          $category = $this->myFind($request->id);
          $category->status = $request->status;
          $category->save();
    }

}
