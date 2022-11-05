@extends('admin.layouts.app')
@section('title','District')
@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">District</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">District</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->  
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">District Create</h3>
              <div class="card-tools">
                  <a href="{{ route('admin.districts.index')}}" class="btn btn-primary">District list</a>
              </div>
            </div>
            <form action="{{ route('admin.districts.update',$district->id)}}" method="post">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group row">
                        <label for="district_en" class="col-sm-3 col-form-label">District English </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('district_en') is-invalid @enderror" value="{{ $district->district_en }}" district="district_en" id="district_en" name="district_en">
                            @error('district_en')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div> 

                    <div class="form-group row">
                      <label for="district_bn" class="col-sm-3 col-form-label">District Bangla </label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control @error('district_bn') is-invalid @enderror" value="{{ $district->district_bn }}" district="district_bn" name="district_bn" id="district_bn">
                          @error('district_bn')
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

