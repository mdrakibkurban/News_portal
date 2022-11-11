@extends('admin.layouts.app')
@section('title','Notice')
@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Notice</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Notice</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->  
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Notice Create</h3>
              <div class="card-tools">
                  <a href="{{ route('admin.notices.index')}}" class="btn btn-primary">Notice list</a>
              </div>
            </div>
            <form action="{{ route('admin.notices.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                   
                    <div class="form-group">
                        <label for="">Notice English</label>
                        <textarea class="textarea" name="notice_en">
                          
                        </textarea>
                        @error('notice_en')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      
                    </div>
                    <div class="form-group">
                        <label for="">Notice Bangla</label>
                        <textarea class="textarea" name="notice_bn">
                         
                        </textarea>
                        @error('notice_bn')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="status" class="col-sm-3 col-form-label">Notice status </label>
                        <div class="col-sm-9">
                            <div class="custom-control custom-radio d-inline mr-2">
                                <input class="custom-control-input" type="radio" id="active" value="1" name="status" {{(old('status') == '1') ? 'checked' : ''}}>
                                <label for="active" class="custom-control-label">Active</label>
                                </div>
                                <div class="custom-control custom-radio d-inline">
                                <input class="custom-control-input" type="radio" id="inactive"  value="0" name="status" {{(old('status') == '0') ? 'checked' : ''}}>
                                <label for="inactive" class="custom-control-label">Inactive</label>
                            </div>
                        </div>
                        @error('status')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>



                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info float-right">Create Notice</button>
                </div>
            </form>
            
          </div>
    </div>
  </div>
@endsection










