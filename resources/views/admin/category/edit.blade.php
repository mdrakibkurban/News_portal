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
              <h3 class="card-title">Category Edit</h3>
              <div class="card-tools">
                  <a href="{{ route('admin.categories.index')}}" class="btn btn-primary">Category list</a>
              </div>
            </div>
            <form action="{{ route('admin.categories.update',$category->id)}}" method="post">
                @csrf
                @method('put')
                <div class="card-body">
                  <div class="form-group row">
                    <label for="name_en" class="col-sm-3 col-form-label">Name English </label>
                        <div class="col-sm-9">
                              <input type="text" class="form-control @error('name_en') is-invalid @enderror" value="{{ $category->name_en }}" name="name_en" id="name_en" placeholder="Category Name_EN">
                              @error('name_en')
                                  <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>
                      </div> 

                      <div class="form-group row">
                        <label for="name_bn" class="col-sm-3 col-form-label">Name Bangla </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('name_bn') is-invalid @enderror" value="{{ $category->name_bn }}" name="name_bn" id="name_bn" placeholder="Category Name_BN">
                            @error('name_bn')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
    
                    <div class="form-group row align-items-center">
                        <label for="status" class="col-sm-3 col-form-label">Category status </label>
                        <div class="col-sm-9">
                            <div class="custom-control custom-radio d-inline mr-2">
                                <input class="custom-control-input" type="radio" id="active" value="1" name="status" {{ $category->status == 1 ? "checked" : " " }}>
                                <label for="active" class="custom-control-label">Active</label>
                                </div>
                                <div class="custom-control custom-radio d-inline">
                                <input class="custom-control-input" type="radio" id="inactive"  value="0" name="status" {{ $category->status == 0 ? "checked" : " " }}>
                                <label for="inactive" class="custom-control-label">Inactive</label>
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

