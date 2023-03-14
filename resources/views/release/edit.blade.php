@extends('adminlte::page')

@section('title', 'CRUD con Laravel')

@section('content_header')
    <h1>Editar Solicitud</h1>
@stop

@section('content')
<form action="/release/{{$release->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">ID Solcicitud</label>
        <input id="id_solicitud" name="id_solicitud" type="number" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Estatus</label>
        <input id="estatus" name="estatus" type="text" class="form-control" tabindex="2">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Nombre de release</label>
        <input id="nombre_de_release" name="nombre_de_release" type="text" class="form-control" tabindex="3">
    </div>
     <a href="/release" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>

</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop