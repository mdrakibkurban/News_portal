<?php

namespace App\Interfaces;

interface IDistrictRepository extends IBaseRepository
{
    public function districtStore($request);    
    public function districtUpdate($request ,$id);  
}
