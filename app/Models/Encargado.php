<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encargado extends Model
{
    use HasFactory;

    protected $table = 'encargado';

    public $timestamps = false;

    public function nombreCompleto()
    {
        return $this->nombre.' '.$this->apellido;
    }

}
