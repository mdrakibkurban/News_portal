@extends('admin.layouts.app')
@section('title','Dashboard')
@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Dashboard</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->  
@endsection

@section('content')
<div class="container-fluid">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ count($news_total) }}</h3>
      
          <p>Total News</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="{{ route('admin.news.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{ count($category) }}</h3>
          <p>Total Category</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="{{ route('admin.categories.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{ count($writers) }}</h3>

          <p>Total Writers</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="{{ route('admin.writers.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{ count($ads) }}</h3>

          <p>Total Ads</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="{{ route('admin.ads.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>

  <div class="card">
    <div class="card-header ui-sortable-handle" style="cursor: move;">
      <h3 class="card-title">
        <i class="fas fa-chart-pie mr-1"></i>
        Top News
      </h3>
    </div><!-- /.card-header -->
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width: 50px">#</th>
            <th>Title Bangla</th>
            <th>Title English</th>
            <th>Image</th>
            <th>status</th>
          </tr>
        </thead>
        <tbody>
          @foreach($news as $row)  
          <tr>
            <td style="width: 50px">{{ $loop->iteration }}</td>
            <td>{{ $row->news_bn }}</td>
            <td>{{ $row->news_en }}</td>
            <td> 
              <img width="50" height="50" src="{{ asset('storage/news_images/'.$row->image) }}" alt="news">
            </td>
            <td>
              @if($row->status == 1 )
              <span class="btn btn-primary btn-sm">Active</span>
              @else
              <span class="btn btn-danger btn-sm">InAcive</span>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div><!-- /.card-body -->
  </div>
</div>
@endsection