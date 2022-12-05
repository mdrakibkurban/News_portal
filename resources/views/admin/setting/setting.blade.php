@extends('admin.layouts.app')
@section('title','Website Setting')
@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Website Setting</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Website Setting</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->  
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Website Setting Update</h3>
            </div>
            <form action="{{ route('admin.setting.update',$setting->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fajr_en">Website Logo</label>
                                 <input type="file" name="logo">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" value="{{ $setting->email }}" name="email" id="email">
                            </div>
                        </div>

                       
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address_en">Address English</label>
                                <input type="text" class="form-control" value="{{ $setting->address_en }}" name="address_en" id="address_en">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address_bn">Address Bangla</label>
                                <input type="text" class="form-control" value="{{ $setting->address_bn }}" name="address_bn" id="address_bn">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone_en">Phone English</label>
                                <input type="text" class="form-control" value="{{ $setting->phone_en }}" name="phone_en" id="phone_en">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone_bn">Phone Bangla</label>
                                <input type="text" class="form-control" value="{{ $setting->phone_bn }}" name="phone_bn" id="phone_bn">
                            </div>
                        </div>
                        
                    </div>
                  
                    <div class="form-group">
                       <label for="copy_right">Copy Right</label>
                        <input type="text" class="form-control" value="{{ $setting->copy_right }}" name="copy_right" id="copy_right">
                    </div>
                   
                    
                </div>
    
                <div class="card-footer">
                    <button type="submit" class="btn btn-info float-right">Update</button>
                </div>
            </form>
            
          </div>
    </div>
  </div>
@endsection



