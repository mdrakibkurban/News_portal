<?php

namespace App\Repositories;

use App\Interfaces\IDistrictRepository;
use App\Models\District;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class DistrictRepository extends BaseRepository implements IDistrictRepository
{
    public function __construct(District $model)
    {
        parent::__construct($model);
    }

    public function districtStore($request){
          try {
            $district = $this->model;
            $district->user_id = Auth::id();
            $district->district_en = $request->district_en;
            $district->district_bn = $request->district_bn;
            $district->save();
            Toastr::success('District create successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
          } catch (\Throwable $th) {
            Toastr::error('somthing worng', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
          }
         
    }   
    public function districtUpdate($request ,$id){
         try {
            $district = $this->myFind($id);
            $district->district_en = $request->district_en;
            $district->district_bn = $request->district_bn;
            $district->save();
            Toastr::success('District Update successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
         } catch (\Throwable $th) {
            Toastr::error('somthing worng', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
         }
        
    }  
}
