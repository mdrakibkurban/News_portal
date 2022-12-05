@extends('admin.layouts.app')
@section('title','Profile')
@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Profile</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->  
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{(!empty($user->image)) ? asset("storage/user_images/".$user->image) : asset('/upload/extra.jpg')}}" alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">{{ $user->name }}</h3>

              <p class="text-muted text-center">
                 @if($user->type == 1)
                  Admin
                  @else
                  Writer
                  @endif
              </p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
         
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Update Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Change Password</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane" id="timeline">
                  <form class="form-horizontal" action="{{ route('admin.password.update')}}" method="post" >
                    @csrf
                    @method('put')
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-3 col-form-label">Old Password</label>
                    <div class="col-sm-9">
                        <input type="password" name="old_password" class="form-control" id="inputEmail" placeholder="Enter Old Password">
                        @error('old_password')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>

                    </div>

                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-3 col-form-label">New Password</label>
                        <div class="col-sm-9">
                          <input type="password" name="password" class="form-control" id="inputEmail" placeholder="Enter New Password">
                          @error('password')
                          <p style="color: red">{{ $message }}</p>
                          @enderror
                    </div>

                    </div>

                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-3 col-form-label">Confirm Password</label>
                        <div class="col-sm-9">
                          <input type="password" name="password_confirmation" class="form-control" id="inputEmail" placeholder="Enter Again New Password">
                      </div>
                      </div>

                    <div class="form-group row">
                      <div class="offset-sm-3 col-sm-9">
                        <button type="submit" class="btn btn-success">Update</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane active" id="settings">
                  <form class="form-horizontal" action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="inputName">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="inputEmail">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Image</label>
                      <div class="col-sm-10">
                        <input type="file" name="image" id="inputName2">
                      </div>
                    </div>
                   
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Upddate</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection




