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
              <h3 class="card-title mt-2">News Details</h3>
              <div class="card-tools">
                <a href="{{ route('admin.news.index') }}" class="btn btn-primary">
                <i class="fa fa-arrow-left"></i> Back</a>
            </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                      <tr>
                        <th style="width: 170px">News Image</th>
                        <td><img width="100" height="100" src="{{ asset('storage/news_images/'.$news->image) }}" alt="news"></td>
                      </tr>

                      <tr>
                         <th style="width: 170px">News English</th>
                         <td>{{ Str::limit($news->news_en, 100)  }}</td>
                      </tr>

                      <tr>
                        <th style="width: 170px">News Bangla</th>
                        <td>{{ Str::limit($news->news_bn, 100)  }}</td>
                     </tr>
                     
                     <tr>
                        <th style="width: 170px">Created By</th>
                        <td>{{ $news->user->name }}</td>
                     </tr>

                     <tr>
                        <th style="width: 170px">Category</th>
                        <td>
                            <span class="badge badge-secondary">{{ $news->category->name_en }}</span>
                                   
                            <span class="badge badge-secondary">{{ $news->category->name_bn }}</span>
                        </td>
                     </tr>

                     <tr>
                        <th style="width: 170px">Sub Category</th>
                        <td>
                            <span class="badge badge-secondary">{{ $news->subcategory->name_en }}</span>
                                   
                            <span class="badge badge-secondary">{{ $news->subcategory->name_bn }}</span>
                        </td>
                     </tr>

                     <tr>
                        <th style="width: 170px">District</th>
                        <td>
                            <span class="badge badge-secondary">{{ $news->district->district_en }}</span>
                                   
                            <span class="badge badge-secondary">{{ $news->district->district_bn }}</span>
                        </td>
                     </tr>

                     <tr>
                        <th style="width: 170px">Sub District</th>
                        <td>
                            <span class="badge badge-secondary">{{ $news->subdistrict->subdistrict_en }}</span>
                                   
                            <span class="badge badge-secondary">{{ $news->subdistrict->subdistrict_bn }}</span>
                        </td>
                     </tr>

                     <tr>
                        <th style="width: 170px">Tags</th>
                        <td>
                            <span class="badge badge-secondary">{{ $news->tags_en }}</span>
                                   
                            <span class="badge badge-secondary">{{ $news->tags_bn }}</span>
                        </td>
                     </tr>

                     <tr>
                        <th style="width: 170px">Tags</th>
                        <td>
                            <span class="badge badge-secondary">{{ $news->tags_en }}</span>
                                   
                            <span class="badge badge-secondary">{{ $news->tags_bn }}</span>
                        </td>
                     </tr>

                     <tr>
                        <th style="width: 170px">Description English</th>
                        <td>{!! Str::limit(strip_tags($news->des_en), 300) !!}</td>
                     </tr>

                     <tr>
                        <th style="width: 170px">Description Bangla</th>
                        <td>{!! Str::limit(strip_tags($news->des_bn), 300) !!}</td>
                     </tr>

                     <tr>
                        <th style="width: 170px">News Date</th>
                        <td>{{ $news->news_date }}</td>
                     </tr>

                     <tr>
                        <th style="width: 170px">News Month</th>
                        <td>{{ $news->news_month }}</td>
                     </tr>

                     <tr>
                        <th style="width: 170px">Headline</th>
                        <td>{{ $news->headline ?? '' }}</td>
                     </tr>

                     <tr>
                        <th style="width: 170px">First Section</th>
                        <td>{{ $news->first_section ?? '' }}</td>
                     </tr>

                     <tr>
                        <th style="width: 170px">First Section Big</th>
                        <td>{{ $news->first_section_big ?? '' }}</td>
                     </tr>

                     <tr>
                        <th style="width: 170px">Others Section</th>
                        <td>{{ $news->others_section ?? '' }}</td>
                     </tr>
               
                  </table>
                 
            </div>
            
          </div>
    </div>
  </div>
@endsection
