@extends('admin.layouts.app')

@section('title','SubDistrict')
@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">SubDistrict</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">SubDistrict</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->  
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Manage Sub-District</h3>
              <button class="btn btn-danger ml-3" id="deleteItems">Delete All</button>
              <div class="card-tools">
                  <a href="{{ route('admin.sub-districts.create')}}" class="btn btn-primary">Add Sub-District</a>
              </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="myTable">
                    <thead>
                      <tr>
                        <th><input type="checkbox" id="chcekAll"></th>
                        <th style="width: 10px">#Id</th>
                        <th>Name English</th>
                        <th>Name Bangla</th>
                        <th>District Name</th>
                        <th style="width: 120px">Acton</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($subDistricts as $subDistrict)
                            <tr id="ids{{ $subDistrict->id }}">
                              <td> 
                                <input type="checkbox" class="checkBox" data-id={{$subDistrict->id}}>
                              </td>
                               <td>{{ $loop->iteration }}</td>
                               <td>{{ $subDistrict->subdistrict_en }}</td>
                               <td>{{ $subDistrict->subdistrict_bn }}</td>
                               <td>
                                   <span class="badge badge-secondary">{{ $subDistrict->district->district_en }}</span>
                                   
                                   <span class="badge badge-secondary">{{ $subDistrict->district->district_bn }}</span>
                                </td>
                               <td>
                                 <a href="{{ route('admin.sub-districts.edit',$subDistrict->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                  <button type="button" class="btn btn-danger btn-sm"
                                  data-id = "{{ $subDistrict->id }}" id="subDistrictDelete"
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
        $(document).on("click","#subDistrictDelete",function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id');
            $.ajax({
              url    : `/admin/sub-districts/${id}`,
              method : 'delete',
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
            })

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
                     url    : "{{ route('admin.sub-district.remove.items') }}",
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