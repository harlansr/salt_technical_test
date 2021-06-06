<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Database
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Jobs\OrderAutoCancel;


class PagesController extends Controller
{
    public function home()
    {
        
        return view('login');
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    
    public function prepaid()
    {
        
        $unpaid = Order::where('status', '=', 0)
                ->where('user_id', '=', \Auth::user()->id)
                ->count();
        return view('prepaid-balance',[
            'unpaid' => $unpaid 
        ]);
    }

    public function product()
    {
        return view('product');
    }

    

    public function order()
    {
        return view('order');
    }

    public function success(Request $request)
    {
        $my_id = \Auth::user()->id;
        $order_no=$request->order;
        
        $get_data = Order::where('order_no', '=', $order_no)
                ->where('user_id', '=', $my_id)
                ->get();

        if(count($get_data)==0){
            return redirect()->back();
        }

        // dd($get_data[0]);

        return view('success', [
            'order_no' => $order_no,
            'total' => $get_data[0]->total, 
            'product_name' => $get_data[0]->product, 
            'value' => $get_data[0]->value,
            'address' => $get_data[0]->address,
            'mobile_number' => $get_data[0]->mobile_number,
        ]);
        
    }

    public function payment(Request $request)
    {
        $my_id = \Auth::user()->id;
        $order_no=$request->order_no;

        $get_data = Order::where('order_no', '=', $order_no)
                ->where('user_id', '=', $my_id)
                ->get();

        if(count($get_data)==0){
            return redirect()->back();
        }

        return view('payment', [
            'order_no' => $order_no,
            'status' => $get_data[0]->status
        ]);
    }

    

    // Random data
    function randomNumber() {
        $random_num = mt_rand(1000000000, 9999999999);
        if ($this->checkNumberExists($random_num)) {return generateBarcodeNumber();}
        return $random_num;
    }
    function checkNumberExists($random_num) {
        return Order::where('order_no', $random_num)->exists();
    }

    function autoCancele($order_no){
        $update_data = Order::where('order_no', '=', $order_no)
                    ->where('status', '=', 0)
                    ->update(['status' => 3]);
    }

    public function postPrepaid(Request $request)
    {
        $this->validate($request, [
            'value' => 'required',
            'mobile_number' => 'required|min:7|max:12'
        ]);

        $value = $request -> value;
        $order = Order::create([
            'user_id' => \Auth::user()->id,
            'order_no' => $this->randomNumber(),
            'mobile_number' => $request -> mobile_number,
            'value' => $request -> value,
            'total' => $value + ($value*(5/100)),
            'status' => 0
        ]);

        
        // OrderAutoCancel::dispatch($order -> order_no)->delay(now()->addMinutes(5));

        return redirect()->route('success', ['order' => $order -> order_no]);
    }

    public function postproduct(Request $request)
    {
        $this->validate($request, [
            'product' => 'required|min:10|max:150',
            'address' => 'required|min:10|max:150',
            'price' => 'required',
        ]);

        $value = $request -> price;
        $order = Order::create([
            'user_id' => \Auth::user()->id,
            'order_no' => $this->randomNumber(),
            'product' => $request -> product,
            'address' => $request -> address,
            'value' => $value,
            'total' => $value + 10000,
            'status' => 0
        ]);

        // OrderAutoCancel::dispatch($order -> order_no)->delay(now()->addMinutes(5));
        return redirect()->route('success', ['order' => $order -> order_no]);

    }

    public function doPayment(Request $request){
        $my_id = \Auth::user()->id;
        $order_no=$request->order_no;
        $update_data = 0;
        $cek_data = Order::where('order_no', '=', $order_no)
                ->where('user_id', '=', $my_id)
                ->where('status', '=', 0)->get();

        if(count($cek_data)!=0){
            if($cek_data[0]->product != ''){
                $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $update_data = Order::where('order_no', '=', $order_no)
                    ->where('user_id', '=', $my_id)
                    ->where('status', '=', 0)
                    ->update(['status' => 1, 'shipping_code' => substr(str_shuffle($permitted_chars), 0, 8)]);
            }else{
                date_default_timezone_set("Asia/Jakarta");
                $jamNow = (int)date("H");
                // dd((int)date("H"));
                $random = rand(0,100);
                $status = 1;
                if($jamNow>9 && $jamNow<17 ){
                    // Success rate 90%
                    if($random <= 90){
                        $status = 1;
                    }else{
                        $status = 2;
                    }
                }else{
                    // Success rate 40%
                    if($random <= 40){
                        $status = 1;
                    }else{
                        $status = 2;
                    }
                }
                $update_data = Order::where('order_no', '=', $order_no)
                    ->where('user_id', '=', $my_id)
                    ->where('status', '=', 0)
                    ->update(['status' => $status]);
            }
    
        }
        

        

        if($update_data){
            return redirect()->route('order');
        }else{
            return redirect()->route('order');
        }
        
        
    }

}
