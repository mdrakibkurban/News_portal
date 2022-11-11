<?php

namespace App\Interfaces;

interface IVedioGalleryRepository extends IBaseRepository
{
    public function vedioStore($request);   
    public function vedioUpdate($request,$id);
}
