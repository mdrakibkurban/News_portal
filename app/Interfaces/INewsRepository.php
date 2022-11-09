<?php

namespace App\Interfaces;

interface INewsRepository extends IBaseRepository
{
    public function newsStore($request);
    public function newsUpdate($request,$id);
}
