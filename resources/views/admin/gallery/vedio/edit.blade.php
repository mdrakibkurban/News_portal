@extends('admin.layouts.app')
@section('title','Vedio')
@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Vedio</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Vedio</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->  
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Vedio Edit</h3>
              <div class="card-tools">
                  <a href="{{ route('admin.vedios.index')}}" class="btn btn-primary">Vedio list</a>
              </div>
            </div>
            <form action="{{ route('admin.vedios.update',$vedio->id)}}" method="post">
                @csrf
                @method('put')
                <div class="card-body">
                   
                    <div class="form-group">
                        <label for="title_en">Title English</label>
                        <input type="text" name="title_en" id="title_en"  value="{{$vedio->title_en}}"  class="form-control"
                        placeholder="Title English">
                        @error('title_en')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      
                    </div>
                    <div class="form-group">
                        <label for="title_bn">Title Bangla</label>
                        <input type="text" name="title_bn" id="title_bn" value="{{$vedio->title_bn}}" class="form-control" placeholder="Title Bangla">
                        @error('title_bn')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="type">Type </label>
                        <select name="type" id="" class="form-control">
                            <option value="">--choose type--</option>
                            <option value="1" {{ $vedio->type == 1 ? 'selected' : ''}}>Big Vedio</option>
                            <option value="0" {{ $vedio->type == 0 ? 'selected' : ''}}>Small Vedio</option>
                        </select>
                    </div>

                   
                    <div class="form-group">
                      <label for="embed_code">Embed_code</label>
                      <input type="text" name="embed_code" id="embed_code" class="form-control"
                      value="{{ $vedio->embed_code }}">  
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











