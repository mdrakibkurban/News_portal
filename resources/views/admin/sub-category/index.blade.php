@extends('admin.layouts.app')
@section('title','SubCategory')
@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">SubCategory</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">SubCategory</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->  
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Manage Sub-Category</h3>
              <button class="btn btn-danger ml-3" id="deleteItems">Delete All</button>
              <div class="card-tools">
                  <a href="{{ route('admin.sub-categories.create')}}" class="btn btn-primary">Add Sub-Category</a>
              </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="myTable">
                    <thead>
                      <tr>
                        <th style="width: 10px">
                          <input type="checkbox" id="chcekAll">
                        </th>
                        <th style="width: 10px">#Id</th>
                        <th>SubCategory English</th>
                        <th>SubCategory Bangla</th>
                        <th>Category Name</th>
                        <th style="width: 100px">Status</th>
                        <th style="width: 120px">Acton</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($subCategories as $subCategory)
                            <tr id="ids{{$subCategory->id}}">
                              <td>
                                <input type="checkbox" class="checkBox" data-id={{$subCategory->id}}>
                              </td>
                               <td>{{ $loop->iteration }}</td>
                               <td>{{ $subCategory->name_en }}</td>
                               <td>{{ $subCategory->name_bn }}</td>
                               <td>
                                   <span class="badge badge-secondary">{{ $subCategory->category->name_en }}</span>
                                   
                                   <span class="badge badge-secondary">{{ $subCategory->category->name_bn }}</span>
                                </td>
                               <td>
                                <input type="checkbox" data-toggle="toggle" data-size="small"
                                data-width="85" data-on="Active" data-off="Inactive"  data-onstyle="success" data-offstyle="danger" id="changeStatus"
                                data-id="{{$subCategory->id}}"
                                data-status="{{$subCategory->status}}"
                                {{ $subCategory->status == 1 ? 'checked' : '' }}
                                >
                              </td>
                               <td>
                                 <a href="{{ route('admin.sub-categories.edit',$subCategory->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                 <button class="btn btn-danger btn-sm" id="subCategoryDelete"
                                  data-id ="{{$subCategory->id}}"
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
       $(document).on("click","#subCategoryDelete",function(e) {
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
                  url    :  `/admin/sub-categories/${id}`,
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



        $(document).on("change","#changeStatus",function(e) {
             e.preventDefault();
             let id = $(this).attr('data-id');
             
             if(this.checked){
               var status = 1;
             }else{
                var status = 0;
             }

             let change = status == 1 ? 'Active' : 'Inactive';
             $.ajax({
                url    : "{{ route('admin.sub-category.status') }}",
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


        $(document).on("click","#chcekAll",function() {
            if($(this).is(':checked',true)){
              $('.checkBox').prop('checked',true);
            }else{
              $('.checkBox').prop('checked',false);
            }   
        });


        $(document).on("click",".checkBox",function() {
          if($('.checkBox:checked').length == $('.checkBox').length){
              $('#chcekAll').prop('checked',true);
          }else{
              $('#chcekAll').prop('checked',false);
          }
          
         });

         $(document).on("click","#deleteItems",function(e) {
            e.preventDefault();
            let idsArr = [];

            $('.checkBox:checked').each(function(){
                idsArr.push($(this).attr('data-id'));
            });

            if(idsArr.length < 1){
              alert('please select atleast one item!!')
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
                     url    : "{{ route('admin.sub-category.remove.items') }}",
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


    });
 </script>
    
@endpush