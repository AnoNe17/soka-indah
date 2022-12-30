<?php

namespace App\Http\Controllers;

use App\Models\MasterGuru;
use App\Http\Requests\StoreMasterGuruRequest;
use App\Http\Requests\UpdateMasterGuruRequest;

class MasterGuruController extends Controller
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
     * @param  \App\Http\Requests\StoreMasterGuruRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMasterGuruRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterGuru  $masterGuru
     * @return \Illuminate\Http\Response
     */
    public function show(MasterGuru $masterGuru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterGuru  $masterGuru
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterGuru $masterGuru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMasterGuruRequest  $request
     * @param  \App\Models\MasterGuru  $masterGuru
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMasterGuruRequest $request, MasterGuru $masterGuru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterGuru  $masterGuru
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterGuru $masterGuru)
    {
        //
    }
}
