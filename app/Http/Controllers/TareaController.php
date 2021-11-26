<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Recurso;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Proyecto $proyecto)
    {
        return view('tareas.create')->with('proyecto', $proyecto);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Proyecto $proyecto, Request $request)
    {
        $tarea = new Tarea;
        $tarea->descripcion = $request->descripcion;
        $tarea->inicio = $request->inicio;
        $tarea->fin = $request->fin;
        $tarea->gradoAvance = $request->gradoAvance;
        $tarea->idProyecto = $proyecto->id;
        $tarea->save();
        return redirect(url('/proyectos/'.$proyecto->id) );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function show(Tarea $tarea)
    {
        return view('tareas.view',compact('tarea'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyecto $proyecto, Tarea $tarea)
    {
        return view('tareas.edit',compact('tarea','proyecto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyecto $proyecto, Tarea $tarea)
    {
        $tarea->descripcion = $request->descripcion;
        $tarea->inicio = $request->inicio;
        $tarea->fin = $request->fin;
        $tarea->gradoAvance = $request->gradoAvance;
        $tarea->idProyecto = $proyecto->id;
        $tarea->save();
        return redirect(url('/proyectos/'.$proyecto->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyecto $proyecto, Tarea $tarea)
    {
        $tarea->delete();
        return redirect(url('/proyectos/'.$proyecto->id) );
    }

    public function createRecurso(Tarea $tarea)
    {
        $recursos = Recurso::all();
        return view('tareas.recurso.create',compact('tarea','recursos'));
    }

    public function storeRecurso(Request $request, Tarea $tarea)
    {
        $tarea->recursos()->attach($request->idRecurso, ['costo' => $request->costo]);
        return redirect(url('/tareas/'.$tarea->id) );
    }

    public function editRecurso(Tarea $tarea, Recurso $recursoActual)
    {
        $recursos = Recurso::all();
        return view('tareas.recurso.edit',compact('tarea','recursoActual','recursos'));
    }

    public function destroyRecurso(Tarea $tarea, Recurso $recurso)
    {
        $tarea->recursos()->detach($recurso->id);
        return redirect(url('/tareas/'.$tarea->id) );
    }
}
