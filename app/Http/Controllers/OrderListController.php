<?php

namespace App\Http\Controllers;

use App\Models\orderlist;
use App\Models\product;
use App\Models\family;
use App\Models\order;
use App\Http\Requests\StoreorderlistRequest;
use App\Http\Requests\UpdateorderlistRequest;

class OrderListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orderlist=orderlist::all();
        return $orderlist->toArray();
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
     * @param  \App\Http\Requests\StoreorderlistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreorderlistRequest $request)
    {
        //
        $order=order::where('order_id',$request->order_id)->first();
        $product=product::where('product_id',$request->product_id)->first();
        $family=family::where('family_id',$request->family_id)->first();

        $orderlist=new orderlist;
        $orderlist->order_id=$request->order_id;
        $orderlist->family_name=$request->family_name;
        $orderlist->product_name=$product->product_name;
        $orderlist->product_count=$request->count;
        $orderlist->product_price=$product->product_money;
        $orderlist->orderlist_log=$request->log;
        $orderlist->save();

        return view('order.show',compact('order'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\orderlist  $orderlist
     * @return \Illuminate\Http\Response
     */
    public function show(orderlist $orderlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\orderlist  $orderlist
     * @return \Illuminate\Http\Response
     */
    public function edit(orderlist $orderlist)
    {
        //
        return view('orderlist.edit',compact('orderlist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateorderlistRequest  $request
     * @param  \App\Models\orderlist  $orderlist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateorderlistRequest $request, orderlist $orderlist)
    {
        //
        $orderlist->family_name=$request->family_name;
        $orderlist->order_log=$request->log;
        $orderlist->save();

        return redirect()->route('orderlist.edit',[$orderlist->orderlist_id])->with('success',true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\orderlist  $orderlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(orderlist $orderlist)
    {
        //
        $order=order::where('order_id',$orderlist->order_id)->first();

        $orderlist->delete();
        return view('order.show',compact('order'));
    }
}
