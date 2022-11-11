<?php

namespace App\Interfaces;

interface IWebsiteLinkRepository extends IBaseRepository
{
    public function websiteLinkStore($request);    
    public function websiteLinkUpdate($request ,$id); 
}
