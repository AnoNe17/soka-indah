<?php

namespace App\Http\Controllers;

use App\Models\PendidikanKarakter;
use App\Http\Requests\StorePendidikanKarakterRequest;
use App\Http\Requests\UpdatePendidikanKarakterRequest;

class PendidikanKarakterController extends Controller
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
     * @param  \App\Http\Requests\StorePendidikanKarakterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePendidikanKarakterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PendidikanKarakter  $pendidikanKarakter
     * @return \Illuminate\Http\Response
     */
    public function show(PendidikanKarakter $pendidikanKarakter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PendidikanKarakter  $pendidikanKarakter
     * @return \Illuminate\Http\Response
     */
    public function edit(PendidikanKarakter $pendidikanKarakter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePendidikanKarakterRequest  $request
     * @param  \App\Models\PendidikanKarakter  $pendidikanKarakter
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePendidikanKarakterRequest $request, PendidikanKarakter $pendidikanKarakter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PendidikanKarakter  $pendidikanKarakter
     * @return \Illuminate\Http\Response
     */
    public function destroy(PendidikanKarakter $pendidikanKarakter)
    {
        //
    }
}
