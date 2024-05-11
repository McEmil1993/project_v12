<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mechanic;
use App\Models\store_info;

class MechanicController extends Controller
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

        $mechanics = Mechanic::where('store_id',$store_id)->get();

        return view('backend.mechanic.index', compact('mechanics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.mechanic.create');
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
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:18|max:100', // Assuming legal working age is 18.
            'gender' => 'required|in:male,female,other',
            'contact' => 'required|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'status' => 'required|in:available,unavailable',
        ]);
        // die(json_encode($request->input()));

        $user_table = new store_info();
        $store_id = $user_table->getStoreId();
 
        $mechanic = new Mechanic([
            'store_id' => $store_id,
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'contact_number' => $request->contact,
            'specialization' => $request->specialization,
            'status' => $request->status,
        ]);

        $mechanic->save();

        request()->session()->flash('success','Mechanic created successfully');
       
        return redirect()->route('mechanic.index');
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
        $mechanic=Mechanic::find($id);
        if(!$mechanic){
            request()->session()->flash('error','Mechanic not found');
        }
        return view('backend.mechanic.edit')->with('mechanic',$mechanic);
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
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:18|max:100',
            'gender' => 'required|in:male,female,other',
            'contact_number' => 'required|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'status' => 'required|in:available,unavailable',
        ]);
    
        $mechanic = Mechanic::findOrFail($id); // Find the mechanic or fail if not found
    
        // Update mechanic's properties
        $mechanic->name = $request->name;
        $mechanic->age = $request->age;
        $mechanic->gender = $request->gender;
        $mechanic->contact_number = $request->contact_number;
        $mechanic->specialization = $request->specialization;
        $mechanic->status = $request->status;
    
        $mechanic->save(); // Save the changes
    
        $request->session()->flash('success', 'Mechanic updated successfully');
    
        return redirect()->route('mechanic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mechanic = Mechanic::findOrFail($id);
        $mechanic->delete();

        request()->session()->flash('success','Mechanic deleted successfully');
       
        return redirect()->route('mechanic.index');
    }
}
