@extends('admin.layouts.app')
@section('title','Photo')
@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Photo</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Photo</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->  
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Photo Create</h3>
              <div class="card-tools">
                  <a href="{{ route('admin.photos.index')}}" class="btn btn-primary">Photo list</a>
              </div>
            </div>
            <form action="{{ route('admin.photos.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                   
                    <div class="form-group">
                        <label for="title_en">Title English</label>
                        <input type="text" name="title_en" id="title_en"  value="{{ old('title_en')}}"  class="form-control"
                        placeholder="Title English">
                        @error('title_en')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      
                    </div>
                    <div class="form-group">
                        <label for="title_bn">Title Bangla</label>
                        <input type="text" name="title_bn" id="title_bn" value="{{ old('title_bn')}}" class="form-control" placeholder="Title Bangla">
                        @error('title_bn')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="type">Type </label>
                        <select name="type" id="" class="form-control">
                            <option value="">--choose type--</option>
                            <option value="1" {{ old('type') == 1 ? 'selected' : ''}}>Big Photo</option>
                            <option value="0" {{ old('type') == 0 ? 'selected' : ''}}>Small Photo</option>
                        </select>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-4">
                        <label for="photo">Photo</label>
                        <input type="file" name="photo" id="photo">
                        @error('photo')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-group col-md-8">
                        <img width="100px" src="" alt="" id="showPhoto">
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



@push('scripts')

<script>
  $( document ).ready(function() {
    $('#photo').change(function(e){
        var reader = new FileReader();
        reader.onload=function(e){
            $('#showPhoto').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });
  });
</script>

@endpush










