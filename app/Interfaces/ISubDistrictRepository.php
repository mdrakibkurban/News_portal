<?php

namespace App\Interfaces;

interface ISubDistrictRepository extends IBaseRepository
{
   public function subDistrictStore($request);
   public function subDistrictUpdate($request,$id);
}
