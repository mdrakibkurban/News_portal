<?php

namespace App\Repositories;

use App\Interfaces\INoticeRepository;
use App\Models\Notice;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class NoticeRepository extends BaseRepository implements INoticeRepository
{
    public function __construct(Notice $model)
    {
        parent::__construct($model);
    }

    public function noticeStore($request){
        try {
            $notice = $this->model;
            $notice->user_id = Auth::id();
            $notice->notice_en = $request->notice_en;
            $notice->notice_bn = $request->notice_bn;
            $notice->status = $request->status;
            $notice->save();
            Toastr::success('Notice create successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        } catch (\Throwable $th) {
            Toastr::error('somthing worng', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        }
    } 

    public function noticeUpdate($request,$id){   
            try {
                $notice = $this->myFind($id);
                $notice->notice_en = $request->notice_en;
                $notice->notice_bn = $request->notice_bn;
                $notice->status = $request->status;
                $notice->save();
                Toastr::success('Notice Update successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
            } catch (\Throwable $th) {
                Toastr::error('somthing worng', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
            }
    }
}
