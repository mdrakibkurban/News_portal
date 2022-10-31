@extends('admin.layouts.app')
@section('title','Category')
@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Category</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Category</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->  
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Category Create</h3>
              <div class="card-tools">
                  <a href="{{ route('admin.categories.index')}}" class="btn btn-primary">Category list</a>
              </div>
            </div>
            <form action="{{ route('admin.categories.store')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Category Name </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ old('name')}}" name="name" id="name" placeholder="Category Name">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div> 
    
                    <div class="form-group row align-items-center">
                        <label for="status" class="col-sm-3 col-form-label">Category status </label>
                        <div class="col-sm-9">
                            <div class="custom-control custom-radio d-inline mr-2">
                                <input class="custom-control-input" type="radio" id="active" value="1" name="status" checked>
                                <label for="active" class="custom-control-label">Active</label>
                                </div>
                                <div class="custom-control custom-radio d-inline">
                                <input class="custom-control-input" type="radio" id="inactive"  value="0" name="status">
                                <label for="inactive" class="custom-control-label">Inactive</label>
                            </div>
                            @error('status')
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

