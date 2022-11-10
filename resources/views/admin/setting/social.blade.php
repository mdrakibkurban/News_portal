@extends('admin.layouts.app')
@section('title','Social Setting')
@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Social Setting</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Social Setting</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->  
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Social Setting Update</h3>
            </div>
            <form action="{{ route('admin.social.update',$social->id)}}" method="post">
                @csrf
                @method('put')
                <div class="card-body">

                    <div class="form-group row">
                      <label for="facebook" class="col-sm-3 col-form-label">Facebook</label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" value="{{ $social->facebook }}" name="facebook" id="facebook">
                      </div>
                    </div>

                    <div class="form-group row">
                        <label for="twitter" class="col-sm-3 col-form-label">Twitter</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $social->twitter }}" name="twitter" id="twitter">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="youtube" class="col-sm-3 col-form-label">Youtube</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $social->youtube }}" name="youtube" id="youtube">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="instagram" class="col-sm-3 col-form-label">Instagram</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $social->instagram }}" name="instagram" id="instagram">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="linkedin" class="col-sm-3 col-form-label">Linkedin</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $social->linkedin }}" name="linkedin" id="linkedin">
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



