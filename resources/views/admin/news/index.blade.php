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
              <h3 class="card-title mt-2">Manage News</h3>
              <button class="btn btn-danger ml-3" id="deleteNewsItems">Delete All</button>
              <div class="card-tools">
                  <a href="{{ route('admin.news.create') }}" class="btn btn-primary">Add News</a>
              </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="myTable">
                    <thead>
                      <tr>
                        <th style="width: 10px">
                          <input type="checkbox" id="checkAll">
                        </th>
                        <th style="width: 10px">#Id</th>
                        <th>Image</th>
                        <th>Created By</th>
                        <th>News Bangla</th>
                        <th style="width: 140px">Description Bangla</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th style="width: 120px">Acton</th>
                      </tr>
                    </thead>
                    <tbody>
                       @foreach($news as $row)
                           <tr id="ids{{$row->id}}">
                             <td>
                              <input type="checkbox" class="checkBox"  data-id="{{$row->id}}">
                             </td>
                             <td>{{ $loop->iteration }}</td>
                             <td>
                              <img width="50" height="50" src="{{ asset('storage/news_images/'.$row->image) }}" alt="news">
                             </td>
                             <td>{{ $row->user->name }}</td>
                             <td>{{ Str::limit($row->news_bn, 15) }}</td>
                             <td>{!! Str::limit(strip_tags($row->des_bn), 20) !!}</td>
                             <td>
                              <input type="checkbox" {{$row->status == 1 ? 'checked' : ''}} data-toggle="toggle" data-size="small" data-id="{{$row->id}}"
                              data-width="85" data-on="Active" data-off="Inactive"
                              data-onstyle="success" data-offstyle="danger" id="newsStatus">
                             </td>
                             <td>{{ $row->news_date }}</td>
                             <td>
                               <a title="Details" href="{{ route('admin.news.show',$row->id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>

                               <a title="Edit" href="{{ route('admin.news.edit',$row->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit text-white"></i></a>

                               <button type="button" data-id="{{ $row->id }}" title="Delete" id="newsDelete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>

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
        $(document).on('change', '#newsStatus', function() {
            let id = $(this).attr('data-id');
            if(this.checked){
               var status = 1;
            }else{
                  status = 0;
            }

            let change = status == 1 ? 'Active' : 'Inactive';
            $.ajax({
              url    : "{{ route('admin.news.status') }}",
              method : "get",
              data   : {id : id , status : status},
              success: function(result){
                  if(result.success == true){
                    Toast.fire({
                        icon: 'success',
                        title: result.message +' '+ change +'!!',
                    })
                  }
              }
            });
        });

        $(document).on('click', '#newsDelete', function(e) {
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
                    url    : `/admin/news/${id}`,
                    method : "delete",
                    success: function(result){
                        if(result.success == true){
                          $("#ids"+id).remove()
                          Toast.fire({
                              icon: 'success',
                              title: result.message,
                          })
                        }
                    }
                  });
                }
              })
           
        });


        // multiple delete
        $(document).on('click', '#checkAll', function() {
             if($(this).is(':checked',true)){
                 $('.checkBox').prop('checked',true)
             }else{
                 $('.checkBox').prop('checked',false)
             }
        });


        $(document).on('click', '.checkBox', function() {
             if($('.checkBox:checked').length == $('.checkBox').length){
                 $('#checkAll').prop('checked',true)
             }else{
                 $('#checkAll').prop('checked',false)
             }    
        });

        
        $(document).on('click', '#deleteNewsItems', function(e) {
            e.preventDefault();
             let idsArr = [];

             $('.checkBox:checked').each(function(){
                 idsArr.push($(this).attr('data-id'));
             });

             
             if(idsArr.length < 1){
                alert('please select atleast one item!!');
             }else{
                
              let strIds = idsArr.join(",");

               Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete items it!'
              }).then((result) => {
                if (result.isConfirmed) {
                  $.ajax({
                    url    : "{{ route('admin.news.remove.items') }}",
                    method : "post",
                    data   : {strIds : strIds},
                    success: function(result){
                        if(result.success == true){
                          $('.checkBox:checked').each(function(){
                             $(this).parents("tr").remove();
                          });
                          Toast.fire({
                              icon: 'success',
                              title: result.total+' '+result.message,
                          })
                        }
                    }
                  });
                }
              })

             }
        });

      });
    </script>
@endpush