<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Solicitud;
use App\Models\Aplicativos;
use App\Models\Release;
use App\Models\User;
/*use App\Lib\Solicitud_mostrar;*/
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;
use App\Exports\FechExport;
use Illuminate\Support\Str;


class SolicitudController extends Controller
{    
    public function __construct(){
        $this->middleware('auth');   //se utiliza para utenticar la session del usuario
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    { /* 
        $aplicativos = Aplicativos::all();
        $solicitudes = Solicitud::all();
        $fields = ["solicitud","nombre_aplicativo"];
        $nombre_aplicativo = [];
        for ($i=0; $i < count($solicitudes); $i++) { 
            for ($j=0; $j < count($aplicativos); $j++) { 
                if($solicitudes[$i]->id_aplicativos == $aplicativos[$j] -> id){
                    
                    $Solicitud_mostrar = new Solicitud_mostrar($aplicativos[$j]  -> aplicacion, $solicitudes[$i] );
                    array_push($nombre_aplicativo,$Solicitud_mostrar);
                    break;
                }
            }
        }*/

       /*  $solicitudes = DB::table('aplicativos')
                ->select('*')
                ->join('solicitud', 'aplicativos.id', '=', 'solicitud.id_aplicativos')
                ->join('users','users.id', '=', 'solicitud.id_users')
                ->whereBetween('año',['2023-03-22','2023-03-23']) 
                ->get();  */

                $f1 = $request ->get('f1');
                $f2 = $request ->get('f2');
               /*  print_r($f1);
                print_r($f2);
                die;  */
                $texto1=trim($request->get('texto'));
                $texto = Str::replace('RL_', '', Str::upper($texto1));
                
               
                $arraycontent = explode('_', $texto);
                $status = '';
                $ano = '';
                $id = '%%';
                $aplicativo = '';
                $externo = '';

                if(count($arraycontent)==1 && $arraycontent[0] == ''){
                    $arraycontent = [ 0 => '', 1 => '',2 => ''];
                /*
                } 
                if(count($arraycontent)==1){
                    if (Str::upper($arraycontent[0]) == 'ABIERTO' || Str::upper($arraycontent[0]) == 'CERRADO'){
                        $status = Str::lower($arraycontent[0]);
                    }else if(Str::upper($arraycontent[0]) == 'AM'){
                        $externo = Str::upper($arraycontent[0]);
                    }else if(is_numeric($arraycontent[0])){
                        $ano = Str::substr($arraycontent[0],0,4);
                        $id = Str::substr($arraycontent[0],4);
                    }
                    else{
                        $aplicativo = Str::upper($arraycontent[0]);
                    } */
                }else{
                    for ($i=0; $i < count($arraycontent); $i++) { 
                        if (Str::upper($arraycontent[$i]) == 'ABIERTO' || Str::upper($arraycontent[0]) == 'CERRADO'){
                            $status = Str::lower($arraycontent[$i]);
                        }else if(Str::upper($arraycontent[$i]) == 'AM'){
                            $externo = Str::upper($arraycontent[$i]);
                        }else if(is_numeric($arraycontent[$i])){
                            $ano = Str::substr($arraycontent[$i],0,4);
                            $id = Str::substr($arraycontent[$i],4);
                        }
                        else{
                            $aplicativo = Str::upper($arraycontent[$i]);
                        }
                    }
                }

                


                /*  print_r($texto1);
                die(); */ 
                $solicitudes = DB::table('release')
                ->select('solicitud.id','release.año','release.estatus','solicitud.descripcion','solicitud.responsable_movistar',
                'solicitud.tipo_de_requerimiento','solicitud.registro_rq','aplicativos.aplicacion','users.name','users.lastname','users.cedula','users.tipo_de_recurso')
                ->join('solicitud','solicitud.id', '=', 'release.id_solicitud')
                ->join('aplicativos','aplicativos.id', '=', 'solicitud.id_aplicativos') 
                ->join('users','users.id', '=', 'solicitud.id_users')
                ->where('release.estatus','LIKE','%'.$status.'%')
                ->where('aplicativos.aplicacion','LIKE','%'.$aplicativo.'%')
                ->where('release.año','LIKE','%'.$ano.'%')
                ->where('solicitud.id','LIKE',$id)
                ->orderBy('solicitud.id','asc')
                ->paginate(5); 
                
                $id = $request->session()->get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
                $users = User::find($id);
                /* print_r($users->rol);
                die; */ 

                if($users->rol == 1){
                    return view('solicitud.index',["f1"=>$f1,"f2"=>$f2, "texto"=>$texto])->with('solicitudes',$solicitudes); 
                }
                
                if ($users->rol == 2){
                    return view('desarrollo.index',["f1"=>$f1,"f2"=>$f2, "texto"=>$texto])->with('solicitudes',$solicitudes); 
                } 
                
                if ($users->rol == 3){
                    return view('consulta.index',["f1"=>$f1,"f2"=>$f2, "texto"=>$texto])->with('solicitudes',$solicitudes); 
                }
                
               
                   
               
      /*  print_r($data);
         die;*/
    
       
    }

    public function export(Request $request){
        
        $texto=trim($request->input('texto'));
        /* $texto='CLUB';  */
       /*  print_r($texto);
        die; */
      
        return Excel::download(new ProductsExport($request->id,$texto), 'reportes_busqueda.xlsx');
    }

    public function fech(Request $request){
        
        $f1 = $request ->get('f1');
        $f2 = $request ->get('f2'); 
       /*  $f1 = 21/03/2023;
        $f2 = 23/03/2023; */
        /* $texto='CLUB';  */
       /*   print_r($f1);
         print_r($f2);   */
      
      
        return Excel::download(new FechExport($request->id,$f1,$f2), 'reportes_fecha.xlsx');
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
        'id_users'=> $request->session()->get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d'),'descripcion' => $request->get('descripcion'),'responsable_movistar' => $request->get('responsable_movistar'), 
        'tipo_de_requerimiento'=> $request->get('tipo_de_requerimiento'), 'registro_rq'=> $request->get('registro_rq')]);
         
         
       /*   $solicitudes = DB::table('users')
         ->select('users.id')
         ->join('solicitud', 'users.id', '=', 'solicitud.id_users')
         ->get(); */


        
         

