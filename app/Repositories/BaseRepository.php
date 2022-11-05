<?php

namespace App\Repositories;

use App\Interfaces\IBaseRepository;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Database\Eloquent\Model;

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
        if($data){
            $data->delete(); 
        }else{
            Toastr::error('Data not found', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        }   
        
    }
}
