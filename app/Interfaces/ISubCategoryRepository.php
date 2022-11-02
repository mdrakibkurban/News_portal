<?php

namespace App\Interfaces;

interface ISubCategoryRepository extends IBaseRepository
{
    public function subCategoryStore($request);    
    public function subCategoryUpdate($request ,$id);   
    public function subCategoryStatus($request);
}
