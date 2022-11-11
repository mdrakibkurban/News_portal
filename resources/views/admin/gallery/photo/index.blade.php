@extends('admin.layouts.app')
@section('title','Photo')
@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Photo</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Photo</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->  
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Manage Photo</h3>
              <button class="btn btn-danger ml-3" id="deletePhotoItems">Delete All</button>
              <div class="card-tools">
                  <a href="{{ route('admin.photos.create')}}" class="btn btn-primary">Add Photo Gallery</a>
              </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="myTable">
                    <thead>
                      <tr>
                        <th style="width: 10px"><input type="checkbox" id="checkAll"/></th>
                        <th style="width: 10px">#Id</th>
                        <th>Title English</th>
                        <th>Title Bangla</th>
                        <th style="width: 100px">Photo</th>
                        <th style="width: 120px">Acton</th>   
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($photos as $photo)
                     <tr id="ids{{$photo->id}}">
                        <td>
                          <input type="checkbox" name="ids" class="checkBox" 
                          data-id ="{{$photo->id}}"/>
                        </td>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$photo->title_en ?? ''}}</td>
                        <td>{{$photo->title_bn ?? ''}}</td>
                        <td>
                          <img width="50" height="50" src="{{ asset('storage/photo_images/'.$photo->photo) }}" alt="news">
                        </td>
                        <td style="width: 120px">
                            <a href="{{ route('admin.photos.edit',$photo->id)}}" class="btn btn-warning btn-sm">Edit</a>

                            <button class="btn btn-danger btn-sm" id="photoDelete"
                            data-id ="{{$photo->id}}"
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
        $(document).on("click","#photoDelete",function(e) {
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
                    url    :  `/admin/photos/${id}`,
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


      //All Photo Delete
        $(document).on("click","#checkAll",function() {
             if($(this).is(':checked',true)){
                 $('.checkBox').prop('checked',true);
             }else{
                 $('.checkBox').prop('checked',false);
             }
        });

        $(document).on("click",".checkBox",function() {
             if($('.checkBox:checked').length == $('.checkBox').length){
                 $('#checkAll').prop('checked',true);
             }else{
                $('#checkAll').prop('checked',false);
             }
        });


        $(document).on("click","#deletePhotoItems",function(e) {
             e.preventDefault()
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
                          url    : "{{ route('admin.photo.remove.items') }}",
                          method : "post",
                          data   : {strIds : strIds},
                          success: function(result){
                            if(result.success == true){
                               $('.checkBox:checked').each(function(){
                                $(this).parents("tr").remove();
                               });
                                Toast.fire({
                                    icon: 'success',
                                    title: result.total+' '+result.message
                                })
                                    
                              }   
                          }
                        });   
                      }
                    })  
             }
        });
        //All Photo Delete
        
    });

  </script>
  

@endpush