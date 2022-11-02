@extends('admin.layouts.app')
@section('title','Sub-Category')
@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Sub-Category</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Sub-Category</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->  
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Sub-Category Edit</h3>
              <div class="card-tools">
                  <a href="{{ route('admin.sub-categories.index')}}" class="btn btn-primary">Sub-Category list</a>
              </div>
            </div>
            <form action="{{ route('admin.sub-categories.update',$subCategory->id)}}" method="post">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Name </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $subCategory->name }}" name="name" id="name" placeholder="Sub-Category Name">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div> 

                    <div class="form-group row">
                      <label for="name" class="col-sm-3 col-form-label">Category</label>
                      <div class="col-sm-9">
                          <select name="category_id" class="form-control">
                            <option value="">--category select--</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $subCategory->category_id ==  $category->id ? 'selected' : ' '}}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                          </select>
                          @error('category_id')
                              <div class="text-danger">{{ $message }}</div>
                          @enderror
                      </div>
                   </div> 
    
                    <div class="form-group row align-items-center">
                        <label for="status" class="col-sm-3 col-form-label">status </label>
                        <div class="col-sm-9">
                            <div class="custom-control custom-radio d-inline mr-2">
                                <input class="custom-control-input" type="radio" id="active" value="1" name="status" {{ $subCategory->status == 1 ? 'checked' : ''}}>
                                <label for="active" class="custom-control-label">Active</label>
                                </div>
                                <div class="custom-control custom-radio d-inline">
                                <input class="custom-control-input" type="radio" id="inactive"  value="0" name="status" {{ $subCategory->status == 0 ? 'checked' : ''}}>
                                <label for="inactive" class="custom-control-label">Inactive</label>
                            </div>
                            @error('status')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
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

