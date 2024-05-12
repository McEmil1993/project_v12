<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use DB;




class Order extends Model
{
    protected $fillable=['user_id','order_number','sub_total','quantity','delivery_charge','status','total_amount','first_name','last_name','country','post_code','address1','address2','phone','email','payment_method','payment_status','shipping_id','coupon'];

    public function cart_info(){
        return $this->hasMany('App\Models\Cart','order_id','id');
    }
    public static function getAllOrder($id){
        return Order::with('cart_info')->find($id);
    }
    public static function countActiveOrder(){
        $data=Order::where('store_info.user_id', Auth::user()->id)
        ->leftJoin('carts', 'carts.order_id', '=', 'orders.id')
        ->leftJoin('products', 'products.id', '=', 'carts.product_id')
        ->leftJoin('store_info', 'store_info.id', '=', 'products.store_id')
        ->count();
        if($data){
            return $data;
        }
        return 0;
    }
    public function cart(){
        return $this->hasMany(Cart::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class, 'order_id');
    }

    public function shipping(){
        return $this->belongsTo(Shipping::class,'shipping_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public static function countNewReceivedOrder(){
        // $data = Order::where('status', 'new')->count();

        $data=Order::where('orders.status', 'new')
        ->where('store_info.user_id', Auth::user()->id)
        ->leftJoin('carts', 'carts.order_id', '=', 'orders.id')
        ->leftJoin('products', 'products.id', '=', 'carts.product_id')
        ->leftJoin('store_info', 'store_info.id', '=', 'products.store_id')
        ->count();

        return $data;
    }
    public static function countProcessingOrder(){

        $data=Order::where('orders.status', 'process')
        ->where('store_info.user_id', Auth::user()->id)
        ->leftJoin('carts', 'carts.order_id', '=', 'orders.id')
        ->leftJoin('products', 'products.id', '=', 'carts.product_id')
        ->leftJoin('store_info', 'store_info.id', '=', 'products.store_id')
        ->count();
        // $data = Order::where('status', 'process')->count();
        return $data;
    }
    public static function countDeliveredOrder(){

        $data=Order::where('orders.status', 'delivered')
        ->where('store_info.user_id', Auth::user()->id)
        ->leftJoin('carts', 'carts.order_id', '=', 'orders.id')
        ->leftJoin('products', 'products.id', '=', 'carts.product_id')
        ->leftJoin('store_info', 'store_info.id', '=', 'products.store_id')
        ->count();
        // $data = Order::where('status', 'delivered')->count();
        return $data;
    }
    public static function countCancelledOrder(){
        $data=Order::where('orders.status', 'cancel')
        ->where('store_info.user_id', Auth::user()->id)
        ->leftJoin('carts', 'carts.order_id', '=', 'orders.id')
        ->leftJoin('products', 'products.id', '=', 'carts.product_id')
        ->leftJoin('store_info', 'store_info.id', '=', 'products.store_id')
        ->count();
        // $data = Order::where('status', 'cancel')->count();
        return $data;
    }


    public static function totalCountUser(){
        $data = DB::table('users')->where('role','admin')->count();
        return $data;
    }

    public static function totalCountClient(){
        $data = DB::table('users')->where('role','user')->count();
        return $data;
    }

    public static function totalCountShop(){
        $data = DB::table('users')->where('role','store')->count();
        return $data;
    }

    public static function totalCountShopActive(){
        $data = DB::table('users')->where('role','store')->where('status','active')->count();
        return $data;
    }
    


   
}
