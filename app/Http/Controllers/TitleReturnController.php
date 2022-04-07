<?php

namespace App\Http\Controllers;

use App\Models\TitleReturn;
use App\Http\Requests\StoreTitleReturnRequest;
use App\Http\Requests\UpdateTitleReturnRequest;

class TitleReturnController extends Controller
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
     * @param  \App\Http\Requests\StoreTitleReturnRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTitleReturnRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TitleReturn  $titleReturn
     * @return \Illuminate\Http\Response
     */
    public function show(TitleReturn $titleReturn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TitleReturn  $titleReturn
     * @return \Illuminate\Http\Response
     */
    public function edit(TitleReturn $titleReturn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTitleReturnRequest  $request
     * @param  \App\Models\TitleReturn  $titleReturn
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTitleReturnRequest $request, TitleReturn $titleReturn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TitleReturn  $titleReturn
     * @return \Illuminate\Http\Response
     */
    public function destroy(TitleReturn $titleReturn)
    {
        //
    }
}
