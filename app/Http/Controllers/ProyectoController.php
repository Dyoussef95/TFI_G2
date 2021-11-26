<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Encargado;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::all();
        return view('proyectos.index',compact('proyectos'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $encargados = Encargado::all();
        return view('proyectos.create',compact('encargados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proyecto = new Proyecto;
        $proyecto->nombre = $request->nombre;
        $proyecto->descripcion = $request->descripcion;
        $proyecto->inicio = $request->inicio;
        $proyecto->fin = $request->fin;
        $proyecto->idEncargado = $request->idEncargado;
        $proyecto->save();
        return redirect(url('/proyectos') );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Proyecto $proyecto)
    {
        $encargados = Encargado::all();
        return view('proyectos.view',compact('encargados','proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyecto $proyecto)
    {
        $encargados = Encargado::all();
        return view('proyectos.edit',compact('encargados','proyecto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        $proyecto->nombre = $request->nombre;
        $proyecto->descripcion = $request->descripcion;
        $proyecto->inicio = $request->inicio;
        $proyecto->fin = $request->fin;
        $proyecto->idEncargado = $request->idEncargado;
        $proyecto->save();
        return redirect(url('/proyectos') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();
        return redirect(url('/proyectos') );
    }
}
