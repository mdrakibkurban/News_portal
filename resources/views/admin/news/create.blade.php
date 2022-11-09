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
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">News Create</h3>
              <div class="card-tools">
                  <a href="{{ route('admin.news.index')}}" class="btn btn-primary">News list</a>
              </div>
            </div>
            <form action="{{ route('admin.news.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                   <div class="row">
                        <div class="form-group col-md-6">
                            <label for="news_en">News English</label>
                            <input type="text" class="form-control" value="{{ old('news_en')}}" name="news_en" id="news_en" placeholder="News English">
                            @error('news_en')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="news_en">News English</label>
                            <input type="text" class="form-control" value="{{ old('news_bn')}}" name="news_bn" id="news_bn" placeholder="News Bangla">
                            @error('news_bn')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="news_en">Choose Category</label>
                            <select name="category_id" value="{{ old('category_id')}}" class="form-control" id="select2">
                                <option value="">-- Choose Category --</option>
                                @foreach($categories as $category)
                                  <option value="{{ $category->id }}" 
                                  {{ old('category_id') ==  $category->id ? 'selected' : ' '}}>
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
                            <select name="subcategory_id" value="{{ old('subcategory_id')}}" class="form-control" id="subCat_id">
                                <option disabled="" selected="">-- Choose SubCategory --</option>
                            </select>
                        </div>
                    </div> 

                    
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Choose District</label>
                            <select name="district_id" value="{{ old('district_id')}}" class="form-control" id="select1">
                                <option value="">-- Choose District --</option>
                                @foreach($districts as $district)
                                  <option value="{{ $district->id }}" 
                                  {{ old('district_id') ==  $district->id ? 'selected' : ' '}}>
                                  {{ $district->district_en }} | {{ $district->district_bn }}
                                  </option>
                                @endforeach
                              </select>
                              @error('district_id')
                                  <div class="text-danger">{{ $message }}</div>
                              @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Choose SubDistrict</label>
                            <select name="subdistrict_id" value="{{ old('subdistrict_id')}}" class="form-control" id="subDis_id">
                                <option disabled="" selected="">-- Choose SubDistrict --</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="tags_en">News Tag English</label>
                            <input type="text" class="form-control" value="{{ old('tags_en')}}" name="tags_en" id="tags_en" placeholder="News Tag English">
                           
                        </div>

                        <div class="form-group col-md-6">
                            <label for="tags_bn">News Tag English</label>
                            <input type="text" class="form-control" value="{{ old('tags_bn')}}" name="tags_bn" id="tags_bn" placeholder="News Tag Bangla">
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="status">News Status</label><br>
                            <select name="status" id="status" class="form-control">
                                <option value="">--choose status--</option>
                                <option value="1" {{(old('status') == '1') ? 'selected' : ''}}>Active</option>
                                <option value="0" {{(old('status') == '0') ? 'selected' : ''}}>Inactive</option>
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
                               <img src="" id="showImage" style="width: 100px;">
                            </div>
                        </div>

                      
                    </div>


                    <div class="form-group">
                        <label for="">News Description English</label>
                        <textarea class="textarea" name="des_en">
                          
                        </textarea>
                        @error('des_en')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">News Description Bangla</label>
                        <textarea class="textarea" name="des_bn">
                         
                        </textarea>
                        @error('des_bn')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                   <hr>

                   <h4>Extra Option</h4>

                   <div class="row">
                      <div class="col-md-6">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="headline"  name="headline" value="1">
                            <label for="headline" class="custom-control-label">HeadLine</label>
                           </div>
        
                           <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="first_section"  name="first_section" value="1">
                            <label for="first_section" class="custom-control-label">First Section</label>
                           </div>
                      </div>


                      <div class="col-md-6">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="first_section_big"  name="first_section_big" value="1">
                            <label for="first_section_big" class="custom-control-label">First Section Big</label>
                           </div>
        
                           <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="others_section"  name="others_section" value="1">
                            <label for="others_section" class="custom-control-label">Others Section</label>
                           </div>
                      </div>
                   </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info float-right">Create News</button>
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


            $(document).on('change', 'select[name="district_id"]', function() {
                let district_id = $(this).val();
                $.ajax({
                    url    : "{{ route('admin.get.subdist')}}",
                    method : 'post',
                    data   : {district_id : district_id },
                    success: function(result){
                        $('#subDis_id').empty();
                        $.each(result,function(key, value){
                            $('#subDis_id').append('<option value="'+value.id+'">'
                                +value.subdistrict_bn+' | '+value.subdistrict_en+'</option>')
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








