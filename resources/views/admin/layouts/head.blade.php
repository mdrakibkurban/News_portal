<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title')</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="{{asset("/admin/plugins/fontawesome-free/css/all.min.css")}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset("/admin/dist/css/adminlte.min.css")}}">
 <!-- Select2 -->
<link rel="stylesheet" href="{{asset("/admin/plugins/select2/css/select2.min.css")}}">
  <!-- summernote -->
<link rel="stylesheet" href="{{asset("/admin/plugins/summernote/summernote-bs4.min.css")}}">

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

<style>
    .select2-selection {
     padding-bottom: 28px!important;
   }
   .select2-selection__arrow{
     padding-bottom: 35px!important;
   }
   
</style>

