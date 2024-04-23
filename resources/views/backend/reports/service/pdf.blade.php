<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Order List</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        font-size: 10px;
    }

    .table-container {
        overflow-x: auto;
        background-color: #f9f9f9;
        padding: 20px;
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

    th:first-child,
    td:first-child {
        border-left: none;
    }

    th:last-child,
    td:last-child {
        border-right: none;
    }

    tr:last-child td {
        border-bottom: none;
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
                    <th>Customer Name</th>
                    <th>Motor Cycle</th>
                    <th>Service Type</th>
                    <th>Assign Name</th>
                    <th>Total Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1;  $totalAmount = 0; ?>
                @foreach($service as $services)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$services->customer_name}}</td>
                    <td>{{$services->motorcycle_name}}</td>
                    <td>{{$services->service_types}}</td>
                    <td>
                        <?= isset($services->assigned_to)? $services->assigned_to : 'N/A' ?>
                    </td>
                    <td class="text-right">P {{$services->total_amount}}</td>
                </tr>
                @php
                $totalAmount += $services->total_amount;
                @endphp

                @endforeach
            </tbody>
            <tr class="total-row">
                <td colspan="5" class="text-right">Total</td>
                <td class="text-right">P {{number_format($totalAmount, 2)}}</td>
            </tr>
        </table>
    </div>

</body>

</html>