@extends('admin.layouts.app')
@section('title','Payer Time')
@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Prayer Time</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Prayer Time</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->  
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Prayer Time Update</h3>
            </div>
            <form action="{{ route('admin.namaz.update',$namaz->id)}}" method="post">
                @csrf
                @method('put')
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fajr_en">Fajr English</label>
                                <input type="text" class="form-control" value="{{ $namaz->fajr_en }}" name="fajr_en" id="fajr_en">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fajr_bn">Fajr Bangla</label>
                                <input type="text" class="form-control" value="{{ $namaz->fajr_bn }}" name="fajr_bn" id="fajr_bn">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="johr_en">Johr English</label>
                                <input type="text" class="form-control" value="{{ $namaz->johr_en }}" name="johr_en" id="johr_en">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="johr_bn">Johr Bangla</label>
                                <input type="text" class="form-control" value="{{ $namaz->johr_bn }}" name="johr_bn" id="johr_bn">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="asor_en">Asor English</label>
                                <input type="text" class="form-control" value="{{ $namaz->asor_en }}" name="asor_en" id="asor_en">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="asor_bn">Asor Bangla</label>
                                <input type="text" class="form-control" value="{{ $namaz->asor_bn }}" name="asor_bn" id="asor_bn">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="magrib_en">Magrib English</label>
                                <input type="text" class="form-control" value="{{ $namaz->magrib_en }}" name="magrib_en" id="magrib_en">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="magrib_bn">Magrib Bangla</label>
                                <input type="text" class="form-control" value="{{ $namaz->magrib_bn }}" name="magrib_bn" id="magrib_bn">
                            </div>
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="esha_en">Esha English</label>
                                <input type="text" class="form-control" value="{{ $namaz->esha_en }}" name="esha_en" id="esha_en">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="esha_bn">Esha Bangla</label>
                                <input type="text" class="form-control" value="{{ $namaz->esha_bn }}" name="esha_bn" id="esha_bn">
                            </div>
                        </div>
                    </div>
                    
                      
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jummah_en">Jummah English</label>
                                <input type="text" class="form-control" value="{{ $namaz->jummah_en }}" name="jummah_en" id="jummah_en">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jummah_bn">Jummah Bangla</label>
                                <input type="text" class="form-control" value="{{ $namaz->jummah_bn }}" name="jummah_bn" id="jummah_bn">
                            </div>
                        </div>
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



