@extends('admin.layouts.app')
@section('title','Live Tv')
@section('title-content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Live Tv</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Live Tv</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->  
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-2">Embed_code Update</h3>
              <div class="card-tools">
                <input type="checkbox" {{ $livetv->status == 1 ? 'checked' : '' }} data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-off="Inactive" data-on="Active" data-id="{{$livetv->id}}" id="livetvStatus">
              </div> 
            </div>
            <form action="{{ route('admin.livetv.update',$livetv->id)}}" method="post">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group row">
                      <label for="embed_code" class="col-sm-3 col-form-label">Embed_code</label>
                      <div class="col-sm-9">
                          <textarea name="embed_code" id="embed_code" class="form-control">
                            {{ $livetv->embed_code}}
                          </textarea>
                      </div>
                    </div>
                    
                </div>
    
                <div class="card-footer">
                    <button type="submit" class="btn btn-info float-right">Update</button>
                </div>
            </form>
            
          </div>
    </div>
  </div>
@endsection

@push('scripts')
    <script>
        $( document ).ready(function() {
          $(document).on('change', '#livetvStatus', function() {
               let id = $(this).attr('data-id');

                if(this.checked){
                   var status = 1;
                }else{
                   status = 0;
                }
      
                let change = status == 1 ? 'Active' : 'Inactive';
                $.ajax({
                    url    : "{{ route('admin.livetv.status') }}",
                    method : "post",
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
        });
    </script>
@endpush



