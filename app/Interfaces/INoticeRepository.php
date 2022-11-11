<?php

namespace App\Interfaces;

interface INoticeRepository extends IBaseRepository
{
    public function noticeStore($request);    
    public function noticeUpdate($request ,$id);  
}
