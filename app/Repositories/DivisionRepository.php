<?php

namespace App\Repositories;

use App\Interfaces\IDivisionRepository;
use App\Models\Division;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class DivisionRepository extends BaseRepository implements IDivisionRepository
{
    public function __construct(Division $model)
    {
        parent::__construct($model);
    }

    public function divisionStore($request){
          try {
            $division = $this->model;
            $division->user_id = Auth::id();
            $division->name_en = $request->name_en;
            $division->name_bn = $request->name_bn;
            $division->save();
            Toastr::success('Division create successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
          } catch (\Throwable $th) {
            Toastr::error('somthing worng', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
          }
         
    }   
    public function divisionUpdate($request ,$id){
         try {
            $division = $this->myFind($id);
            $division->name_en = $request->name_en;
            $division->name_bn = $request->name_bn;
            $division->save();
            Toastr::success('Division Update successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
         } catch (\Throwable $th) {
            Toastr::error('somthing worng', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
         }
        
    }  
}
