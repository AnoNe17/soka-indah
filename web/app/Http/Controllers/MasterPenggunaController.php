<?php

namespace App\Http\Controllers;

use App\Models\MasterPengguna;
use App\Http\Requests\StoreMasterPenggunaRequest;
use App\Http\Requests\UpdateMasterPenggunaRequest;

class MasterPenggunaController extends Controller
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
     * @param  \App\Http\Requests\StoreMasterPenggunaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMasterPenggunaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterPengguna  $masterPengguna
     * @return \Illuminate\Http\Response
     */
    public function show(MasterPengguna $masterPengguna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterPengguna  $masterPengguna
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterPengguna $masterPengguna)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMasterPenggunaRequest  $request
     * @param  \App\Models\MasterPengguna  $masterPengguna
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMasterPenggunaRequest $request, MasterPengguna $masterPengguna)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterPengguna  $masterPengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterPengguna $masterPengguna)
    {
        //
    }
}
