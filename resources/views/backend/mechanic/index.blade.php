@extends('backend.layouts.master')

@section('main-content')
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
            @include('backend.layouts.notification')
         </div>
     </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">Mechanics List</h6>
      <a href="{{route('mechanic.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add Mechanic"><i class="fas fa-plus"></i> Add Mechanic</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($mechanics) > 0)
        <table class="table table-bordered table-hover" id="mechanic-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Mechanic Name</th>
              <th>Age</th>
              <th>Gender</th>
              <th>Contact No.</th>
              <th>Specialization</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($mechanics as $mechanic)   
                <tr>
                    <td>{{ $mechanic->name }}</td>
                    <td>{{ $mechanic->age }}</td>
                    <td>{{ ucfirst($mechanic->gender) }}</td>
                    <td>{{ $mechanic->contact_number }}</td>
                    <td>{{ $mechanic->specialization }}</td>
                    <td>
                        @if($mechanic->status == 'available')
                            <span class="badge badge-success">{{ $mechanic->status }}</span>
                        @else
                            <span class="badge badge-warning">{{ $mechanic->status }}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('mechanic.edit', $mechanic->id)}}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                        <form method="POST" action="{{route('mechanic.destroy', $mechanic->id)}}" class="d-inline">
                          @csrf 
                          @method('delete')
                              <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>  
            @endforeach
          </tbody>
        </table>
  
        @else
          <h6 class="text-center">No mechanics found! Please add a mechanic.</h6>
        @endif
      </div>
    </div>
</div>
@endsection

@push('styles')
  <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <style>
      div.dataTables_wrapper div.dataTables_paginate{
          display: none;
      }
      .zoom {
        transition: transform .2s; /* Animation */
      }

      .zoom:hover {
        transform: scale(3.2);
      }
  </style>
@endpush

@push('scripts')

  <!-- Page level plugins -->
  <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
  <script>
      
      $('#mechanic-dataTable').DataTable();

        // Sweet alert

        function deleteData(id){
            
        }
  </script>
  <script>
      $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
          $('.dltBtn').click(function(e){
            var form=$(this).closest('form');
              var dataID=$(this).data('id');
              // alert(dataID);
              e.preventDefault();
              swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                       form.submit();
                    } else {
                        swal("Your data is safe!");
                    }
                });
          })
      })
  </script>
@endpush