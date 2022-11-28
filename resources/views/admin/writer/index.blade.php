@extends('admin.layouts.app')
@section('title','Writer')
@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Writer</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Writer</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->  
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Manage Writer</h3>
              <div class="card-tools">
                  <a href="{{ route('admin.writers.create')}}" class="btn btn-primary">Add Writer</a>
              </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="myTable">
                    <thead>
                      <tr>
                        <th style="width: 10px">#Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Permission List</th>
                        <th>Role</th>
                        <th style="width: 120px">Acton</th>   
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($writers as $writer)
                     <tr id="ids{{$writer->id}}">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$writer->name ?? ''}}</td>
                        <td>{{$writer->email ?? ''}}</td>
                        <td>
                            @if($writer->category == 1)
                            <span class="badge badge-primary">Category</span>
                            @else
                            @endif
                            @if($writer->division == 1)
                            <span class="badge badge-primary">Division</span>
                            @else
                            @endif
                            @if($writer->news == 1)
                            <span class="badge badge-primary">News</span>
                            @else
                            @endif
                            @if($writer->ads == 1)
                            <span class="badge badge-primary">Ads</span>
                            @else
                            @endif
                            @if($writer->setting == 1)
                            <span class="badge badge-primary">Setting</span>
                            @else
                            @endif
                            @if($writer->gallery == 1)
                            <span class="badge badge-primary">Gallery</span>
                            @else
                            @endif
                            @if($writer->role == 1)
                            <span class="badge badge-primary">Role</span>
                            @else
                            @endif
                        </td>
                        <td>
                            @if($writer->type == 1)
                            <span class="badge badge-success">Admin</span>
                            @else
                            <span class="badge badge-success">Writer</span>
                            @endif
                        </td>
                        <td style="width: 120px">
                            <a href="{{ route('admin.writers.edit',$writer->id)}}" class="btn btn-warning btn-sm">Edit</a>

                            <button class="btn btn-danger btn-sm" id="writerDelete"
                            data-id ="{{$writer->id}}"
                           >Delete</button>  
                           
                        </td>
                      </tr>
                     @endforeach
                    </tbody>
                    
                  </table>
                 
            </div>
            
          </div>
    </div>
  </div>
@endsection

@push('scripts')
 
  <script>
    $( document ).ready(function() {
        $(document).on("click","#writerDelete",function(e) {
                e.preventDefault();
                let id = $(this).attr('data-id');
                  Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                  if (result.isConfirmed) {
                    $.ajax({
                    url    :  `/admin/writers/${id}`,
                    method : "delete",
                    success: function(result){
                      if(result.success == true){
                        $('#ids'+id).remove();
                        Toast.fire({
                          icon: 'success',
                          title:  result.message
                        })
                      }
                    }
                });
                }
              })
        });
        
    });

  </script>
  

@endpush