@extends('admin.layouts.app')
@section('title','Notice')
@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Notice</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Notice</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->  
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Manage Notice</h3>
              <button class="btn btn-danger ml-3" id="deleteNoticeItems">Delete All</button>
              <div class="card-tools">
                  <a href="{{ route('admin.notices.create')}}" class="btn btn-primary">Add Notice</a>
              </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="myTable">
                    <thead>
                      <tr>
                        <th style="width: 10px"><input type="checkbox" id="checkAll"/></th>
                        <th style="width: 10px">#Id</th>
                        <th>Notice English</th>
                        <th>Notice Bangla</th>
                        <th style="width: 100px">Status</th>
                        <th style="width: 120px">Acton</th>   
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($notices as $notice)
                     <tr id="ids{{$notice->id}}">
                        <td>
                          <input type="checkbox" name="ids" class="checkBox" 
                          data-id ="{{$notice->id}}"/>
                        </td>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$notice->notice_en ?? ''}}</td>
                        <td>{{$notice->notice_bn ?? ''}}</td>
                        <td>
                          <input type="checkbox" data-toggle="toggle" data-on="Active"  data-off="Inactive" id="noticeStatus" data-id="{{$notice->id}}"
                          data-size="small" data-width="85" data-onstyle="success" data-offstyle="danger" {{ $notice->status === 1 ? 'checked' : ''}}>
                        </td>
                        <td style="width: 120px">
                            <a href="{{ route('admin.notices.edit',$notice->id)}}" class="btn btn-warning btn-sm">Edit</a>

                            <button class="btn btn-danger btn-sm" id="noticeDelete"
                            data-id ="{{$notice->id}}"
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
        $(document).on("click","#noticeDelete",function(e) {
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
                    url    :  `/admin/notices/${id}`,
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

        $(document).on("change","#noticeStatus",function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            if(this.checked){
               var status = 1;
            }else{
               var status = 0;
            }
  
            let change = status == 1 ? 'Active' : 'Inactive';
            $.ajax({
                url    : "{{ route('admin.notice.status') }}",
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

      //All Notice Delete
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


        $(document).on("click","#deleteNoticeItems",function(e) {
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
                          url    : "{{ route('admin.notice.remove.items') }}",
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
        //All Notice Delete
        
    });

  </script>
  

@endpush