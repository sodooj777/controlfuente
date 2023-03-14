<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Release;

class ReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $release = Release::all();
        return view('release.index')->with('release',$release);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('release.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $release = new Release();

        $release->id_solicitud = $request->get('id_solicitud');
       // $release->estatus = $request->get('estatus');
        $release->nombre_de_release = $request->get('nombre_de_release');
        $release->nombre_de_la_numeracion = $request->get('nombre_de_la_numeracion');
        $release->nombre_de_la_asociacion_de_release = $request->get('nombre_de_la_asociacion_de_release');

        $release->save();

        return redirect('/release');
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
        $releases= Release::find($id);
        return view('release.edit')->with('releases',$releases);
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
