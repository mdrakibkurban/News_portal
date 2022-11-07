@extends('admin.layouts.app')
@section('title','District')
@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">district</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">District</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->  
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Manage District</h3>
              <button class="btn btn-danger ml-3" id="deleteItems">Delete All</button>
              <div class="card-tools">
                  <a href="{{ route('admin.districts.create')}}" class="btn btn-primary">Add District</a>
              </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="myTable">
                    <thead>
                      <tr>
                        <th style="width: 10px"><input type="checkbox" id="checkAll"/></th>
                        <th style="width: 10px">#Id</th>
                        <th>District English</th>
                        <th>District Bangla</th>
                        <th style="width: 120px">Acton</th>   
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($districts as $district)
                     <tr id="ids{{$district->id}}">
                        <td>
                          <input type="checkbox" class="checkBox" data-id={{$district->id}}>
                        </td>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$district->district_en ?? ''}}</td>
                        <td>{{$district->district_bn ?? ''}}</td>
                        <td style="width: 120px">
                            <a href="{{ route('admin.districts.edit',$district->id)}}" class="btn btn-warning btn-sm">Edit</a>

                            <button class="btn btn-danger btn-sm" id="districtDelete"
                            data-id ="{{$district->id}}"
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
        $(document).on("click","#districtDelete",function(e) {
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
                  url    :  `/admin/districts/${id}`,
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
          
         $(document).on("click","#deleteItems",function(e) {
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
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    $.ajax({
                      url    : "{{ route('admin.district.remove.items') }}",
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