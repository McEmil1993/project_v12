<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\store_info;
use DB;
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

        $services = Service::select(
            'services.*',
            DB::raw("CONCAT(store_info.firstname, ' ', store_info.lastname) AS store_name"),
            DB::raw("CONCAT(customer_info.firstname, ' ', customer_info.lastname) AS customer_name"),
            'customer_info.contact AS customer_contact',
            'customer_info.address AS customer_address',
            'store_info.address AS store_address',
            'store_info.contact AS store_contact'
        )
        ->where('services.store_id', $getId)
        ->where('services.id', $id)
        ->join('store_info', 'store_info.id', '=', 'services.store_id')
        ->join('customer_info', 'customer_info.id', '=', 'services.customer_id')
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
        $edit = Service::where('id', $id)->first();
    
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

        $update_service = Service::find($request->edit_id);
        
        $update_service->assigned_to = $request->assign;
        $update_service->status = $request->status;

        $update_service->save();

        request()->session()->flash('success','Successfully updated service');

        return redirect()->route('services.index');

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
