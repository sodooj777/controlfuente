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
        $administracion = Administracion::all();
        return view('administracion.index')->with('administracion',$administracion);
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
        $administracion = new Administracion();

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
