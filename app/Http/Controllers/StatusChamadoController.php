<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStatusChamadoRequest;
use App\Http\Requests\UpdateStatusChamadoRequest;
use App\Models\StatusChamado;

class StatusChamadoController extends Controller
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
     * @param  \App\Http\Requests\StoreStatusChamadoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStatusChamadoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StatusChamado  $statusChamado
     * @return \Illuminate\Http\Response
     */
    public function show(StatusChamado $statusChamado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StatusChamado  $statusChamado
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusChamado $statusChamado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStatusChamadoRequest  $request
     * @param  \App\Models\StatusChamado  $statusChamado
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStatusChamadoRequest $request, StatusChamado $statusChamado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StatusChamado  $statusChamado
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusChamado $statusChamado)
    {
        //
    }
}
