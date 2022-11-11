<?php

namespace App\Interfaces;

interface IPhotoGalleryRepository extends IBaseRepository
{
     public function photoStore($request);   
     public function photoUpdate($request,$id);
}
