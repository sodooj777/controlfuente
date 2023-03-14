@extends('adminlte::page')

@section('title', 'CRUD con Laravel')

@section('content_header')
    <h1>Editar Solicitud</h1>
@stop

@section('content')
<form action="/solicitud/{{$solicitud->id}}" method="POST">
    @csrf
    @method('PUT')
   <div class="mb-3">
        <label for="" class="form-label">Tipo de aplicativos</label>
        <input id="tipo_de_aplicativos" name="tipo_de_aplicativos" type="text" class="form-control" value="{{ $solicitud->tipo_de_aplicativos }}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descripcion</label>
        <input id="descripcion" name="descripcion" type="text" type="text" class="form-control" value="{{ $solicitud->descripcion }}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Responsable movistar</label>
        <input id="responsable_movistar"  name="responsable_movistar" type="text" class="form-control" value="{{ $solicitud->responsable_movistar }}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Tipo de Requerimiento</label>
        <input id="tipo_de_requerimiento" name="tipo_de_requerimiento" type="text"  class="form-control" value="{{ $solicitud->tipo_de_requerimiento }}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Registro RQ</label>
        <input id="registro_rq" name="registro_rq" type="text"  class="form-control" value="{{ $solicitud->registro_rq }}">
    </div>
    <a href="/solicitud" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>

</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop