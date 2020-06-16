@extends('base')

@section('content')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-2">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-4 fw-bold">Courses</h2>
                {{-- <h5 class="text-white op-7 mb-2">Free Bootstrap 4 Admin Dashboard</h5> --}}
            </div>
        
        </div>
    </div>
</div>

<div class="card">
    <nav>
        <div class="nav nav-tabs mt-4 ml-3" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Course Categories</a>
          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Courses</a>
        </div>
      </nav>
      <div class="tab-content mt-4 ml-3" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <a href="#" id="add-cat" class="btn btn-primary">Add Category</a><hr>
            <table class="table" id="cat" style="width: 100%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Create At</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($cats as $cat)
                    <tr>
                        <th scope="row">{{ $cat->id }}</th>
                        <td>{{ $cat->title }}</td>
                        <td>{{ $cat->created_at }}</td>
                        <td>
                            <a href="#" class="edit-cat btn btn-sm btn-info" data-id="{{ $cat->id }}"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="#" class="delete-cat btn btn-sm btn-danger" data-id="{{ $cat->id }}" data-token="{{ csrf_token() }}"><i class="fa fa-trash-o"></i> Delete</a>
                        </td>
                      </tr>
                    @endforeach
                 
                </tbody>
              </table>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <a href="#" id="add-course" class="btn btn-primary">Add Course</a><hr>
            <table class="table" id="course" style="width: 100%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Course Category</th>
                    <th scope="col">Image</th>
                    <th scope="col">Amount Needed</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                    <tr>
                        <th scope="row">{{ $course->id }}</th>
                        <td>{{ $course->categories['title'] }}</td>
                        <td> <img src="/storage/images/{{ $course->image }}" width="100" alt=""> </td>
                        <td>{{ $course->Amount }}</td>
                        <td>
                          <a href="#" class="edit-course btn btn-sm btn-info" data-id="{{ $course->id }}"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="#" class="delete-course btn btn-sm btn-danger" data-id="{{ $course->id }}" data-token="{{ csrf_token() }}"><i class="fa fa-trash-o"></i> Delete</a>
                        </td>
                      </tr>
                    @endforeach
                 
                </tbody>
              </table>
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
      </div>
    </div>
  </div>

  {{-- cat --}}
  <!-- Button trigger modal -->
  
  <!-- Modal -->
  <div class="modal fade" id="catModal" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <form name="add_name" action="{{ route('add_cat') }}" method="POST" id="add_name">  
       @csrf
       
                   <div class="alert alert-danger print-error-msg" style="display:none">
                   <ul></ul>
                   </div>
       
       
                   <div class="alert alert-success print-success-msg" style="display:none">
                   <ul></ul>
                   </div>
       
       
                   <div class="table-responsive">  
                       <table class="table table-bordered" id="dynamic_field">  
                           <tr>  
                               <td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control mb-2 name_list"  required/></td>  
                               <td><button type="button" name="add" id="add" class="btn btn-success mb-2"><i class="fa fa-plus"></i></button></td>  
                           </tr>  
                       </table>  
                   </div>
       
                   <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>  
           </div> 
        </div>
        
      </div>
    </div>
  </div>

  <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="editCatModal" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('update_cat') }}" method="POST">
            @csrf
            <input type="hidden" name="id" id="id">
            <div class="row">
                <div class="col-md-6">
                    <label for="cat">Category Name</label>
                    <input type="text" name="name" id="name" class="form-control">
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
  {{-- end cat --}}


  {{-- course --}}
