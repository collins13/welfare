@extends('base')
@section('content')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-2">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-4 fw-bold">Blogs</h2>
                {{-- <h5 class="text-white op-7 mb-2">Free Bootstrap 4 Admin Dashboard</h5> --}}
            </div>
        
        </div>
    </div>
</div>


<div class="card mt-4">
    
    <div class="card-body">
        <a href="#" class="btn btn-primary" id="add-blog">Add Blog</a><hr>
        <table class="table" id="blog">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Blog Title</th>
                <th scope="col">Blog Image</th>
                <th scope="col">Created By</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    
              <tr>
                <th scope="row">{{ $blog->id }}</th>
                <td>{{ $blog->title  }}</td>
                <td> <img src="/storage/images/{{ $blog->image }}" width="100" alt=""> </td>
                <td>{{ $blog->created_by }}</td>
                <td>{{ Carbon\Carbon::parse($blog->created_at)->isoFormat('dddd, MMMM Do YYYY') }}</td>
                <td>
                    <a href="#" class="edit btn btn-sm btn-info" data-id="{{ $blog->id }}"><i class="fa fa-pencil"></i> Edit</a>
                    <a href="#" class="delete btn btn-sm btn-danger" data-id="{{ $blog->id }}" data-token="{{ csrf_token() }}"><i class="fa fa-trash-o"></i> Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Blog</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('add_blog') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="title">Image</label>
                    <input type="file" name="image" id="image" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="desc">Description</label>
                    <textarea name="desc" id="desc" cols="30" rows="10" class="form-control" required></textarea>
                </div>
            </div>
            <br>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
        </form>
        </div>
       
      </div>
    </div>
  </div>

  
  <!-- Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Blog</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('update_blog') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id">
                <div class="row">
                    <div class="col-md-6">
                        <label for="title">Title</label>
                        <input type="text" name="edittitle" id="edittitle" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="title">Image</label>
                        <input type="file" name="edit_image" id="editimage" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="desc">Description</label>
                        <textarea name="editdesc" id="editdesc" cols="30" rows="10" class="form-control" required></textarea>
                    </div>
                </div>
                <br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
            </form>
        </div>
       
      </div>
    </div>
  </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $("#blog").DataTable({responsive:true})
            $("#add-blog").click(function(){
                $("#addModal").modal("show");
            })

            $(".edit").click(function(){
                $("#editModal").modal('show');
                var id = $(this).data('id');

                $.ajax({
                    url:"{{ route('edit_blog') }}",
                    type:"get",
                    data:{'id': id},
                    success:function(res){
                        var data = res.edit_cat;
                        $("#edittitle").val(data.title);
                        $("#editdesc").val(data.description);
                        $("#id").val(data.id);
                    },
                    error:function(err){
                        toastr.error('an error occured');
                    }
                })
            })

            $(".delete").click(function(){
                var id = $(this).data('id');
                var token = $(this).data('token');

                if (confirm("are you sure you want to delete?!")) {
                    toastr.info('Deleting...', { fadeAway: 1000 });
                    $.ajax({
                    url:"/delete_blog/"+id,
                    type:"post",
                    data:{'id': id, '_token':token},
                    success:function(res){
                       toastr.success("deleted successfully", "success");
                       setTimeout(() => {
                           location.reload();
                       }, 1000);
                    },
                    error:function(err){
                        toastr.error('an error occured');
                    }
                })
                }else{
                    toastr.info("cancelled", "info");
                }
            })
        })
    </script>
@endpush