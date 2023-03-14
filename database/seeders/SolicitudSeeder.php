<?php

namespace Database\Seeders;

use App\Models\Solicitud;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SolicitudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $solicitudes = new Solicitud();

        $solicitudes->tipo_de_aplicativos = "intro";
        $solicitudes->descripcion = "N/a";
        $solicitudes->responsable_movistar = " dexy";
        $solicitudes->tipo_de_requerimiento = "WO";
        $solicitudes->registro_rq = "0022";

        $solicitudes->save();

        $solicitudes = new Solicitud();

        $solicitudes->tipo_de_aplicativos = "CRUDssS";
        $solicitudes->descripcion = "N/a";
        $solicitudes->responsable_movistar = " MARTINEZ";
        $solicitudes->tipo_de_requerimiento = "INC";
        $solicitudes->registro_rq = "3333333";

        $solicitudes->save();
    }
}