       /*  print_r($request->session()->get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d'));
       
        die(); */

        $use = DB::table('users')
                ->select('tipo_de_recurso')
                ->join('solicitud', 'users.id', '=', 'solicitud.id_users')
                ->where('solicitud.id_users','=',  $response->id_users)
                ->get()->first();

        $release = new Release();
        $release ->id_solicitud = $response->id;
        $release ->estatus = 'reservado';
        $release ->año = $response->created_at;
        

        $nombre_aplicativo = DB::table('solicitud')
        ->select('aplicativos.aplicacion')
        ->join('aplicativos', 'aplicativos.id', '=', 'solicitud.id_aplicativos')
        ->where('solicitud.id_aplicativos','=',  $response->id_aplicativos)
        ->get()->first();
        
        
          /* print_r($use->tipo_de_recurso);
          die; */
          $release  ->save();
      /*   $release  ->save();
        session()->flash('exito','el release fue creada exitoxamente bajo el numero ' . 'RL_' . $nombre_aplicativo->aplicacion . '_' .  '2023' . $response->id);
         */
        if ($use->tipo_de_recurso == 'EXTERNO'){
            
            session()->flash('exito','el release fue creada exitoxamente bajo el numero ' . 'RL_' . $nombre_aplicativo->aplicacion . '_' .  '2023' . $response->id .'_AM');
        }else{
            
            session()->flash('exito','el release fue creada exitoxamente bajo el numero ' . 'RL_' . $nombre_aplicativo->aplicacion . '_' .  '2023' . $response->id);
        }

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
          

        $solicitud= Solicitud::find($id);
        
        $solicitudes = Aplicativos::find($solicitud->id_aplicativos);

        $solicitudee= Release::find($id);
        $solicitu = Release::find( $solicitudee->id_solicitud);
        
        
        $solic = User::find( $solicitud->id_users);
       

       if($solicitu->estatus == 'Cerrado'){
            
           return view('solicitud.edit2')->with('solicitud',$solicitud)->with('solicitudes',$solicitudes)->with('solicitu',$solicitu)->with('solic',$solic);
   
       }else{

           return view('solicitud.edit')->with('solicitud',$solicitud)->with('solicitudes',$solicitudes)->with('solicitu',$solicitu)->with('solic',$solic);
   
       }
          
       
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
        $solicitud= Solicitud::find($id);
        
        $solicitudes = Aplicativos::find($solicitud->id_aplicativos);
      //  print_r($solicitudes);

        $solicitudee= Release::find($id);
        $solicitu = Release::find( $solicitudee->id_solicitud);
        //print_r($solicitu);
        //die();
        $solic = User::find( $solicitud->id_users);

        return view('solicitud.consulta')->with('solicitud',$solicitud)->with('solicitudes',$solicitudes)->with('solicitu',$solicitu)->with('solic',$solic);
    }
}
