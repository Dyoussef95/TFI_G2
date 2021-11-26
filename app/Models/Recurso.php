<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    use HasFactory;

    protected $table = 'recurso';

    public $timestamps = false;

    public function tareas()
    {
        return $this->belongsToMany(Tarea::class, 'tarearecurso', 'idRecurso', 'idTarea')->withPivot('costo');
    }

    public function sobreasignados()
    {
        //declaro una coleccion
        $posibles = collect();
        //recorro las tareas donde está asignado el recurso y si tiene grado de avance <100, lo filtro como posible
        foreach($this->tareas as $tarea){
            if($tarea->gradoAvance<100){
                $posibles->push($tarea);
            }
        }
        $sobreasignados = collect();
        foreach($posibles as $actual){
            foreach($posibles as $siguiente){
                if($actual->id != $siguiente->id){
                    if(($siguiente->inicio > $actual->inicio && $siguiente->inicio < $actual->fin) || $siguiente->fin > $actual->inicio && $siguiente->fin < $actual->fin){
                        $par=collect();
                        $par->push($actual);
                        $par->push($siguiente);
                    }
                    $sobreasignados->push($par);
                }
            }
        }
        $sobreasignados=$sobreasignados->unique();
        return $sobreasignados;
    }
}
