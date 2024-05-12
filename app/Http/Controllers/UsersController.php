<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\store_info;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::orderBy('id','ASC')->paginate(10);
        return view('backend.users.index')->with('users',$users);
    }
    public function ownerShop()
    {
        $users=User::where('role','store')->orderBy('id','ASC')->paginate(10);
        return view('backend.users.index')->with('users',$users);
    }
    public function customer()
    {
        $users=User::where('role','user')->orderBy('id','ASC')->paginate(10);
        return view('backend.users.index')->with('users',$users);
    }
    public function adminUser()
    {
        $users=User::where('role','admin')->orderBy('id','ASC')->paginate(10);
        return view('backend.users.index')->with('users',$users);
    }

    public function registerStore()
    {
      
        return view('auth.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request,
        [
            'name'=>'string|required|max:30',
            'email'=>'string|required|unique:users',
            'password'=>'string|required',
            'role'=>'required|in:admin,store,user',
            'status'=>'required|in:active,inactive',
            'photo'=>'nullable|string',
          
        ]);
        // dd($request->all());
        $data=$request->all();
        $data['password']=Hash::make($request->password);
        // dd($data);
        $status=User::create($data);
        $getId = User::where('email',$request->email)->select('id')->first();
        // die($getId);
        $data_store = [
            'user_id' => $getId->id,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'gender' => $request->gender,
            'address' => $request->address,
            'shopname' => $request->shopname,
            'contact' => $request->contact,
            'shopimage' => $request->shopimage,
        ];

        DB::table('store_info')->insert($data_store);

        if($status){
            request()->session()->flash('success','User added successfully');
        }
        else{
            request()->session()->flash('error','Error occurred while adding user');
        }

        if ($request->role == 'admin') {

            return redirect()->route('adminuser');

        }elseif ($request->role == 'store') {

            return redirect()->route('ownershop');
        }else{

            return redirect()->route('client');
        }
       
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
        $user=User::findOrFail($id);
        return view('backend.users.edit')->with('user',$user);
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
        $user=User::findOrFail($id);
        $this->validate($request,
        [
            'name'=>'string|required|max:30',
            'email'=>'string|required',
            'role'=>'required|in:admin,store,user',
            'status'=>'required|in:active,inactive',
            'photo'=>'nullable|string',
        ]);
        // dd($request->all());
        $data=$request->all();
        // dd($data);
        
        $status=$user->fill($data)->save();
        if($status){
            request()->session()->flash('success','Successfully updated');
        }
        else{
            request()->session()->flash('error','Error occured while updating');
        }
        if ($request->role == 'admin') {

            return redirect()->route('adminuser');
        }elseif ($request->role == 'store') {

            return redirect()->route('ownershop');
        }else{

            return redirect()->route('client');
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
        $delete=User::findorFail($id);
        $status=$delete->delete();
        if($status){
            request()->session()->flash('success','User deleted successfully');
        }
        else{
            request()->session()->flash('error','There is an error while deleting users');
        }
        return redirect()->route('admin');
    }


    public function uploadImage(Request $request)
    {
        $request->validate([
            'shopimage' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('shopimage')) {
            $file = $request->file('shopimage');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/uploads', $filename);

            $publicPath = asset('storage/uploads/' . $filename);
            return response()->json(['path' => $publicPath]);
        }

        return response()->json(['error' => 'Failed to upload'], 500);
    }

    public function createAccount(Request $request){
       
        $checkemail = User::where('email',$request->email)->first();

        if ($checkemail) {
            return response()->json(['result' => '0']);
        }

        $data=$request->all();
        $data['name'] = $request->first_name.' '. $request->last_name;
        $data['email'] =  $request->email;
        $data['password']=Hash::make($request->password);
        $data['role'] =  'store';
        $data['status'] = 'inactive';
        
        // dd($data);
        $status=User::create($data);
        $getId = User::where('email',$request->email)->select('id')->first();
        // die($getId);
        $data_store = [
            'user_id' => $getId->id,
            'firstname' => $request->first_name,
            'middlename' => $request->middle_name,
            'lastname' => $request->last_name,
            'gender' => $request->gender,
            'address' => $request->address,
            'shopname' => $request->shop_name,
            'contact' => $request->contact_number,
            'shopimage' => $request->shopimage,
        ];

        DB::table('store_info')->insert($data_store);

        if($status){
            request()->session()->flash('success','User added successfully');
        }
        else{
            request()->session()->flash('error','Error occurred while adding user');
        }

        $store_info = new store_info();
        $otp = mt_rand(100000, 999999);

        $message = "Your One-Time Password (OTP) is: " . $otp . ". Do not share this OTP with anyone.";

        $datainsert = [
            'user_id' => $getId->id,
            'otp' => $otp,
            'status' => 'pending'
        ];

        DB::table('otps')->insert($datainsert);
        
        $data = [
            'number' => $request->contact_number,
            'message' => $message
        ];

        $store_info->sendMessage($data);

       
        
        $get = DB::table('otps')->where('otp',$otp)->where('status','pending')->first();

        return response()->json(['result' => '1','data'=>$get]);
    }


    public function verifyAccount() {

        $getId = $_GET['id'];

        $data = DB::table('otps')->select('otps.id','otps.user_id','store_info.contact')->join('store_info','store_info.user_id','=','otps.user_id')->where('otps.id',$getId)->where('otps.status','pending')->first();


        return view('auth.otp',compact('data'));
    }


}


