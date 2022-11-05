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
              <h3 class="card-title mt-2">Manage Category</h3>
              <button class="btn btn-danger ml-3" id="deleteAllCategory">Delete All</button>
              <div class="card-tools">
                  <a href="{{ route('admin.categories.create')}}" class="btn btn-primary">Add Category</a>
              </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="myTable">
                    <thead>
                      <tr>
                        <th style="width: 10px"><input type="checkbox" id="checkAll"/></th>
                        <th style="width: 10px">#Id</th>
                        <th>Name_En</th>
                        <th>Name_Bn</th>
                        <th style="width: 100px">Status</th>
                        <th style="width: 120px">Acton</th>   
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($categories as $category)
                     <tr id="{{$category->id}}">
                        <td>
                          <input type="checkbox" name="ids" class="checkBox" 
                          data-id ="{{$category->id}}"/>
                        </td>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$category->name_en ?? ''}}</td>
                        <td>{{$category->name_bn ?? ''}}</td>
                        <td>
                          <input type="checkbox" data-toggle="toggle" data-on="Active"  data-off="Inactive" id="categoryStatus" data-id="{{$category->id}}"
                          data-size="small" data-width="85" data-onstyle="success" data-offstyle="danger" {{ $category->status === 1 ? 'checked' : ''}}>
                        </td>
                        <td style="width: 120px">
                            <a href="{{ route('admin.categories.edit',$category->id)}}" class="btn btn-warning btn-sm">Edit</a>

                            <button class="btn btn-danger btn-sm" id="categoryDelete"
                            data-id ="{{$category->id}}"
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
        $(document).on("click","#categoryDelete",function() {
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
                    url    :  `/admin/categories/${id}`,
                    method : "delete",
                    success: function(result){
                      if(result.success == true){
                        Toast.fire({
                          icon: 'success',
                          title:  result.message
                        })
                        window.location.reload();
                      }
                    },error: function (error) {
                      alert(error);
                    }
                });
                }
              })
        });

        $(document).on("change","#categoryStatus",function() {
            let id = $(this).data('id');
            if(this.checked){
               var status = 1;
            }else{
               var status = 0;
            }
  
            let change = status == 1 ? 'Active' : 'Inactive';
            $.ajax({
                url    : "{{ route('admin.category.status') }}",
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

      //All Category Delete
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


        $(document).on("click","#deleteAllCategory",function() {
             let idsArr = [];
             $('.checkBox:checked').each(function(){
                 idsArr.push($(this).attr('data-id'));
             });

             if(idsArr.length < 1){
                alert('please select atleast 1 item!!');
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
                          url    : "{{ route('admin.category.remove.items') }}",
                          method : "post",
                          data   : {strIds : strIds},
                          success: function(result){
                              if(result.success == true){
                                if(result.success == true){
                                    Toast.fire({
                                        icon: 'success',
                                        title: result.total+' '+result.message
                                    })
                                    window.location.reload();
                                  }
                              }
                          }
                        });   
                      }
                    })  
             }
        });
        //All Category Delete
        
    });

  </script>
  

@endpush