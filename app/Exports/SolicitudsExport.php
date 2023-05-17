<?php

namespace App\Exports;

use App\Models\Solicitud;
use App\Models\Aplicativos;
use App\Models\Release;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize; // sirve para ajustar el texto con excel
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class SolicitudsExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable; 

    private $date;

    public function view(): View
    
    {
         
        
        
        $solicitudes = DB::table('release')
        ->join('solicitud','solicitud.id', '=', 'release.id_solicitud')
        ->join('aplicativos','aplicativos.id', '=', 'solicitud.id_aplicativos') 
        ->join('users','users.id', '=', 'solicitud.id_users')        
        ->get(array('solicitud.id','release.año','release.estatus','solicitud.descripcion','solicitud.responsable_movistar',
        'solicitud.tipo_de_requerimiento','solicitud.registro_rq','aplicativos.aplicacion','users.name','users.lastname','users.cedula','users.tipo_de_recurso')); 
       
     /* print_r($solicitudes);
     die(); */ 
      return view('exports.solicituds')->with('solicitudes',$solicitudes);
    
    }

    public function headings(): array
    {
        [
            '#',
            'Date',
        ];
    }
   
   
   
   // public function collection()

  //  {   
        /*$solicitudes = DB::table('aplicativos')
                ->select('tipo_de_aplicativos')
                ->join('solicitud', 'aplicativos.id', '=', 'solicitud.id_aplicativos')
                ->get();*/
        
       /* $nombre_aplicativo = DB::table('solicitud')
                ->select('*')
                ->join('aplicativos', 'aplicativos.id', '=', 'solicitud.id_aplicativos')        
                ->get();*/

        /*$nombre_aplicativo = DB::table('release')
                ->select('id_solicitud','descripcion','responsable_movistar','tipo_de_requerimiento','registro_rq','año','estatus')
                ->join('solicitud', 'solicitud.id', '=', 'release.id_solicitud')        
                ->get();*/
        
 
       // return $nombre_aplicativo;
        
        

    //}
}
