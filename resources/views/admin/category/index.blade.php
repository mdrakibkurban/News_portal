@extends('admin.layouts.app')
@section('title','Category')
@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Category</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Category</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->  
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Manage Category</h3>
              <div class="card-tools">
                  <a href="{{ route('admin.categories.create')}}" class="btn btn-primary">Add Category</a>
              </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="myTable">
                    <thead>
                      <tr>
                        <th style="width: 10px">#Id</th>
                        <th>Name</th>
                        <th>User</th>
                        <th style="width: 80px">Status</th>
                        <th style="width: 150px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($categories as $category)
                     <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$category->name ?? ''}}</td>
                        <td>{{$category->user->name ?? ''}}</td>
                        <td>
                            @if($category->status === 1 )
                            <a href="{{ route('admin.status.category',$category->id)}}"
                                onclick="return confirm('Are you sure change status?')" class="badge badge-primary">Active</a>  
                            @else
                            <a href="{{ route('admin.status.category',$category->id)}}" onclick="return confirm('Are you sure change status?')" class="badge badge-danger">Inactive</a> 
                            @endif
                        <td>
                            <a href="{{ route('admin.categories.edit',$category->id)}}" class="btn btn-warning btn-sm">Edit</a>

                            {{-- delete category --}}
                            <button class="btn btn-danger btn-sm"
                             data-id ="category-delete-{{$category->id}}"
                             id="deleteCategory"
                            >Delete</button>

                            <form id="category-delete-{{$category->id}}" action="{{ route('admin.categories.destroy',$category->id)}}" method="post">
                               @csrf
                               @method('delete')
                            </form>
                            {{-- delete category --}}
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
        $(document).on("click","#deleteCategory",function() {
            let id = $(this).data('id');
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
                $('#'+id).submit();
                Swal.fire(
                'Deleted!',
                'Category has been deleted.',
                'success'
                )
            }
            })
        });
  </script>
@endpush