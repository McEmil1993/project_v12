@extends('backend.layouts.master')
@section('title','Moto Shop || Brand Page')
@section('main-content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="row">
        <div class="col-md-12">
            @include('backend.layouts.notification')
        </div>
    </div>
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary float-left">Service List</h6>
        <!-- <a href="{{route('brand.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Brand</a> -->
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered table-hover" id="banner-dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date of request</th>
                                <th>Service type</th>
                                <th>Customer name</th>
                                <th>Assign name</th>
                                <th>Total amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>

                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$services->date_of_request}}</td>
                                <td>{{$services->service_types}}</td>
                                <td>{{$services->customer_name}}</td>
                                <td>
                                    <?= isset($services->assigned_to)? $services->assigned_to : 'N/A' ?>
                                </td>
                                <td>{{$services->total_amount}}</td>
                                <td>
                                    @if($services->status=='service_finished')
                                    <span class="badge badge-success">{{$services->status}}</span>
                                    @elseif($services->status=='pending')
                                    <span class="badge badge-warning">{{$services->status}}</span>
                                    @else
                                    <span class="badge badge-danger">{{$services->status}}</span>
                                    @endif
                                </td>
                                <td>

                                    <a href="/admin/services/{{$services->id}}/edit"
                                        class="btn btn-primary btn-sm float-left mr-1"
                                        style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip"
                                        title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                                    <!-- <form method="POST" action="{{route('brand.destroy',[$services->id])}}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm dltBtn" data-id={{$services->id}}
                                            style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip"
                                            data-placement="bottom" title="Delete"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </form> -->
                                </td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-8 offset-2">

                    <div class="order_boxes">
                        <div class="row">
                            <div class="col-8 offset-2">
                                <div class="order-info">
                                    <h4 class="text-center pb-4">SERVICE INFORMATION</h4>
                                    <table class="table">

                                        <tr class="">
                                            <td>Customer name</td>
                                            <td> : {{$services->customer_name}}</td>
                                        </tr>

                                        <tr>
                                            <td>Contact</td>
                                            <td> : {{$services->customer_contact}}</td>
                                        </tr>
                                        <tr>
                                            <td>Customer address</td>
                                            <td> : {{$services->customer_address}}</td>
                                        </tr>
                                        <tr>
                                            <td>Motor name</td>
                                            <td> : {{$services->motorcycle_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Motor type</td>
                                            <td> : {{$services->motorcycle_type}}</td>
                                        </tr>
                                        <tr>
                                            <td>Assign to</td>
                                            <td> : <?= isset($services->assigned_to)? $services->assigned_to : 'N/A' ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Service type</td>
                                            <td> : {{$services->service_types}}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Amount</td>
                                            <td> : ₱ {{number_format($services->total_amount,2)}}</td>
                                        </tr>
                                        <tr>
                                        <tr>
                                            <td>Payment Status</td>
                                            <td> :
                                                @if($services->status=='service_finished')
                                                <span class="badge badge-success">{{$services->status}}</span>
                                                @elseif($services->status=='pending')
                                                <span class="badge badge-warning">{{$services->status}}</span>
                                                @else
                                                <span class="badge badge-danger">{{$services->status}}</span>
                                                @endif
                                            </td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                            <!-- assigned_to -->

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<style>
div.dataTables_wrapper div.dataTables_paginate {
    display: none;
}

.zoom {
    transition: transform .2s;
    /* Animation */
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
$('#banner-dataTable').DataTable({
    "columnDefs": [{
        "orderable": false,
        "targets": [3, 4]
    }]
});

// Sweet alert

function deleteData(id) {

}
</script>
<script>
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.dltBtn').click(function(e) {
        var form = $(this).closest('form');
        var dataID = $(this).data('id');
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