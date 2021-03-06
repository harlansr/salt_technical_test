<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Database
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = "";
        if($request->has('query') && $request->get('query')!=""){
            $query = $request->get('query');
            $orders = Order::where('user_id', '=', \Auth::user()->id)
            ->where('order_no', 'LIKE', '%'.$query.'%')
            ->orderByRaw('created_at DESC')->paginate(20);
        }else{
            $orders = Order::where('user_id', '=', \Auth::user()->id)->orderByRaw('created_at DESC')->paginate(20);
        }
        return view('order', ['orders'=> $orders, 'query' => $query]);
    }

    public function search(Request $request)
    {
        $query = "";
        if($request->has('query') && $request->get('query')!=""){
            $query = $request->get('query');
            $orders = Order::where('user_id', '=', \Auth::user()->id)
            ->where('order_no', 'LIKE', '%'.$query.'%')
            ->orderByRaw('created_at DESC')->paginate(20);
        }else{
            $orders = Order::where('user_id', '=', \Auth::user()->id)->orderByRaw('created_at DESC')->paginate(20);
        }
        return view('order', ['orders'=> $orders, 'query' => $query]);
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
