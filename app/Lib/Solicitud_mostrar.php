<?php 
namespace App\Lib;
use App\Models\Solicitud;

class Solicitud_mostrar{

    public function __construct(
        public string $nombre_de_aplicativo,
        public Solicitud $solicitud,
    ) {
    }
}