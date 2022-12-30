<?php

namespace App\Http\Controllers;

use App\Models\KDIndikator;
use App\Http\Requests\StoreKDIndikatorRequest;
use App\Http\Requests\UpdateKDIndikatorRequest;

class KDIndikatorController extends Controller
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
     * @param  \App\Http\Requests\StoreKDIndikatorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKDIndikatorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KDIndikator  $kDIndikator
     * @return \Illuminate\Http\Response
     */
    public function show(KDIndikator $kDIndikator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KDIndikator  $kDIndikator
     * @return \Illuminate\Http\Response
     */
    public function edit(KDIndikator $kDIndikator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKDIndikatorRequest  $request
     * @param  \App\Models\KDIndikator  $kDIndikator
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKDIndikatorRequest $request, KDIndikator $kDIndikator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KDIndikator  $kDIndikator
     * @return \Illuminate\Http\Response
     */
    public function destroy(KDIndikator $kDIndikator)
    {
        //
    }
}
