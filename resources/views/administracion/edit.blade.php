@extends('adminlte::page')

@section('title', 'CRUD con Laravel')

@section('content_header')
    <h1>Editar Solicitud</h1>
@stop

@section('content')
<form action="/administracion/{{$administracion->id}}" method="POST">
    @csrf
    @method('PUT')
   <div class="mb-3">
        <label for="" class="form-label">Proveedor</label>
        <input id="proveedor" name="proveedor" type="text" class="form-control" value="{{ $administracion->proveedor }}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Tipo de recurso</label>
        <input id="tipo_de_recurso" name="tipo_de_recurso" type="text" type="text" class="form-control" value="{{ $administracion->tipo_de_recurso }}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Gerencia</label>
        <input id="gerencia"  name="gerencia" type="text" class="form-control" value="{{ $administracion->gerencia }}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Supervisor</label>
        <input id="supervisor" name="supervisor" type="text"  class="form-control" value="{{ $administracion->supervisor }}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Sufijo</label>
        <input id="sufijo" name="sufijo" type="text"  class="form-control" value="{{ $administracion->sufijo }}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Cargo</label>
        <input id="cargo" name="cargo" type="text"  class="form-control" value="{{ $administracion->cargo }}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Codigo</label>
        <input id="op_id" name="op_id" type="text"  class="form-control" value="{{ $administracion->op_id }}">
    </div>
    <a href="/administracion" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>

</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop