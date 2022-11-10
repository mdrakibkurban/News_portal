@extends('admin.layouts.app')
@section('title','Seo Setting')
@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Seo Setting</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Seo Setting</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->  
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Seo Setting Update</h3>
            </div>
            <form action="{{ route('admin.seo.update',$seo->id)}}" method="post">
                @csrf
                @method('put')
                <div class="card-body">

                    <div class="form-group row">
                      <label for="meta_author" class="col-sm-3 col-form-label">Meta_author</label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" value="{{ $seo->meta_author }}" name="meta_author" id="meta_author">
                      </div>
                    </div>

                    <div class="form-group row">
                        <label for="meta_title" class="col-sm-3 col-form-label">Meta_title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $seo->meta_title }}" name="meta_title" id="meta_title">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="meta_keyword" class="col-sm-3 col-form-label">Meta_keyword</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $seo->meta_keyword }}" name="meta_keyword" id="meta_keyword">
                        </div>
                    </div>

                  
                    <div class="form-group row">
                        <label for="google_verification" class="col-sm-3 col-form-label">Google_verification</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $seo->google_verification }}" name="google_verification" id="google_verification">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="meta_description" class="col-sm-3 col-form-label">Meta_description</label>
                        <div class="col-sm-9">
                            <textarea name="meta_description" id="meta_description" class="form-control">
                                {{ $seo->meta_description }}
                            </textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="meta_description" class="col-sm-3 col-form-label">Google_analytics</label>
                        <div class="col-sm-9">
                            <textarea name="google_analytics" id="google_analytics" class="form-control">
                                {{ $seo->google_analytics }}
                            </textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alexa_analytics" class="col-sm-3 col-form-label">Alexa_analytics</label>
                        <div class="col-sm-9">
                            <textarea name="alexa_analytics" id="alexa_analytics" class="form-control">
                                {{ $seo->alexa_analytics }}
                            </textarea>
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



