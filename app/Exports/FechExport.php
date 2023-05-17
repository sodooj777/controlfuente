<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Models\Solicitud;
use App\Models\Release;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request; 
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize; 

class FechExport implements FromView, ShouldAutoSize
{   
    protected $id;
    protected $f1;
    protected $f2;
    
     function __construct($id,$f1,$f2) {
            $this->id = $id;
            $this->f1 = $f1;
            $this->f2 = $f2;
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
                ->whereBetween('release.año',[$this->f1,$this->f2])
                ->orderBy('solicitud.id','asc')
                ->get(array('solicitud.id','release.año','release.estatus','solicitud.descripcion','solicitud.responsable_movistar',
                'solicitud.tipo_de_requerimiento','solicitud.registro_rq','aplicativos.aplicacion','users.name','users.lastname','users.cedula','users.tipo_de_recurso'));         
        
          
        /*print_r(   $solicitudes);
       die(); */

        /* print_r($this->f1);
        print_r($this->f2); 
        print_r( $solicitudes);
        die;  */
        return view('exports.solicituds',["f1"=>$this->f2,"f2"=>$this->f2])->with('solicitudes',$solicitudes);
    }
}
