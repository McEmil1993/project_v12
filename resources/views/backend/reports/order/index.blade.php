@extends('backend.layouts.master')

@section('main-content')
<!-- DataTales Example -->
<?php 
use App\Models\store_info;

$storeInfo = new store_info();
$storeId = $storeInfo->getStoreId();

?>
<div class="card shadow mb-4">
    <div class="row">
        <div class="col-md-12">
            @include('backend.layouts.notification')
        </div>
    </div>
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary float-left">Report Order</h6>
         <a href="{{route('report.order.pdf')}}"
            class=" btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-download fa-sm text-white-50"></i>
            Generate PDF</a>
    </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if(count($orders)>0)
            <table class="table table-bordered table-hover" id="order-dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Order No.</th>
                        <th>Name</th>
                        <th>Product name</th>
                        <th>Deliver Address</th>
                        <th>Quantity</th>
                        <th>Shipping fees</th>
                        <th>Discount</th>
                        
                        <th>Unit Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                     @php
           
                    $i = 1;
                    @endphp
                    @foreach($orders as $order)
                    @php
                    $shipping_charge=DB::table('shippings')->where('id',$order->shipping_id)->pluck('price');
             
                    @endphp

                    @foreach ($order->carts as $cart)

                    @if($storeId == $cart->product->store_id)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{$order->order_number}}</td>
                        <td>{{$order->first_name}} {{$order->last_name}}</td>
                        <td>{{$cart->product->title}}</td>
                        <td>{{$order->address1}} {{$order->address1}}, {{$order->country}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$cart->product->price}}</td>
                        <td>{{$order->sh_price}}</td>
                        <td>{{$cart->product->discount}}</td>
                        <td>₱ {{number_format($order->total_amount,2)}}</td>
            
                    </tr>
                    @endif

                    @endforeach


                    @endforeach
                </tbody>
            </table>
            <span style="float:right">{{$orders->links()}}</span>
            @else
            <h6 class="text-center">No orders found!!! Please order some products</h6>
            @endif
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