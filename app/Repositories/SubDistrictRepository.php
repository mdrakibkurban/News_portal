<?php

namespace App\Repositories;

use App\Interfaces\ISubDistrictRepository;
use App\Models\SubDistrict;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class SubDistrictRepository extends BaseRepository implements ISubDistrictRepository
{
    public function __construct(SubDistrict $model)
    {
        parent::__construct($model);
    }

    public function subDistrictStore($request){
        
        try {
          $subDistrict = $this->model;
          $subDistrict->user_id = Auth::id();
          $subDistrict-> subdistrict_en = $request->subdistrict_en;
          $subDistrict-> subdistrict_bn = $request->subdistrict_bn;
          $subDistrict-> district_id    = $request->district_id;
          $subDistrict->save();
          Toastr::success('SubDistrict create successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        } catch (\Throwable $th) {
            Toastr::error('somthing worng', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        }
    }

    public function subDistrictUpdate($request,$id){
        try {
            $subDistrict = $this->myFind($id);
            $subDistrict->user_id = Auth::id();
            $subDistrict-> subdistrict_en = $request->subdistrict_en;
            $subDistrict-> subdistrict_bn = $request->subdistrict_bn;
            $subDistrict-> district_id    = $request->district_id;
            $subDistrict->save();
            Toastr::success('SubDistrict update successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        } catch (\Throwable $th) {
            Toastr::error('somthing worng', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        }
    }
}
