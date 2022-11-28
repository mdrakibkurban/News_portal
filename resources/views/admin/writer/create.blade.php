@extends('admin.layouts.app')
@section('title','Writer')
@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Writer</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Writer</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->  
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Create Writer</h3>
              <div class="card-tools">
                  <a href="{{ route('admin.writers.index')}}" class="btn btn-primary">Writer List</a>
              </div>
            </div>
            <form action="{{ route('admin.writers.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" 
                        value="{{ old('name')}}">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email"
                        value="{{ old('email')}}">
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                        
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password">
                    </div>

                    <div class="form-group">
                        <label for="password">Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>

                   <br>
                   <!-- checkbox -->
                   <div class="form-group d-flex">
                    <div class="custom-control custom-checkbox mr-2">
                      <input class="custom-control-input" name="category" type="checkbox" id="category" value="1" {{(old('category') == '1') ? 'checked' : ''}}>
                      <label for="category" class="custom-control-label">Category</label>
                    </div>

                    <div class="custom-control custom-checkbox mr-2">
                        <input class="custom-control-input" name="division" type="checkbox" id="division" value="1" {{(old('division') == '1') ? 'checked' : ''}}>
                        <label for="division" class="custom-control-label">Division</label>
                    </div>

                    <div class="custom-control custom-checkbox mr-2">
                        <input class="custom-control-input" name="news" type="checkbox" id="news" value="1" {{(old('news') == '1') ? 'checked' : ''}}>
                        <label for="news" class="custom-control-label">News</label>
                    </div>

                    <div class="custom-control custom-checkbox mr-2">
                        <input class="custom-control-input" name="setting" type="checkbox" id="setting" value="1" {{(old('setting') == '1') ? 'checked' : ''}}>
                        <label for="setting" class="custom-control-label">Setting</label>
                    </div>

                    <div class="custom-control custom-checkbox mr-2">
                        <input class="custom-control-input" name="gallery" type="checkbox" id="gallery" value="1" {{(old('gallery') == '1') ? 'checked' : ''}}>
                        <label for="gallery" class="custom-control-label">Gallery</label>
                    </div>

                    <div class="custom-control custom-checkbox mr-2">
                        <input class="custom-control-input" name="ads" type="checkbox" id="ads" value="1" {{(old('ads') == '1') ? 'checked' : ''}}>
                        <label for="ads" class="custom-control-label">Ads</label>
                    </div>

                    
                    <div class="custom-control custom-checkbox mr-2">
                        <input class="custom-control-input" name="role" type="checkbox" id="role" value="1" {{(old('role') == '1') ? 'checked' : ''}}>
                        <label for="role" class="custom-control-label">Role</label>
                    </div>
                  </div> 
                        
                   
                    
                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
          </div>
    </div>
  </div>
@endsection

