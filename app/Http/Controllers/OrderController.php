<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\custom;
use App\Http\Requests\StoreorderRequest;
use App\Http\Requests\UpdateorderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $order=order::all();
        return $order->toArray();
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
     * @param  \App\Http\Requests\StoreorderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreorderRequest $request)
    {
        //
        $custom=custom::where('custom_id',$request->custom_id)->first();
        $order=new order;
        $order->custom_id=$request->custom_id;
        $order->plan_id=$request->plan_id;
        $order->order_name=$request->name;
        $order->order_log=$request->log;
        $order->save();

        return view('custom.show',compact('custom'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        //
        return view('order.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
        return view('order.edit',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateorderRequest  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateorderRequest $request, order $order)
    {
        //
        $order->plan_id=$request->plan_id;
        $order->order_name=$request->name;
        $order->order_log=$request->log;
        $order->save();

        return redirect()->route('order.edit',[$order->order_id])->with('success',true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        //
        $custom=custom::where('custom_id',$order->custom_id)->first();

        $order->delete();
        return view('custom.show',compact('custom'));
    }
}
