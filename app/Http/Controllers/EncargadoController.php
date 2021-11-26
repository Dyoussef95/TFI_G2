<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encargado;

class EncargadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $encargados=Encargado::all();
        return view('encargados.index',compact('encargados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('encargados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $encargado = new Encargado;
        $encargado->nombre=$request->nombre;
        $encargado->apellido=$request->apellido;
        $encargado->legajo=$request->legajo;
        $encargado->save();
        return redirect(url('/encargados') );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Encargado $encargado)
    {
        return view('encargados.edit',compact('encargado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Encargado $encargado)
    {
        $encargado->nombre=$request->nombre;
        $encargado->apellido=$request->apellido;
        $encargado->legajo=$request->legajo;
        $encargado->save();
        return redirect(url('/encargados') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Encargado $encargado)
    {
        $encargado->delete();
        return redirect(url('/encargados') );
    }
}
