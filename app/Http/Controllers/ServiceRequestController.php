<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
use App\Models\store_info;

class ServiceRequestController extends Controller
{

    public function index(){
        
        $data = DB::table('service_requests')
        ->select('service_requests.id','service_requests.service_id','service_requests.owner_name','service_requests.contact_number','service_requests.motorcycle_name','service_requests.motorcycle_type','service_requests.request_type','service_requests.address','service_requests.status','service_lists.store_id','service_lists.name','service_lists.description','service_lists.rate','store_info.shopname','store_info.contact as shopcontact','store_info.address as shopaddress')
        ->where('service_requests.user_id',Auth::user()->id)
        ->join('service_lists','service_lists.id','=','service_requests.service_id')
        ->join('store_info','store_info.id','=','service_lists.store_id')
        ->get();


        return view('user.service_request.index', compact('data'));
    }


    public function displayStore(){

        $store  = new store_info();
       
        
        $data = DB::table('service_requests')
        ->select('service_requests.id','service_requests.service_id','service_requests.owner_name','service_requests.contact_number','service_requests.motorcycle_name','service_requests.motorcycle_type','service_requests.request_type','service_requests.address','service_requests.status','service_lists.store_id','service_lists.name','service_lists.description','service_lists.rate','store_info.shopname','store_info.contact as shopcontact','store_info.address as shopaddress')
        ->where('service_lists.store_id', $store->getStoreId())
        ->join('service_lists','service_lists.id','=','service_requests.service_id')
        ->join('store_info','store_info.id','=','service_lists.store_id')
        ->get();

        die(json_encode($data));


        return view('user.service_request.index', compact('data'));
    }

    public function store(Request $request)
    {
    
        $data = DB::table('service_requests')->where('user_id',Auth::user()->id)->where('status','pending')->count();

        if ($data) {
            return response()->json(['status'=> '1','message' => 'You have already request pending!']);
        }else{
            // Insert into the table
            $serviceRequest = DB::table('service_requests')->insertGetId([
                'service_id' => $request->input('service_id'),
                'user_id' => Auth::user()->id,
                'owner_name' => $request->input('ownername'),
                'contact_number' => $request->input('contactnumber'),
                'motorcycle_name' => $request->input('motorcyclename'),
                'motorcycle_type' => $request->input('motorcycletype'),
                'request_type' => $request->input('requesttype'),
                'address' => $request->input('address'),
                'status' => 'pending',
                'created_at' => Carbon::now(),
            ]);

            return response()->json(['status'=> '0','message' => 'Service request submitted successfully!']);
        }

       
    }

    public function update(Request $request) {

        
        $data = DB::table('service_requests')->where('id',$request->input('service_id'))->update(['status'=>'cancel']);

        if ($data > 0) {
            # code...
            return response()->json(['status'=>'0','message'=>'Success cancel request!']);

        }else{
            return response()->json(['status'=>'1','message'=>'Error update!']);
        }

    }
}
