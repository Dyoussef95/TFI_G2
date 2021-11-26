<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $table = 'proyecto';

    public $timestamps = false;

    public function encargado()
    {
        return $this->belongsTo(Encargado::class,'idEncargado');
    }

    public function tareas()
    {
        return $this->hasMany(Tarea::class,'idProyecto');
    }

    public function gradoAvanceTotal()
    {
        $gradoAvanceTotal = $this->tareas->avg('gradoAvance');
        return $gradoAvanceTotal;
    }

    public function costoTotal()
    {
        
       $costoTotal = 0;
       foreach($this->tareas as $tarea){
        $costoTotal = $costoTotal+$tarea->costoTotal();
       }
       
       
        return $costoTotal;
    }

    public function inicio()
    {
        $inicio = date('d/m/Y', strtotime($this->inicio));
       
        return $inicio;
    }

    public function fin()
    {
        $fin = date('d/m/Y', strtotime($this->fin));
        return $fin;
    }
}