<!-- Button trigger modal -->
  
  <!-- Modal -->
  <div class="modal fade" id="courseModal" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('add_course') }}" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="row">
                  <div class="col-md-6">
                    <label for="cat">Course Category</label>
                    <select name="cat" id="newcat" class="form-control chosen validatecat" required>
                        <option value="">--select--</option>
                        @foreach ($cats as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="col-md-6">
                      <label for="image">Course Image</label>
                      <input type="file" name="image" id="image" class="form-control" required>
                  </div>
                  <div class="col-md-6">
                    <label for="image">Amount Needed</label>
                    <input type="number" name="amount" step="0.01" min="0" id="amount" class="form-control" required>
                </div>
                
              </div>
              <div class="row">
                <div class="col-md-12">
                    <label for="image">Description</label>
                    <textarea name="desc" id="desc" cols="30" rows="10" class="form-control"></textarea>
                </div>
              </div>
            
            <br>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submin</button>
              </div>
          </form>
         
        </div>
       
      </div>
    </div>
  </div>

  <div class="modal fade" id="editcourseModal" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Course</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('update_course') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id="courseid">
              <div class="row">
                  <div class="col-md-6">
                    <label for="cat">Course Category</label>
                    <select name="editcat" id="editcat" class="form-control chosen validatecat" required>
                        <option value="">--select--</option>
                        @foreach ($cats as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="col-md-6">
                      <label for="image">Course Image</label>
                      <input type="file" name="edit_image" id="image" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label for="image">Amount Needed</label>
                    <input type="number" name="editamount" step="0.01" min="0" id="editamount" class="form-control" required>
                </div>
                
              </div>
              <div class="row">
                <div class="col-md-12">
                    <label for="image">Description</label>
                    <textarea name="editdesc" id="editdesc" cols="30" rows="10" class="form-control"></textarea>
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
  {{-- end course --}}
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $("#cat").DataTable({responsive:true});
            $("#course").DataTable({responsive:true});

            $("#add-cat").click(function(){
                $("#catModal").modal('show');
            })
            $(".edit-cat").click(function(){
                $("#editCatModal").modal('show');
                var id = $(this).data('id');

                $.ajax({
                    url:"{{ route('edit_cat') }}",
                    type:"get",
                    data:{'id': id},
                    success:function(res){
                        var data = res.edit_cat;
                        $("#name").val(data.title);
                        $("#id").val(data.id);
                    },
                    error:function(err){
                        toastr.error('an error occured');
                    }
                })
            })


            $(".delete-cat").click(function(){
                var id = $(this).data('id');
                var token = $(this).data('token');

                if (confirm("are you sure you want to delete?!")) {
                    toastr.info('Deleting...', { fadeAway: 1000 });
                    $.ajax({
                    url:"/delete_cat/"+id,
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

            $("#add-course").click(function(){
                $("#courseModal").modal('show');
            })

              var cate = '{!! $cats !!}';
             $(".edit-course").click(function(){
                $("#editcourseModal").modal('show');

                var id = $(this).data('id');

                $.ajax({
                    url:"{{ route('edit_course') }}",
                    type:"get",
                    data:{'id': id},
                    success:function(res){
                        var data = res.edit_cat;
                        var categories = JSON.parse(cate)
                        $.each(categories, function(key, value){
                          if(data.course_id == value.id){
                            $('#editcat option[value='+value.id+']').prop('selected','selected')
                          }
                        });
                        $('.chosen').trigger('chosen:updated');
                        $("#editamount").val(data.Amount);
                        $("#editdesc").val(data.description);
                        tinymce.get('editdesc').setContent(data.description);
                        $("#courseid").val(data.id);
                    },
                    error:function(err){
                        toastr.error('an error occured');
                    }
                })
            })

            $(".delete-course").click(function(){
                var id = $(this).data('id');
                var token = $(this).data('token');

                if (confirm("are you sure you want to delete?!")) {
                    toastr.info('Deleting...', { fadeAway: 1000 });
                    $.ajax({
                    url:"/delete_course/"+id,
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
                    toastr.warning("cancelled..!", "warning");
                }
            })

            var i=1;  


      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control mb-2 name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove mb-2">X</button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  


      $(".validatecat").change(function(){
        $('.chosen').trigger('chosen:updated');
        var id = $(this).val();
        getd(id)
  
      })
        })

        function getd(id) {
          $.ajax({
                    url:"{{ route('get_cat') }}",
                    type:"get",
                    data:{'id': id, },
                    success:function(res){
                      var data = res.cat1;
                      if (id == data.course_id) {
                        toastr.error("category selected already in use please another one", "error");
                        $('.validatecat option[value=""]').prop('selected','selected')
                        $('.chosen').trigger('chosen:updated');
                      }
                    },
                    error:function(err){
                        toastr.error('an error occured');
                    }
                })
        }
    </script>
@endpush