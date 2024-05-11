@extends('user.layouts.master')

@section('main-content')
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
            @include('user.layouts.notification')
         </div>
     </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">Service Request List</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($data)>0)
        <table class="table table-bordered table-hover" id="order-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Shop name</th>
              <th>Shop Contact</th>
              <th>Shop address</th>
              <th>Request name</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @php
            $counter = 1;
        @endphp
            @foreach($data as $service)
                <tr>
                    <td>{{$counter}}</td>
                    <td>{{$service->shopname}}</td>
                    <td>{{$service->shopcontact}}</td>
                    <td>{{$service->shopaddress}}</td>
                    <td>{{$service->name}}</td>
                    <td>
                        @if($service->status=='cancel')
                          <span class="badge badge-danger">Cancel</span>
                        @elseif($service->status=='pending')
                          <span class="badge badge-warning">Pending</span>
                        @else
                          <span class="badge badge-success">Done</span>
                        @endif
                    </td>
                    <td>
                       
                        <button class="btn btn-danger btn-sm dltBtn" data-id="{{$service->id}}" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Cancel"><i class="fas fa-trash-alt"></i></button>
  
                    </td>
                </tr>
                @php
                $counter++;
            @endphp
            @endforeach
          </tbody>
        </table>

        @else
          <h6 class="text-center">No service request found!!!</h6>
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

      $('#order-dataTable').DataTable();

        // Sweet alert

        function deleteData(id){

        }
  </script>
  <script>
      $(document).ready(function(){
  

    $('.dltBtn').click(function(e){


        e.preventDefault();

        swal({
            title: "Are you sure?",
            text: "Once cancel, you will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "{{route('update-request')}}",
                    data: {service_id: $(this).attr('data-id')}, // Serialize the form data
                    dataType: 'json',
                    success: function(response) {
                        // Handle success response
                        console.log(response);
                        swal("Success!", "Your data has been cancel.", "success");

                        setTimeout(() => {
                          location.reload();
                        }, 2000);
                    },
                 
                });
            } 
        });
    });
});
  </script>
@endpush
