<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Solicitud;
use App\Models\Aplicativos;
use App\Models\Release;
/*use App\Lib\Solicitud_mostrar;*/
use Illuminate\Support\Facades\DB;



class SolicitudController extends Controller
{    
    public function __construct(){
        $this->middleware('auth');   //se utiliza para utenticar la session del usuario
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    { /* 
        $aplicativos = Aplicativos::all();
        $solicitudes = Solicitud::all();
        $fields = ["solicitud","nombre_aplicativo"];
        $nombre_aplicativo = [];
        for ($i=0; $i < count($solicitudes); $i++) { 
            for ($j=0; $j < count($aplicativos); $j++) { 
                if($solicitudes[$i]->id_aplicativos == $aplicativos[$j] -> id){
                    
                    $Solicitud_mostrar = new Solicitud_mostrar($aplicativos[$j]  -> tipo_de_aplicativos, $solicitudes[$i] );
                    array_push($nombre_aplicativo,$Solicitud_mostrar);
                    break;
                }
            }
        }*/

        $solicitudes = DB::table('aplicativos')
                ->select('*')
                ->join('solicitud', 'aplicativos.id', '=', 'solicitud.id_aplicativos')
                ->get();
          
      /*  print_r($data);
         die;*/
       return view('solicitud.index')->with('solicitudes',$solicitudes);
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $aplicativos = Aplicativos::all();
       return view('solicitud.create')->with('aplicativos',$aplicativos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        /* 
       
        
        $solicitudes = new Solicitud();

        $solicitudes->id_aplicativos= $request->get('id_aplicativos');
        $solicitudes->descripcion = $request->get('descripcion');
        
        $solicitudes->responsable_movistar = $request->get('responsable_movistar');
        $solicitudes->tipo_de_requerimiento = $request->get('tipo_de_requerimiento');
        $solicitudes->registro_rq = $request->get('registro_rq');  */
               
        $response = Solicitud::create(['id_aplicativos'=> $request->get('id_aplicativos'),
        'descripcion' => $request->get('descripcion'),'responsable_movistar' => $request->get('responsable_movistar'), 
        'tipo_de_requerimiento'=> $request->get('tipo_de_requerimiento'), 'registro_rq'=> $request->get('registro_rq')]);
    
        $release = new Release();
        $release ->id_solicitud = $response->id;
        $release ->estatus = 'reservado';
        $release ->año = $response->created_at;
        

        $nombre_aplicativo = DB::table('solicitud')
        ->select('aplicativos.tipo_de_aplicativos')
        ->join('aplicativos', 'aplicativos.id', '=', 'solicitud.id_aplicativos')
        ->where('solicitud.id_aplicativos','=',  $response->id_aplicativos)
        ->get()->first();

        $release  ->save();
        session()->flash('exito','el release fue creada exitoxamente bajo el numero ' . 'RL_' . $nombre_aplicativo->tipo_de_aplicativos . '_' .  '2023' . $response->id);


        return redirect('/solicitud');
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
        $solicitudes = Aplicativos::find($id);
        $solicitud= Solicitud::find($id);
        return view('solicitud.edit')->with('solicitud',$solicitud)->with('solicitudes',$solicitudes);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $solicitud = Solicitud::find($id);
        $solicitud->descripcion = $request->get('descripcion');
        
        $releasebd = DB::table('release')
        ->where('id_solicitud','=',$id)        
        ->update(['estatus' => $request->get('estatus')]);

       



        $solicitud->save();
        return redirect('/solicitud');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $solicitud = Solicitud::find($id);
        $solicitud->delete();
        return redirect('/solicitud');
    }
}
