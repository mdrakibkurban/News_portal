@extends('admin.layouts.app')
@section('title','News')
@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">News</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">News</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->  
@endsection

@section('content')
@php
  $subCategories = DB::table('sub_categories')->where('category_id', $news->category_id)->get();
  $districts  = DB::table('districts')->where('division_id', $news->division_id)->get();
@endphp
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">News Edit</h3>
              <div class="card-tools">
                  <a href="{{ route('admin.news.index')}}" class="btn btn-primary">News list</a>
              </div>
            </div>
            <form action="{{ route('admin.news.update',$news->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
                   <div class="row">
                        <div class="form-group col-md-6">
                            <label for="news_en">News English</label>
                            <input type="text" class="form-control" value="{{ $news->news_en }}" name="news_en" id="news_en" placeholder="News English">
                            @error('news_en')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="news_en">News Bangla</label>
                            <input type="text" class="form-control" value="{{ $news->news_bn }}" name="news_bn" id="news_bn" placeholder="News Bangla">
                            @error('news_bn')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="news_en">Choose Category</label>
                            <select name="category_id" class="form-control" id="select2">
                                <option value="">-- Choose Category --</option>
                                @foreach($categories as $category)
                                  <option value="{{ $category->id }}" 
                                  {{ $news->category_id ==  $category->id ? 'selected' : ' '}}>
                                  {{ $category->name_en }} | {{ $category->name_bn }}
                                  </option>
                                @endforeach
                              </select>
                              @error('category_id')
                                  <div class="text-danger">{{ $message }}</div>
                              @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Choose SubCategory</label>
                            <select name="subcategory_id" class="form-control" id="subCat_id">
                                <option disabled="" selected="">-- Choose SubCategory --</option>
                                @foreach($subCategories as $subcategory)
                                  <option value="{{ $subcategory->id }}" 
                                  {{ $news->subcategory_id == $subcategory->id ? 'selected' : ' '}}>
                                  {{ $subcategory->name_en }} | {{ $subcategory->name_bn }}
                                  </option>
                                @endforeach
                            </select>
                        </div>
                    </div> 

                    
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Choose District</label>
                            <select name="division_id" class="form-control" id="select1">
                                <option value="">-- Choose District --</option>
                                @foreach($divisions as $division)
                                  <option value="{{ $division->id }}" 
                                  {{ $news->division_id ==  $division->id ? 'selected' : ' '}}>
                                  {{ $division->name_en }} | {{ $division->name_bn }}
                                  </option>
                                @endforeach
                              </select>
                              @error('division_id')
                                  <div class="text-danger">{{ $message }}</div>
                              @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Choose District</label>
                            <select name="district_id" class="form-control" id="district_id">
                                <option disabled="" selected="">-- Choose District --</option>
                                @foreach($districts as $district)
                                  <option value="{{ $district->id }}" 
                                  {{ $news->district_id == $district->id ? 'selected' : ' '}}>
                                  {{ $district->name_bn }} |
                                  {{ $district->name_en }}
                                  </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="tags_en">News Tag English</label>
                            <input type="text" class="form-control" value="{{ $news->tags_en }}" name="tags_en" id="tags_en" placeholder="News Tag English">
                           
                        </div>

                        <div class="form-group col-md-6">
                            <label for="tags_bn">News Tag Bangla</label>
                            <input type="text" class="form-control" value="{{ $news->tags_bn }}" name="tags_bn" id="tags_bn" placeholder="News Tag Bangla">
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="status">News Status</label><br>
                            <select name="status" id="status" class="form-control">
                                <option value="">--choose status--</option>
                                <option value="1" {{ $news->status == 1 ? 'selected' : ''}}
                                >Active</option>
                                <option value="0" {{ $news->status == 0 ? 'selected' : ''}}
                                >Inactive</option>
                            </select>
                            @error('status')
                                  <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="file">Image File</label>
                            <div class="custom-file">
                             <input type="file" class="custom-file-input" id="image" name="image">
                             <label class="custom-file-label" for="file">Choose file</label>
                            </div>
                            @error('image')
                                  <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
    
                        <div class="form-group col-md-2">
                            <div>
                               <img src="{{ asset('storage/news_images/'.$news->image) }}" id="showImage" style="width: 100px;">
                            </div>
                        </div>

                      
                    </div>


                    <div class="form-group">
                        <label for="">News Description English</label>
                        <textarea class="textarea" name="des_en">
                            {{ $news->des_en }}
                        </textarea>
                        @error('des_en')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">News Description Bangla</label>
                        <textarea class="textarea" name="des_bn">
                          {{ $news->des_bn }}
                        </textarea>
                        @error('des_bn')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                   

                   <hr>

                   <h4>Extra Option</h4>

                   <div class="row">
                      <div class="col-md-4 mt-3">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="headline"  name="headline" value="1" {{ $news->headline == 1 ? 'checked' : ''}}>
                            <label for="headline" class="custom-control-label">HeadLine</label>
                           </div>
        
                      </div>

                      <div class="col-md-4">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="first_section_big"  name="first_section_big" value="1"
                            {{ $news->first_section_big == 1 ? 'checked' : ''}}>
                            <label for="first_section_big" class="custom-control-label">First Section Big</label>
                        </div>
        
                           <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="first_section_small"  name="first_section_small" value="1" {{ $news->first_section_small == 1 ? 'checked' : ''}}>
                            <label for="first_section_small" class="custom-control-label">First Section Small</label>
                           </div>
                      </div>


                      <div class="col-md-4">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="others_section_big"  name="others_section_big" value="1"
                                {{ $news->others_section_big == 1 ? 'checked' : ''}}>
                                <label for="others_section_big" class="custom-control-label">Others Section Big</label>
                           </div>

                           <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="others_section_small"  name="others_section_small" value="1" {{ $news->others_section_small == 1 ? 'checked' : ''}}>
                                <label for="others_section_small" class="custom-control-label">Others Section Small</label>
                           </div>
                         
                      </div>
                   </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info float-right">Update News</button>
                </div>
            </form>
            
          </div>
    </div>
  </div>
@endsection


@push('scripts')
    <script>
        $( document ).ready(function() {
            $(document).on('change', 'select[name="category_id"]', function() {
                let category_id = $(this).val();
                $.ajax({
                    url    : "{{ route('admin.get.subcat')}}",
                    method : 'post',
                    data   : {category_id : category_id },
                    success: function(result){
                        $('#subCat_id').empty();
                        $.each(result,function(key, value){
                            $('#subCat_id').append('<option value="'+value.id+'">'
                                +value.name_bn+' | '+value.name_en+'</option>')
                        });
                    }
                });
            });


            $(document).on('change', 'select[name="division_id"]', function() {
                let division_id = $(this).val();
                $.ajax({
                    url    : "{{ route('admin.get.district')}}",
                    method : 'post',
                    data   : {division_id : division_id },
                    success: function(result){
                        $('#subDis_id').empty();
                        $.each(result,function(key, value){
                            $('#district_id').append('<option value="'+value.id+'">'
                                +value.name_bn+' | '+value.name_en+'</option>')
                        });
                    }
                });
            });

           // change image
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload=function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endpush








