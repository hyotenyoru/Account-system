<?php

namespace App\Http\Controllers;

use App\Models\orderlist;
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
    }
}
