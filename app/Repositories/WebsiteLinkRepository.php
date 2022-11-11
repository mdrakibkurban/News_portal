<?php

namespace App\Repositories;

use App\Interfaces\IWebsiteLinkRepository;
use App\Models\WebsiteLink;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class WebsiteLinkRepository extends BaseRepository implements IWebsiteLinkRepository
{
    public function __construct(WebsiteLink $model)
    {
        parent::__construct($model);
    }
    public function websiteLinkStore($request){
        try {
            $website = $this->model;
            $website->user_id = Auth::id();
            $website->website_name_en = $request->website_name_en;
            $website->website_name_bn = $request->website_name_bn;
            $website->website_link = $request->website_link;
            $website->save();
            Toastr::success('Website link create successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        } catch (\Throwable $th) {
            Toastr::error('somthing worng', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        }
    }   
    public function websiteLinkUpdate($request ,$id){
        try {
            $website = $this->myFind($id);
            $website->website_name_en = $request->website_name_en;
            $website->website_name_bn = $request->website_name_bn;
            $website->website_link = $request->website_link;
            $website->save();
            Toastr::success('Website link Update successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        } catch (\Throwable $th) {
            Toastr::error('somthing worng', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        }
    } 
}
