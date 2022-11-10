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

                    <div class="form-group row">
                      <label for="fajr" class="col-sm-3 col-form-label">Fajr</label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" value="{{ $namaz->fajr }}" name="fajr" id="fajr">
                      </div>
                    </div>

                    <div class="form-group row">
                        <label for="johr" class="col-sm-3 col-form-label">Johr</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $namaz->johr }}" name="johr" id="johr">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="youtube" class="col-sm-3 col-form-label">Asor</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $namaz->asor }}" name="asor" id="asor">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="magrib" class="col-sm-3 col-form-label">Magrib</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $namaz->magrib }}" name="magrib" id="magrib">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="esha" class="col-sm-3 col-form-label">Esha</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $namaz->esha }}" name="esha" id="esha">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jummah" class="col-sm-3 col-form-label">Jummah</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $namaz->jummah }}" name="jummah" id="jummah">
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



