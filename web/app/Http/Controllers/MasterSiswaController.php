<?php

namespace App\Http\Controllers;

use App\Models\MasterSiswa;
use App\Http\Requests\StoreMasterSiswaRequest;
use App\Http\Requests\UpdateMasterSiswaRequest;


class MasterSiswaController extends Controller
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
     * @param  \App\Http\Requests\StoreMasterSiswaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMasterSiswaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterSiswa  $masterSiswa
     * @return \Illuminate\Http\Response
     */
    public function show(MasterSiswa $masterSiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterSiswa  $masterSiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterSiswa $masterSiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMasterSiswaRequest  $request
     * @param  \App\Models\MasterSiswa  $masterSiswa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMasterSiswaRequest $request, MasterSiswa $masterSiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterSiswa  $masterSiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterSiswa $masterSiswa)
    {
        //
    }
}
