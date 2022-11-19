<?php

namespace App\Interfaces;

interface IDivisionRepository extends IBaseRepository
{
    public function divisionStore($request);    
    public function divisionUpdate($request ,$id);  
}
