<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNivelDeAcessoRequest;
use App\Http\Requests\UpdateNivelDeAcessoRequest;
use App\Models\NivelDeAcesso;

class NivelDeAcessoController extends Controller
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
     * @param  \App\Http\Requests\StoreNivelDeAcessoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNivelDeAcessoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NivelDeAcesso  $nivelDeAcesso
     * @return \Illuminate\Http\Response
     */
    public function show(NivelDeAcesso $nivelDeAcesso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NivelDeAcesso  $nivelDeAcesso
     * @return \Illuminate\Http\Response
     */
    public function edit(NivelDeAcesso $nivelDeAcesso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNivelDeAcessoRequest  $request
     * @param  \App\Models\NivelDeAcesso  $nivelDeAcesso
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNivelDeAcessoRequest $request, NivelDeAcesso $nivelDeAcesso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NivelDeAcesso  $nivelDeAcesso
     * @return \Illuminate\Http\Response
     */
    public function destroy(NivelDeAcesso $nivelDeAcesso)
    {
        //
    }
}
