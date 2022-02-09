<?php

namespace App\Http\Controllers;

use App\Models\custom;
use App\Http\Requests\StorecustomRequest;
use App\Http\Requests\UpdatecustomRequest;

class CustomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $custom=custom::all();
        return $custom->toArray();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('custom.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecustomRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecustomRequest $request)
    {
        //
        $custom=new custom;
        $custom->custom_name=$request->name;
        $custom->custom_address=$request->address;
        $custom->custom_tel=$request->tel;
        $custom->custom_email=$request->email;
        $custom->custom_log=$request->log;
        $custom->save();

        return redirect('/customs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\custom  $custom
     * @return \Illuminate\Http\Response
     */
    public function show(custom $custom)
    {
        //
        return view('custom.show',compact('custom'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\custom  $custom
     * @return \Illuminate\Http\Response
     */
    public function edit(custom $custom)
    {
        //
        return view('custom.edit',compact('custom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecustomRequest  $request
     * @param  \App\Models\custom  $custom
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecustomRequest $request, custom $custom)
    {
        //
        $custom->custom_name=$request->name;
        $custom->custom_address=$request->address;
        $custom->custom_tel=$request->tel;
        $custom->custom_email=$request->email;
        $custom->custom_log=$request->log;
        $custom->save();

        return redirect()->route('custom.edit',[$custom->custom_id])->with('success',true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\custom  $custom
     * @return \Illuminate\Http\Response
     */
    public function destroy(custom $custom)
    {
        //
        $custom->delete();
        return redirect('/custom');
    }
}
