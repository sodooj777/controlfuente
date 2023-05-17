<?php

namespace App\Exports;
use Illuminate\Support\Facades\DB;
use App\Models\Solicitud;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request; 
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize; 

class ProductsExport implements FromView, ShouldAutoSize
{


    protected $id;
    protected $texto;
    
     function __construct($id,$texto) {
            $this->id = $id;
            $this->texto = $texto;
     }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    { 
     
         $solicitudes = DB::table('release')
        ->join('solicitud','solicitud.id', '=', 'release.id_solicitud')
        ->join('aplicativos','aplicativos.id', '=', 'solicitud.id_aplicativos') 
        ->join('users','users.id', '=', 'solicitud.id_users')
        ->where('solicitud.id','LIKE','%'.$this->texto.'%')
        ->orwhere('release.año','LIKE','%'.$this->texto.'%')
        ->orWhere('aplicativos.aplicacion','LIKE','%'.$this->texto.'%')
        ->orderBy('solicitud.id','asc')
        ->get(array('solicitud.id','release.año','release.estatus','solicitud.descripcion','solicitud.responsable_movistar',
        'solicitud.tipo_de_requerimiento','solicitud.registro_rq','aplicativos.aplicacion','users.name','users.lastname','users.cedula','users.tipo_de_recurso'));         
       /*  echo 'o';  
        print_r(   $solicitudes);
       die(); */
        /* print_r($this->texto);
        print_r($solicitudes);
        die; */ 
        return view('exports.solicituds')->with('solicitudes',$solicitudes);
    }
}
