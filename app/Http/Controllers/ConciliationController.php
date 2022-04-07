<?php

namespace App\Http\Controllers;

use App\Models\Conciliation;
use App\Http\Requests\StoreConciliationRequest;
use App\Http\Requests\UpdateConciliationRequest;

class ConciliationController extends Controller
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
     * @param  \App\Http\Requests\StoreConciliationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConciliationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conciliation  $conciliation
     * @return \Illuminate\Http\Response
     */
    public function show(Conciliation $conciliation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Conciliation  $conciliation
     * @return \Illuminate\Http\Response
     */
    public function edit(Conciliation $conciliation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateConciliationRequest  $request
     * @param  \App\Models\Conciliation  $conciliation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConciliationRequest $request, Conciliation $conciliation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conciliation  $conciliation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conciliation $conciliation)
    {
        //
    }
}
