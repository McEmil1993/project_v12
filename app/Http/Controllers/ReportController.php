<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Service;
use App\Models\store_info;
use DB;
use PDF;
use LOG;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function reportOrders(){
        $orders = Order::orderBy('id', 'DESC')
        ->with(['carts' => function ($query) {
            $query->with(['product' => function ($query) {
                $query->select('id', 'store_id', 'price','title'); // Select only necessary fields
            }]);
        }])
        ->paginate(10);
        
        return view('backend.reports.order.index')->with('orders',$orders);
    }
    
    public function reportService(){
        $user_table = new store_info();
        $getId = $user_table->getStoreId(); // Ensure this method returns the correct store ID.

        $service = Service::select(
            'services.*',
            DB::raw("CONCAT(store_info.firstname, ' ', store_info.lastname) AS store_name"),
            DB::raw("CONCAT(customer_info.firstname, ' ', customer_info.lastname) AS customer_name"),
            'customer_info.contact AS customer_contact',
            'customer_info.address AS customer_address',
            'store_info.address AS store_address',
            'store_info.contact AS store_contact'
        )
        ->where('services.store_id', $getId)
        ->join('store_info', 'store_info.id', '=', 'services.store_id')
        ->join('customer_info', 'customer_info.id', '=', 'services.customer_id')
        ->get();

        // echo json_encode($service);

        //  die();

        return view('backend.reports.service.index')->with('service',$service);
    }

    public function pdf(Request $request){

        $orders = Order::orderBy('id', 'DESC')
        ->with(['carts' => function ($query) {
            $query->with(['product' => function ($query) {
                $query->select('id', 'store_id', 'price','title'); // Select only necessary fields
            }]);
        }])->get();

        $letters = '';
        for ($i = 0; $i < 6; $i++) {
            // Randomly choose to generate a lowercase or uppercase letter
            $letter = rand(0, 1) ? chr(rand(65, 90)) : chr(rand(97, 122));
            $letters .= $letter;
        }

        // Generate 6 random numbers
        $numbers = '';
        for ($i = 0; $i < 6; $i++) {
            $number = rand(0, 9);
            $numbers .= $number;
        }

        // Combine the letters and numbers
        $result = $letters . $numbers;
        
        // return $order;
        $file_name= $result.'.pdf';

        // LOG::info($orders);
        // return $file_name;
        $pdf=PDF::loadview('backend.reports.order.pdf',compact('orders'));
        return $pdf->download($file_name);
    }

    public function pdfService(Request $request){

        $user_table = new store_info();
        $getId = $user_table->getStoreId(); // Ensure this method returns the correct store ID.

        $service = Service::select(
            'services.*',
            DB::raw("CONCAT(store_info.firstname, ' ', store_info.lastname) AS store_name"),
            DB::raw("CONCAT(customer_info.firstname, ' ', customer_info.lastname) AS customer_name"),
            'customer_info.contact AS customer_contact',
            'customer_info.address AS customer_address',
            'store_info.address AS store_address',
            'store_info.contact AS store_contact'
        )
        ->where('services.store_id', $getId)
        ->join('store_info', 'store_info.id', '=', 'services.store_id')
        ->join('customer_info', 'customer_info.id', '=', 'services.customer_id')
        ->get();

        $letters = '';
        for ($i = 0; $i < 6; $i++) {
            // Randomly choose to generate a lowercase or uppercase letter
            $letter = rand(0, 1) ? chr(rand(65, 90)) : chr(rand(97, 122));
            $letters .= $letter;
        }

        // Generate 6 random numbers
        $numbers = '';
        for ($i = 0; $i < 6; $i++) {
            $number = rand(0, 9);
            $numbers .= $number;
        }

        // Combine the letters and numbers
        $result = $letters . $numbers;
        
        // return $order;
        $file_name= $result.'.pdf';

        // LOG::info($orders);
        // return $file_name;
        $pdf=PDF::loadview('backend.reports.service.pdf',compact('service'));
        return $pdf->download($file_name);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}