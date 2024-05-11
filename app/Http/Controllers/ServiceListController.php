<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceList;
use App\Models\store_info;

class ServiceListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_table = new store_info();
        $store_id = $user_table->getStoreId();

        $services = ServiceList::where('store_id',$store_id)->get();

        return view('backend.service_list.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.service_list.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'name' => 'required|max:255',
            'description' => 'required',
            'rate' => 'required|numeric',
        ]);

        $user_table = new store_info();

        $data = $request->all();

        $data['store_id'] = $user_table->getStoreId();

        $service = ServiceList::create($data);
        request()->session()->flash('success','Service created successfully');

        return redirect()->route('service.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = ServiceList::findOrFail($id);
        return view('backend.service_list.edit', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = ServiceList::findOrFail($id);
        return view('backend.service_list.edit', compact('service'));
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
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required',
            'rate' => 'required|numeric',
        ]);

        // Find the existing service by ID
        $service = ServiceList::findOrFail($id);

        // Retrieve all the request data
        $data = $request->all();

        // If you need to update the store_id or keep it the same, you can do that here
        // Assuming store_id remains constant, we won't change it.
        // $user_table = new store_info();
        // $data['store_id'] = $user_table->getStoreId();

        // Update the service with the new data
        $service->update($data);

        // Flash a success message to the session
        request()->session()->flash('success', 'Service updated successfully');

        // Redirect to the service listing or detail page
        return redirect()->route('service.index'); // Ensure this route is correct
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = ServiceList::findOrFail($id);
        $service->delete();

        return redirect()->route('service.index')->with('success', 'Service deleted successfully.');
    }
}
