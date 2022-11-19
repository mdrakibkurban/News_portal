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
              <h3 class="card-title mt-2">District Edit</h3>
              <div class="card-tools">
                  <a href="{{ route('admin.districts.index')}}" class="btn btn-primary">District list</a>
              </div>
            </div>
            <form action="{{ route('admin.districts.update',$district->id)}}" method="post">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group row">
                      <label for="name_en" class="col-sm-3 col-form-label">District English </label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control @error('name_en') is-invalid @enderror" value="{{ $district->name_en }}" name="name_en" id="name_en">
                          @error('name_en')
                              <div class="text-danger">{{ $message }}</div>
                          @enderror
                      </div>
                    </div>

                    <div class="form-group row">
                        <label for="name_bn" class="col-sm-3 col-form-label">District Bangla </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('name_bn') is-invalid @enderror" value="{{ $district->name_bn }}" name="name_bn" id="name_bn">
                            @error('name_bn')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                      <label for="name" class="col-sm-3 col-form-label">Choose Division</label>
                      <div class="col-sm-9">
                          <select name="division_id" class="form-control @error('division_id') is-invalid @enderror" id="select2">
                            <option value="">-- Choose Divison --</option>
                            @foreach($divisions as $division)
                              <option value="{{ $division->id }}" 
                              {{ $district->division_id  ==  $division->id ? 'selected' : ' '}}>
                              {{ $division->name_en }} | {{ $division->name_bn }}
                              </option>
                            @endforeach
                          </select>
                          @error('division_id')
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