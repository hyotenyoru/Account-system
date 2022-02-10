<?php

namespace App\Http\Controllers;

use App\Models\family;
use App\Models\custom;
use App\Http\Requests\StorefamilyRequest;
use App\Http\Requests\UpdatefamilyRequest;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $family=family::all();
        return $family->toArray();
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
     * @param  \App\Http\Requests\StorefamilyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorefamilyRequest $request)
    {
        //
        $custom=custom::where('custom_id',$request->custom_id)->first();
        $family=new family;
        $family->custom_id=$request->custom_id;
        $family->family_name=$request->name;
        $family->family_email=$request->name;
        $family->family_tel=$request->tel;
        $family->family_log=$request->log;
        $family->save();

        return view('custom.show',compact('custom'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\family  $family
     * @return \Illuminate\Http\Response
     */
    public function show(family $family)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\family  $family
     * @return \Illuminate\Http\Response
     */
    public function edit(family $family)
    {
        //
        return view('family.edit',compact('family'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatefamilyRequest  $request
     * @param  \App\Models\family  $family
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatefamilyRequest $request, family $family)
    {

        $family->family_name=$request->name;
        $family->family_email=$request->name;
        $family->family_tel=$request->tel;
        $family->family_log=$request->log;
        $family->save();

        return redirect()->route('family.edit',[$family->family_id])->with('success',true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\family  $family
     * @return \Illuminate\Http\Response
     */
    public function destroy(family $family)
    {
        //
        $custom=custom::where('custom_id',$family->custom_id)->first();

        $family->delete();
        return view('custom.show',compact('custom'));
    }
}
