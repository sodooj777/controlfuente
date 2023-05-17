@extends('adminlte::page')

@section('title', 'CRUD con Laravel')

@section('content_header')
    <h1>ACTUALIZACION DE RELEASE</h1>
@stop

@section('content')
<form action="/solicitud/{{$solicitud->id}}" method="POST">
    @csrf
    @method('PUT')

   {{--<div class="mb-3">
        <label for="" class="form-label">ID</label>
        <input id="id" name="id_solicitud" disabled="true" type="text" class="form-control" value="{{ $solicitu->id_solicitud }}">
    </div>--}} 

   <div class="mb-3">
        <label for="" class="form-label">Nombre de release</label>
        <input id="aplicacion" name="aplicacion" disabled="true" type="text" class="form-control" value="RL_{{ $solicitudes->aplicacion }}_2023{{--date($solicitu->año)--}}{{$solicitu->id_solicitud}}">
    </div>
 
    <div class="mb-3">
        <label for="" class="form-label" >Descripcion</label>
        <input id="descripcion" name="descripcion" disabled="true"  type="text" type="text" class="form-control" value="{{ $solicitud->descripcion }}">
    </div>
  
    <div class="mb-3">
        <label for="" class="form-label" >Estatus</label>
        <input id="estatus" name="estatus"  disabled="true" type="text" type="text" class="form-control" value="{{ $solicitu->estatus }}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Responsable movistar</label>
        <input id="responsable_movistar"  name="responsable_movistar" disabled="true" type="text" class="form-control" value="{{ $solicitud->responsable_movistar }}">
    </div>
  

    
    <a href="/solicitud" class="btn btn-secondary" tabindex="5">Regresar</a>
   

</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop