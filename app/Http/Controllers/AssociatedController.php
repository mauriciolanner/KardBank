<?php

namespace App\Http\Controllers;

use App\Models\Associated;
use App\Http\Requests\StoreAssociatedRequest;
use App\Http\Requests\UpdateAssociatedRequest;

class AssociatedController extends Controller
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
     * @param  \App\Http\Requests\StoreAssociatedRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAssociatedRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Associated  $associated
     * @return \Illuminate\Http\Response
     */
    public function show(Associated $associated)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Associated  $associated
     * @return \Illuminate\Http\Response
     */
    public function edit(Associated $associated)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAssociatedRequest  $request
     * @param  \App\Models\Associated  $associated
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAssociatedRequest $request, Associated $associated)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Associated  $associated
     * @return \Illuminate\Http\Response
     */
    public function destroy(Associated $associated)
    {
        //
    }
}
