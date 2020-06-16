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
        <a href="#" class="btn btn-primary" id="add-blog">Upload Background images</a><hr>
        <table class="table" id="blog">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Home page Image</th>
                <th scope="col">About page Image</th>
                <th scope="col">Courses page Image</th>
                <th scope="col">Donate page Image</th>
                <th scope="col">Blog page Image</th>
                <th scope="col">Gallery page Image</th>
                <th scope="col">Events page Image</th>
                <th scope="col">Contact page Image</th>
                <th scope="col">Home page Video</th>
                <th scope="col">Blog Title</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($settings as $blog)
                    
              <tr>
                <th scope="row">{{ $blog->id }}</th>
                <td> <img src="/storage/images/{{ $blog->image1 }}" width="100" alt=""> </td>
                <td> <img src="/storage/images/{{ $blog->image2 }}" width="100" alt=""> </td>
                <td> <img src="/storage/images/{{ $blog->image3 }}" width="100" alt=""> </td>
                <td> <img src="/storage/images/{{ $blog->image4 }}" width="100" alt=""> </td>
                <td> <img src="/storage/images/{{ $blog->image5 }}" width="100" alt=""> </td>
                <td> <img src="/storage/images/{{ $blog->image6 }}" width="100" alt=""> </td>
                <td> <img src="/storage/images/{{ $blog->image7 }}" width="100" alt=""> </td>
                <td> <img src="/storage/images/{{ $blog->image8 }}" width="100" alt=""> </td>
                <td> <img src="/storage/images/{{ $blog->video }}" width="100" alt=""> </td>
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
          <h5 class="modal-title" id="exampleModalLabel">Update Images</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('setting') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="title">Home Image</label>
                    <input type="file" name="image1" id="image1" class="form-control" >
                </div>
                <div class="col-md-6">
                    <label for="title">About Image</label>
                    <input type="file" name="image2" id="image2" class="form-control" >
                </div>
                <div class="col-md-6">
                    <label for="title">Courses Image</label>
                    <input type="file" name="image3" id="image3" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="title">Donate Image</label>
                    <input type="file" name="image4" id="image4" class="form-control" >
                </div>
                <div class="col-md-6">
                    <label for="title">Blog Image</label>
                    <input type="file" name="image5" id="image5" class="form-control" >
                </div>
                <div class="col-md-6">
                    <label for="title">Gallery Image</label>
                    <input type="file" name="image6" id="image6" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="title">Events Image</label>
                    <input type="file" name="image7" id="image7" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="title">Contact Image</label>
                    <input type="file" name="image8" id="image8" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="title">Video</label>
                    <input type="file" name="video" id="video" class="form-control">
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
                        <input type="file" name="edit_image" id="editimage" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="desc">Description</label>
                        <textarea name="editdesc" id="editdesc" cols="30" rows="10" class="form-control" ></textarea>
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
            // $("#blog").DataTable({responsive:true})
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
                        tinymce.get('editdesc').setContent(data.description);
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