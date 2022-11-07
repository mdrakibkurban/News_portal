@extends('admin.layouts.app')
@section('title','Sub-District')
@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Sub-District</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Sub-District</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->  
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Sub-District Edit</h3>
              <div class="card-tools">
                  <a href="{{ route('admin.sub-districts.index')}}" class="btn btn-primary">Sub-District list</a>
              </div>
            </div>
            <form action="{{ route('admin.sub-districts.update',$subDistrict->id)}}" method="post">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group row">
                      <label for="subdistrict_en" class="col-sm-3 col-form-label">District English </label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control @error('subdistrict_en') is-invalid @enderror" value="{{ $subDistrict->subdistrict_en }}" name="subdistrict_en" id="subdistrict_en" placeholder="SubDistrict Name English">
                          @error('subdistrict_en')
                              <div class="text-danger">{{ $message }}</div>
                          @enderror
                      </div>
                    </div>

                    <div class="form-group row">
                        <label for="subdistrict_bn" class="col-sm-3 col-form-label">District Bangla </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('subdistrict_bn') is-invalid @enderror" value="{{ $subDistrict->subdistrict_bn }}" name="subdistrict_bn" id="subdistrict_bn" placeholder="SubDistrict Name Bangla">
                            @error('subdistrict_bn')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                      <label for="name" class="col-sm-3 col-form-label">Choose istrict</label>
                      <div class="col-sm-9">
                          <select name="district_id" value="{{ old('district_id')}}" class="form-control @error('district_id') is-invalid @enderror" id="select2">
                            <option value="">-- Choose Category --</option>
                            @foreach($districts as $district)
                              <option value="{{ $district->id }}" 
                              {{ $subDistrict->district_id  ==  $district->id ? 'selected' : ' '}}>
                              {{ $district->district_en }} | {{ $district->district_bn }}
                              </option>
                            @endforeach
                          </select>
                          @error('district_id')
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