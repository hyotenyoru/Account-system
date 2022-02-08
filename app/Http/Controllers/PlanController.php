<?php

namespace App\Http\Controllers;

use App\Models\plan;
use App\Http\Requests\StoreplanRequest;
use App\Http\Requests\UpdateplanRequest;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $plan=plan::all();
        return $plan->toArray();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('plan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreplanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreplanRequest $request)
    {
        //
        $plan=new plan;
        $plan->plan_name=$request->name;
        $plan->plan_log=$request->log;
        $plan->save();

        return redirect('/plans');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(plan $plan)
    {
        //
        return view('plan.show',compact('plan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(plan $plan)
    {
        //
        return view('plan.edit',compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateplanRequest  $request
     * @param  \App\Models\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateplanRequest $request, plan $plan)
    {
        //
        $plan->plan_name=$request->name;
        $plan->plan_state=$request->state;
        $plan->plan_log=$request->log;
        $plan->save();

        return redirect()->route('plan.edit',[$plan->id])->with('success',true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(plan $plan)
    {
        //
        $plan->delelt();
        return redirect('/plans');
    }
}
