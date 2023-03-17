<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Administracion;

class AdministracionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $administraciones = Administracion::all();
        return view('administracion.index')->with('administraciones',$administraciones);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administracion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $administraciones = new Administracion();

        $administraciones->proveedor = $request->get('proveedor');
        $administraciones->gerencia = $request->get('gerencia');
        $administraciones->supervisor = $request->get('supervisor');
        $administraciones->sufijo = $request->get('sufijo');
        $administraciones->cargo = $request->get('cargo');
        $administraciones->op_id = $request->get('op_id');

        $administraciones->save();

        return redirect('/administracion');
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
        $administracion= Administracion::find($id);
        return view('administracion.edit')->with('administracion',$administracion);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $administracion = Administracion::find($id);
        $administracion->proveedor = $request->get('proveedor');
        $administracion->tipo_de_recurso = $request->get('tipo_de_recurso');
        $administracion->gerencia = $request->get('gerencia');
        $administracion->supervisor = $request->get('supervisor');
        $administracion->sufijo = $request->get('sufijo');
        $administracion->cargo = $request->get('cargo');
        $administracion->op_id = $request->get('op_id');

        $administracion->save();

        return redirect('/administracion');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $administracion = Administracion::find($id);
        $administracion->delete();
        return redirect('/administracion');
    }
}
