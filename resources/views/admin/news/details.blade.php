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
                        <th style="width:200px">News Image</th>
                        <td><img width="100" height="100" src="{{ asset('storage/news_images/'.$news->image) }}" alt="news"></td>
                      </tr>

                      <tr>
                         <th style="width:200px">News English</th>
                         <td>{{ Str::limit($news->news_en, 100) ?? '' }}</td>
                      </tr>

                      <tr>
                        <th style="width:200px">News Bangla</th>
                        <td>{{ Str::limit($news->news_bn, 100) ?? ''  }}</td>
                     </tr>
                     
                     <tr>
                        <th style="width:200px">Created By</th>
                        <td>{{ $news->user->name ?? '' }}</td>
                     </tr>

                     <tr>
                        <th style="width:200px">Category</th>
                        <td>
                            <span class="badge badge-secondary">{{ $news->category->name_en ?? '' }}</span>
                                   
                            <span class="badge badge-secondary">{{ $news->category->name_bn ?? '' }}</span>
                        </td>
                     </tr>

                     <tr>
                        <th style="width:200px">Sub Category</th>
                        <td>
                            <span class="badge badge-secondary">{{ $news->subcategory->name_en ?? '' }}</span>
                                   
                            <span class="badge badge-secondary">{{ $news->subcategory->name_bn ?? '' }}</span>
                        </td>
                     </tr>

                     <tr>
                        <th style="width:200px">Division</th>
                        <td>
                            <span class="badge badge-secondary">{{ $news->division->name_en ?? '' }}</span>
                                   
                            <span class="badge badge-secondary">{{ $news->division->name_bn ?? '' }}</span>
                        </td>
                     </tr>

                     <tr>
                        <th style="width:200px">District</th>
                        <td>
                           <span class="badge badge-secondary">{{ $news->district->name_en ?? '' }}</span>
                                   
                           <span class="badge badge-secondary">{{ $news->district->name_bn ?? '' }}</span>
                        </td>
                     </tr>

                     <tr>
                        <th style="width:200px">Tags</th>
                        <td>
                            <span class="badge badge-secondary">{{ $news->tags_en ?? '' }}</span>
                                   
                            <span class="badge badge-secondary">{{ $news->tags_bn  ?? ''}}</span>
                        </td>
                     </tr>

                     <tr>
                        <th style="width:200px">Tags</th>
                        <td>
                            <span class="badge badge-secondary">{{ $news->tags_en ?? '' }}</span>
                                   
                            <span class="badge badge-secondary">{{ $news->tags_bn ?? '' }}</span>
                        </td>
                     </tr>

                     <tr>
                        <th style="width:200px">Description English</th>
                        <td>{!! Str::limit(strip_tags($news->des_en), 300) ?? '' !!}</td>
                     </tr>

                     <tr>
                        <th style="width:200px">Description Bangla</th>
                        <td>{!! Str::limit(strip_tags($news->des_bn), 300) ?? '' !!}</td>
                     </tr>

                     <tr>
                        <th style="width:200px">News Date</th>
                        <td>{{ $news->news_date ?? '' }}</td>
                     </tr>

                     <tr>
                        <th style="width:200px">News Month</th>
                        <td>{{ $news->news_month ?? ''}}</td>
                     </tr>

                     <tr>
                        <th style="width:200px">Headline</th>
                        <td>{{ $news->headline ?? '' }}</td>
                     </tr>

                     <tr>
                        <th style="width:200px">First Section Small</th>
                        <td>{{ $news->first_section_small ?? '' }}</td>
                     </tr>

                     <tr>
                        <th style="width:200px">First Section Big</th>
                        <td>{{ $news->first_section_big ?? '' }}</td>
                     </tr>

                     <tr>
                        <th style="width:200px">Others Section Small</th>
                        <td>{{ $news->others_section_small ?? '' }}</td>
                     </tr>

                     <tr>
                        <th style="width:200px">Others Section Big</th>
                        <td>{{ $news->others_section_big ?? '' }}</td>
                     </tr>
               
                  </table>
                 
            </div>
            
          </div>
    </div>
  </div>
@endsection
