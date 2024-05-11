<!DOCTYPE html>
<html lang="en">
<?php 
use App\Models\store_info;

$storeInfo = new store_info();
$storeId = $storeInfo->getStoreId();

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        font-size: 10px;
    }

    .table-container {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #ddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr.total-row {
        background-color: #e7e7e7;
        font-weight: bold;
    }

    .text-right {
        text-align: right;
    }
    </style>
</head>

<body>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Order No.</th>
                    <th>Name</th>
                    <th>Product Name</th>
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
                $totalAmount = 0;
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
                    <td>P {{number_format($order->total_amount,2)}}</td>

                </tr>
                @php
                $totalAmount += $order->total_amount;
                @endphp

                @endif

                @endforeach


                @endforeach


            </tbody>
            <tfoot>
                <tr class="total-row">
                    <td colspan="9" class="text-right">Total</td>
                    <td class="text-right">P {{number_format($totalAmount, 2)}}</td>
                </tr>
            </tfoot>
        </table>
    </div>

</body>

</html>