@extends('admin.layouts.app')
@section('title','Website')
@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Website</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Website</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->  
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Website Create</h3>
              <div class="card-tools">
                  <a href="{{ route('admin.websites.index')}}" class="btn btn-primary">Website list</a>
              </div>
            </div>
            <form action="{{ route('admin.websites.store')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label for="name_en" class="col-sm-3 col-form-label">Website Name English </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('website_name_en') is-invalid @enderror" value="{{ old('website_name_en')}}" name="website_name_en" id="website_name_en" placeholder="Website Name English">
                            @error('website_name_en')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div> 

                    <div class="form-group row">
                      <label for="website_name_en" class="col-sm-3 col-form-label">Website Name Bangla </label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control @error('website_name_bn') is-invalid @enderror" value="{{ old('website_name_bn')}}" name="website_name_bn" id="website_name_bn" placeholder="Website Name Bangla">
                          @error('website_name_bn')
                              <div class="text-danger">{{ $message }}</div>
                          @enderror
                      </div>
                    </div> 

                    <div class="form-group row">
                        <label for="website_name_en" class="col-sm-3 col-form-label">Website Link </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('website_link') is-invalid @enderror" value="{{ old('website_link')}}" name="website_link" id="website_link" placeholder="Website Link">
                            @error('website_link')
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

