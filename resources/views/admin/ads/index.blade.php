@extends('admin.layouts.app')
@section('title','Ads')
@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Ads</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Ads</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->  
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Manage Ads</h3>
              <div class="card-tools">
                  <a href="{{ route('admin.ads.create')}}" class="btn btn-primary">Add Ads</a>
              </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="myTable">
                    <thead>
                      <tr>
                        <th style="width: 10px">#Id</th>
                        <th>Ads</th>
                        <th style="width: 100px">Type</th>
                        <th style="width: 120px">Acton</th>   
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($ads as $row)
                     <tr id="ids{{$row->id}}">
                        <td>{{$loop->iteration}}</td>
                        <td>
                          @if($row->type == 1)
                          <img width="100" height="100" src="{{ asset('storage/vartical_images/'.$row->ads) }}" alt="news">
                          @else
                          <img width="400" height="50" src="{{ asset('storage/horizotal_images/'.$row->ads) }}" alt="news">
                          @endif
                        </td>
                        <td>
                          @if($row->type == 1)
                          <span class="badge badge-secondary">Vartical Ads</span>
                          @else
                          <span class="badge badge-secondary">Horizotal Ads</span>
                          @endif
                        </td>
                        
                        <td style="width: 120px">
                            <a href="{{ route('admin.ads.edit',$row->id)}}" class="btn btn-warning btn-sm">Edit</a>

                            <button class="btn btn-danger btn-sm" id="AdsDelete"
                            data-id ="{{$row->id}}"
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
        $(document).on("click","#AdsDelete",function(e) {
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
                    url    :  `/admin/ads/${id}`,
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