<?php

namespace App\Interfaces;

interface ICategoryRepository extends IBaseRepository
{ 
    public function categoryStore($request);    
    public function categoryUpdate($request ,$id);   
    public function categoryStatus($request);  
   
}
