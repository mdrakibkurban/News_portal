<!DOCTYPE html>

<html lang="en">
<head>
  @include('admin.layouts.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

 
@include('admin.layouts.nav')
@include('admin.layouts.aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        @include('flash::message')
        @yield('title-content')
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        @yield('content')
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('admin.layouts.footer')

  
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@include('admin.layouts.scripts')

@stack('scripts')
</body>
</html>
