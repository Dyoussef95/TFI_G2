<?php

namespace App\Http\Controllers;

use App\Models\Recurso;
use Illuminate\Http\Request;

class RecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recursos=Recurso::all();
        return view('recursos.index',compact('recursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recursos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recurso = new Recurso;
        $recurso->descripcion = $request->descripcion;
        $recurso->save();
        return redirect(url('/recursos') );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recurso  $recurso
     * @return \Illuminate\Http\Response
     */
    public function show(Recurso $recurso)
    {
        return $recurso;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recurso  $recurso
     * @return \Illuminate\Http\Response
     */
    public function edit(Recurso $recurso)
    {
        return view('recursos.edit',compact('recurso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recurso  $recurso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recurso $recurso)
    {
        $recurso->descripcion=$request->descripcion;
        $recurso->save();
        return redirect(url('/recursos') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recurso  $recurso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recurso $recurso)
    {
        $recurso->delete();
        return redirect(url('/recursos') );
    }

    public function indexReport()
    {
        $recursos = Recurso::all();
        $reportes = collect();
        
        foreach($recursos as $recurso){
            $reporte=collect();
            $reporte->put('recurso',$recurso);
            $reporte->put('tareas',$recurso->sobreasignados());
            $reportes->push($reporte);
        }

        //dd($reportes->first()->first());
        return view('proyectos.reports.index',compact('reportes'));
    }
}
