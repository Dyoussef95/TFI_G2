<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $table = 'tarea';
    public $timestamps = false;

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class,'idProyecto');
    }

    public function recursos()
    {
        return $this->belongsToMany(Recurso::class, 'tarearecurso', 'idTarea', 'idRecurso')->withPivot('costo');
    }

    public function costoTotal()
    {
        
       $costoTotal = 0;
       foreach($this->recursos as $recurso){
        $costoTotal = $costoTotal+$recurso->pivot->costo;
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
