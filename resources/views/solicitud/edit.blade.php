@extends('adminlte::page')

@section('title', 'CRUD con Laravel')

@section('content_header')
    <h1>Editar Release</h1>
@stop

@section('content')
<form action="/solicitud/{{$solicitud->id}}" method="POST">
    @csrf
    @method('PUT')
   <div class="mb-3">
        <label for="" class="form-label">Nombre de release</label>
        <input id="tipo_de_aplicativos" name="tipo_de_aplicativos" disabled="true" type="text" class="form-control" value="{{ $solicitudes->tipo_de_aplicativos }}">
    </div>
 
    <div class="mb-3">
        <label for="" class="form-label" >Descripcion</label>
        <input id="descripcion" name="descripcion"   type="text" type="text" class="form-control" value="{{ $solicitud->descripcion }}">
    </div>
    <div class="col-md-4">
        <label for="" class="form-select" >Estado</label>
        <select name="estatus"  id="estatus" class="col-md-4" >
            
            <option>------Seleccionar------</option>
           
             <option value="Abierto" >Abierto</option>
             <option value="Suspendido">Suspendido</option>
             <option value="Reservado">Reservado</option>
             <option value="Cerrado">Cerrado</option>
            
        </select>    
    </div> 
    <div class="mb-3">
        <label for="" class="form-label">Responsable movistar</label>
        <input id="responsable_movistar"  name="responsable_movistar" disabled="true" type="text" class="form-control" value="{{ $solicitud->responsable_movistar }}">
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