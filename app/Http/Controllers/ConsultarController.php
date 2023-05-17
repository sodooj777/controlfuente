<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solicitud;
use App\Models\Aplicativos;
use App\Models\Release;
/*use App\Lib\Solicitud_mostrar;*/
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ConsultarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)

    {
           

            $f1 = $request ->get('f1');
            $f2 = $request ->get('f2');
            
                
            $solicitudes = DB::table('release')
            ->join('solicitud','solicitud.id', '=', 'release.id_solicitud')
            ->join('aplicativos','aplicativos.id', '=', 'solicitud.id_aplicativos') 
            ->join('users','users.id', '=', 'solicitud.id_users')
            ->whereBetween('release.año',[$f1,$f2])
            ->orderBy('solicitud.id','asc')         
            ->get(array('solicitud.id','release.año','release.estatus','solicitud.descripcion','solicitud.responsable_movistar',
            'solicitud.tipo_de_requerimiento','solicitud.registro_rq','aplicativos.aplicacion','users.name','users.lastname','users.cedula','users.tipo_de_recurso'));   
          
                      
           return view('consulta.search',["f1"=>$f1,"f2"=>$f2])->with('solicitudes',$solicitudes);
   
       
    
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
