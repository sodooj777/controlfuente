<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
   protected $table = 'solicitud';
   use HasFactory;
   
   protected $fillable = [
    'id_aplicativos',
    'descripcion',
    'responsable_movistar',
    'tipo_de_requerimiento',
    'registro_rq'
   ];
}
