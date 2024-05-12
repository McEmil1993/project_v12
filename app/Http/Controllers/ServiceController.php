<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\store_info;
use DB;
use Auth;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_table = new store_info();
        $getId = $user_table->getStoreId(); // Ensure this method returns the correct store ID.

        // $service = Service::select(
        //     'services.*',
            // DB::raw("CONCAT(store_info.firstname, ' ', store_info.lastname) AS store_name"),
            // DB::raw("CONCAT(customer_info.firstname, ' ', customer_info.lastname) AS customer_name"),
            // 'customer_info.contact AS customer_contact',
            // 'customer_info.address AS customer_address',
            // 'store_info.address AS store_address',
            // 'store_info.contact AS store_contact'
        // )
        // ->where('services.store_id', $getId)
        // ->join('store_info', 'store_info.id', '=', 'services.store_id')
        // ->join('customer_info', 'customer_info.id', '=', 'services.customer_id')
        // ->get();

        $service = DB::table('service_requests')
        ->select('service_requests.id',
        'service_requests.service_id',
        'service_requests.mechanic_id',
        'service_requests.owner_name',
        'service_requests.contact_number',
        'service_requests.motorcycle_name',
        'service_requests.motorcycle_type',
        'service_requests.request_type',
        'service_requests.address',
        'service_requests.status',
        'service_requests.created_at as date_of_request',
        'service_lists.store_id',
        'service_lists.name as service_types',
        'service_lists.name',
        'service_lists.description',
        'service_lists.rate as total_amount',
        'store_info.shopname as assigned_to',
        'store_info.shopname',
        'store_info.contact as service_contact',
        'store_info.address as service_address',
        'store_info.contact as shopcontact',
        'store_info.address as shopaddress',
        'customer_info.id as customer_id',
        DB::raw("CONCAT(store_info.firstname, ' ', store_info.lastname) AS store_name"),
        DB::raw("CONCAT(customer_info.firstname, ' ', customer_info.lastname) AS customer_name"),
        'customer_info.contact AS customer_contact',
        'customer_info.address AS customer_address',
        'store_info.address AS store_address',
        'store_info.contact AS store_contact')
        ->where('service_lists.store_id',$getId)
        ->join('service_lists','service_lists.id','=','service_requests.service_id')
        ->join('store_info','store_info.id','=','service_lists.store_id')
        ->join('customer_info','customer_info.user_id','=','service_requests.user_id')
        ->get();

        // echo json_encode($data);

        // die();

        return view('backend.services.index')->with('service',$service);

        // echo json_encode($service);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('backend.services.create')->with('edit_id',$id);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validate the incoming request
        $validatedData = $request->validate([
            'services' => 'required',
            'motorcycleName'  => 'required',
            'motorcycleType' => 'required',
            'contactNumber' => 'required',
            'completeAddress' => 'required',
            'requestType' => 'required',
            'store_id' => 'required'
    
        ]);

        $service = new Service;
        $service->customer_id = Auth::user()->id;
        $service->date_of_request = date('Y-m-d');
        $service->motorcycle_name = $request->motorcycleName;
        $service->motorcycle_type = $request->motorcycleType;
        $service->service_types = $request->services;
        $service->total_amount = 0;
        $service->status = 'pending';
        $service->assigned_to = '';
        $service->service_contact = $request->contactNumber;
        $service->service_address = $request->completeAddress;
        $service->request_type = $request->requestType;
        $service->store_id = $request->store_id;
        $service->save();


        return redirect()->route('services-list');

        // echo json_encode($request->input());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_table = new store_info();
        $getId = $user_table->getStoreId(); // Ensure this method returns the correct store ID.

        // $services = Service::select(
        //     'services.*',
        //     DB::raw("CONCAT(store_info.firstname, ' ', store_info.lastname) AS store_name"),
        //     DB::raw("CONCAT(customer_info.firstname, ' ', customer_info.lastname) AS customer_name"),
        //     'customer_info.contact AS customer_contact',
        //     'customer_info.address AS customer_address',
        //     'store_info.address AS store_address',
        //     'store_info.contact AS store_contact'
        // )
        // ->where('services.store_id', $getId)
        // ->where('services.id', $id)
        // ->join('store_info', 'store_info.id', '=', 'services.store_id')
        // ->join('customer_info', 'customer_info.id', '=', 'services.customer_id')
        // ->first();

        $services = DB::table('service_requests')
        ->select('service_requests.id',
        'service_requests.service_id',
        'service_requests.mechanic_id',
        'service_requests.owner_name',
        'service_requests.contact_number',
        'service_requests.motorcycle_name',
        'service_requests.motorcycle_type',
        'service_requests.request_type',
        'service_requests.address',
        'service_requests.status',
        'service_requests.created_at as date_of_request',
        'service_lists.store_id',
        'service_lists.name as service_types',
        'service_lists.name',
        'service_lists.description',
        'service_lists.rate as total_amount',
        'store_info.shopname as assigned_to',
        'store_info.shopname',
        'store_info.contact as service_contact',
        'store_info.address as service_address',
        'store_info.contact as shopcontact',
        'store_info.address as shopaddress',
        'customer_info.id as customer_id',
        DB::raw("CONCAT(store_info.firstname, ' ', store_info.lastname) AS store_name"),
        DB::raw("CONCAT(customer_info.firstname, ' ', customer_info.lastname) AS customer_name"),
        'customer_info.contact AS customer_contact',
        'customer_info.address AS customer_address',
        'store_info.address AS store_address',
        'store_info.contact AS store_contact')
        ->where('service_lists.store_id',$getId)
        ->where('service_requests.id', $id)
        ->join('service_lists','service_lists.id','=','service_requests.service_id')
        ->join('store_info','store_info.id','=','service_lists.store_id')
        ->join('customer_info','customer_info.user_id','=','service_requests.user_id')
        ->first();
        // echo json_encode($service);

        //  die();

        return view('backend.services.show')->with('services',$services);

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
        $user_table = new store_info();
        $getId = $user_table->getStoreId();
        $edit = DB::table('service_requests')
        ->select('service_requests.id',
        'service_requests.service_id',
        'service_requests.mechanic_id',
        'service_requests.owner_name',
        'service_requests.contact_number',
        'service_requests.motorcycle_name',
        'service_requests.motorcycle_type',
        'service_requests.request_type',
        'service_requests.address',
        'service_requests.status',
        'service_requests.created_at as date_of_request',
        'service_lists.store_id',
        'service_lists.name as service_types',
        'service_lists.name',
        'service_lists.description',
        'service_lists.rate as total_amount',
        'store_info.shopname as assigned_to',
        'store_info.shopname',
        'store_info.contact as service_contact',
        'store_info.address as service_address',
        'store_info.contact as shopcontact',
        'store_info.address as shopaddress',
        'customer_info.id as customer_id',
        DB::raw("CONCAT(store_info.firstname, ' ', store_info.lastname) AS store_name"),
        DB::raw("CONCAT(customer_info.firstname, ' ', customer_info.lastname) AS customer_name"),
        'customer_info.contact AS customer_contact',
        'customer_info.address AS customer_address',
        'store_info.address AS store_address',
        'store_info.contact AS store_contact')
        ->where('service_lists.store_id',$getId)
        ->where('service_requests.id', $id)
        ->join('service_lists','service_lists.id','=','service_requests.service_id')
        ->join('store_info','store_info.id','=','service_lists.store_id')
        ->join('customer_info','customer_info.user_id','=','service_requests.user_id')
        ->first();
    
        return view('backend.services.create')->with('edit', $edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        echo  json_encode($request->input());
    }

    public function update_service(Request $request)
    {
        //

        
        $this->validate($request,[
            'edit_id'=>'required',
            'assign' => 'required',
            'status' => 'required'
        ]);

        $data = DB::table('service_requests')
        ->where('id',$request->edit_id)
        ->update(
            [
                'status'=> $request->status,
                'mechanic_id'=> $request->assign
            ]
        );

        // $update_service = Service::find($request->edit_id);
        // // mechanic_id
        // $update_service->assigned_to = $request->assign;
        // $update_service->status = $request->status;
        // $update_service->total_amount = $request->total_amount;

        // $update_service->save(); ongoing cancelled
        $store_info = new store_info();
     

       
        if ($request->status == 'ongoing') {
            $data = [
                'number' => $request->contact,
                'message' => "Request in progress. Please wait for further updates."
            ];
    
            $store_info->sendMessage($data);
        }elseif ($request->status == 'cancelled'){
            $data = [
                'number' => $request->contact,
                'message' => "Cancellation is not available at this time. Please proceed as planned."
            ];
    
            $store_info->sendMessage($data);
        }
    
        
       
        

        request()->session()->flash('success','Successfully updated service');

        return redirect()->route('services.index');

    }
    public static function getName($id){
        $mechanic = DB::table('mechanics')
            ->where('id', $id)
            ->first();
    
        if ($mechanic) {
            return $mechanic->name;
        }
    
        return 'Mechanic Not Found';
    }

    public static function getMechanic(){

        $user_table = new store_info();
        $getId = $user_table->getStoreId();
        $mechanic = DB::table('mechanics')->where('store_id', $getId)->get();
        return $mechanic;
    }


    public function servicesList(){

        
        // $service = Service::select(
        //     'services.*',
        //     DB::raw("CONCAT(store_info.firstname, ' ', store_info.lastname) AS store_name"),
        //     DB::raw("CONCAT(customer_info.firstname, ' ', customer_info.lastname) AS customer_name"),
        //     'customer_info.contact AS customer_contact',
        //     'customer_info.address AS customer_address',
        //     'store_info.address AS store_address',
        //     'store_info.contact AS store_contact'
        // )
        // ->join('store_info', 'store_info.id', '=', 'services.store_id')
        // ->join('customer_info', 'customer_info.id', '=', 'services.customer_id')
        // ->get();

        $service = DB::table('service_lists')
        ->select(
            'service_lists.*',
            DB::raw("CONCAT(store_info.firstname, ' ', store_info.lastname) AS store_name"),
            'store_info.address AS store_address',
            'store_info.contact AS store_contact',
            'store_info.shopname',
            'store_info.shopimage'
        )
        ->join('store_info', 'store_info.id', '=', 'service_lists.store_id')
        ->get();


        // return response()->json(['result' =>  $service]);

      
        return view('frontend.pages.services')->with('service',$service);
    }

    public function servicesRequest(){

        $store = DB::table('store_info')->get();

        return view('frontend.pages.services-request')->with('store',$store);
    }


    public function checkOtp(Request $request)
    {
    
        $get = DB::table('otps')->where('otp',$request->otp)->where('user_id',$request->user_id)->where('status','pending')->first();

        if ($get) {

            DB::table('otps')->where('id',$get->id)->update(['status'=>'approved']);

            DB::table('users')->where('id',$get->user_id)->update(['status'=>'active']);


            return redirect()->route('login.form');

         

        } else {
            request()->session()->flash('error','Invalid OTP. Please try again.');
            return redirect()->back();
        }
    }


    public function checkOtpStore(Request $request)
    {
    
        $get = DB::table('otps')->where('otp',$request->otp)->where('user_id',$request->user_id)->where('status','pending')->first();

        if ($get) {

            DB::table('otps')->where('id',$get->id)->update(['status'=>'approved']);

            DB::table('users')->where('id',$get->user_id)->update(['status'=>'active']);


            return redirect()->route('admin');

         
        } else {
            request()->session()->flash('error','Invalid OTP. Please try again.');
            return redirect()->back();
        }
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
