@extends('base')
@section('content')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-2">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-4 fw-bold">Events</h2>
                {{-- <h5 class="text-white op-7 mb-2">Free Bootstrap 4 Admin Dashboard</h5> --}}
            </div>
        
        </div>
    </div>
</div>

<div class="card mt-4">
    
    <div class="card-body">
        <a href="#" class="btn btn-primary" id="add-event">Add Event</a><hr>

          <table class="table" id="event-table" style="width: 100%">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Event Agenda</th>
                <th scope="col">Event Image</th>
                <th scope="col">Event Venue</th>
                <th scope="col">Event Date</th>
                <th scope="col">Event Start Time</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
              <tr>
                <th scope="col">{{ $event->id }}</th>
                    <td>{{ $event->agenda }}</td>
                    <td> <img src="/storage/images/{{ $event->image }}" width="100" alt=""> </td>
                    <td>{{ $event->venue }}</td>
                    <td>{{ Carbon\Carbon::parse($event->created_at)->isoFormat('dddd, MMMM Do YYYY') }}</td>
                    <td>{{ $event->time }}</td>
                    <td>
                        <a href="#" class="edit btn btn-sm btn-info" data-id="{{ $event->id }}"><i class="fa fa-pencil"></i> Edit</a>
                        <a href="#" class="delete btn btn-sm btn-danger" data-id="{{ $event->id }}" data-token="{{ csrf_token() }}"><i class="fa fa-trash-o"></i> Delete</a>
                    </td>
              </tr>
              @endforeach
           
            </tbody>
          </table>
    </div>
  </div>

  
  <!-- Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" ata-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Event</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('add_event') }}" method="POST" enctype="multipart/form-data">
                @csrf
          <div class="row">
              <div class="col-md-6 mb-3">
                  <label for="agenda">Agenda</label>
                  <input type="text" name="agenda" id="agenda" class="form-control" required>
              </div>
              <div class="col-md-6 mb-3">
                  <label for="image">Image</label>
                  <input type="file" name="image" id="image" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="time">Start Time</label>
                  <input type="time" name="time" id="time" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="venue">Venue</label>
                  <input type="text" name="venue" id="venue" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                Event Date
                  <input type="date" name="date" id="date" class="form-control" required>
            </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <label for="desc">Description</label>
                  <textarea name="desc" id="desc" cols="30" rows="10" class="desc"></textarea>
              </div>
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


  <!-- Modal -->
  <div class="modal fade" id="editModal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Event</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('update_event') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="id" name="id">
          <div class="row">
              <div class="col-md-6 mb-3">
                  <label for="agenda">Agenda</label>
                  <input type="text" name="editagenda" id="editagenda" class="form-control" required>
              </div>
              <div class="col-md-6 mb-3">
                  <label for="image">Image</label>
                  <input type="file" name="edit_image" id="editimage" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="time">Start Time</label>
                  <input type="time" name="edittime" id="edittime" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="venue">Venue</label>
                  <input type="text" name="editvenue" id="editvenue" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                Event Date
                  <input type="date" name="editdate" id="editdate" class="form-control" required>
            </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <label for="desc">Description</label>
                  <textarea name="editdesc" id="editdesc" cols="30" rows="10" class="form-control" ></textarea>
              </div>
          </div>
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
        $("#event-table").DataTable({responsive:true});

        $("#add-event").click(function(){
                $("#addModal").modal("show");
            })

            $(".edit").click(function(){
                $("#editModal").modal('show');
                var id = $(this).data('id');

                $.ajax({
                    url:"{{ route('edit_event') }}",
                    type:"get",
                    data:{'id': id},
                    success:function(res){
                        var data = res.edit;
                        console.log(data);
                        
                        $("#editagenda").val(data.agenda);
                        $("#editdate").val(moment(data.created_at).format('MMMM Do YYYY, h:mm:ss a'));
                        $("#edittime").val(moment(data.time));
                        $("#editvenue").val(data.venue);
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
                    url:"/delete_event/"+id,
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