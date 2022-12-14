<?php

namespace App\Repositories;

use App\Interfaces\IBaseRepository;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BaseRepository implements IBaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function myGet(){
         return $this->model->latest()->get();
    }

    public function myFind($id){
        $data = $this->model->find($id);
        if(!$data){
            Toastr::error('Data not found', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
            return null;    
        }else{
            return $data;
        }    
    }

    public function myDelete($id){
        $data = $this->model->find($id);
        if($data->image){
            Storage::delete('public/news_images/'.$data->image); 
        }
        if($data){
            $data->delete(); 
        }else{
            Toastr::error('Data not found', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        }   
        
    }

    public function myStatus($request){
        $data = $this->model->find($request->id);
        $data->status = $request->status;
        $data->save();     
    }
}
