@extends('admin.layouts.app')
@section('title','Ads')
@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Ads</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Ads</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->  
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Ads Create</h3>
              <div class="card-tools">
                  <a href="{{ route('admin.ads.index')}}" class="btn btn-primary">Ads list</a>
              </div>
            </div>
            <form action="{{ route('admin.ads.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="links">Link</label>
                    <input type="links" class="form-control" name="links" id="links" placeholder="Enter links">
                  </div>
                  <div class="form-group">
                    <label>Type</label>
                    <select class="form-control" name="type">
                      <option>--select type--</option>
                      <option value="1">Vartical</option>
                      <option value="2">Horizotal</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>File</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="ads" id="ads">
                        <label class="custom-file-label" for="ads">Choose file</label>
                      </div>
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

