@extends('admin.layouts.app')
@section('title','Division')
@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Division</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Division</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->  
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Division Create</h3>
              <div class="card-tools">
                  <a href="{{ route('admin.divisions.index')}}" class="btn btn-primary">Division list</a>
              </div>
            </div>
            <form action="{{ route('admin.divisions.store')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label for="name_en" class="col-sm-3 col-form-label">Division English </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('name_en') is-invalid @enderror" value="{{ old('name_en')}}" district="name_en" id="name_en" name="name_en" placeholder="Division English">
                            @error('name_en')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div> 

                    <div class="form-group row">
                      <label for="name_bn" class="col-sm-3 col-form-label">Division Bangla </label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control @error('name_bn') is-invalid @enderror" value="{{ old('name_bn')}}" district="name_bn" name="name_bn" id="name_bn" placeholder="Division Bangla">
                          @error('name_bn')
                              <div class="text-danger">{{ $message }}</div>
                          @enderror
                      </div>
                    </div> 
    
                </div>
    
                <div class="card-footer">
                    <button type="submit" class="btn btn-info float-right">Create</button>
                </div>
            </form>
            
          </div>
    </div>
  </div>
@endsection

