@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')

   @if($flash=Session::get('exito'))
    <h1>Listado de Solicitudes</h1>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ $flash }} </strong> 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
@stop

@section('content')
@if(!$texto)
<a href="/excel" class="btn btn-success mb-3"><i class="fas solid fa-file-export"></i>Generar Reportes</a>
@endif
@if($texto)
<a href="/excel1?texto={{ $texto }}" class="btn btn-success mb-3"><i class="fas solid fa-file-export"></i>Generar Reportes</a>
@endif
{{--$nombre_aplicativo[0] -> $nombre_de_aplicativo--}}
<form  action="{{ route('solicitud.index')}}" method="GET">
  <div class="form-row">
    <div class="col-sm-4 my-1">
        <input type="text" class="form-control" name="texto" value="{{ $texto }}">
    </div>   
        <div class="col-sm-4 my-1">
        <input type="submit" class="btn btn-primary" value="Buscar">
    </div> 
  </div>
</form>

<form class="row g-3" action="{{ route('consulta.index')}}" method="GET">
@csrf

    <div class="col-md-6">
        <label for="f1" class="form-label">Fecha Inicio</label>
        <input  type="date"  class="form-control" name="f1" id="f1" value="{{ $f1 }}"/>
    </div>    
    <div class="col-md-6">
        <label for="f2" class="form-label">Fecha Fin</label>
        <input  type="date"  class="form-control" name="f2" id="f2" value="{{ $f2 }}"/>
    </div>
    <div class="d-grid gap-2 col-3 mx-auto">
       <button type="submit" class="btn btn-info btn-sm">Filtrar</button>
    </div>

</form>



<table id="solicitud" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Release</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Responsable movistar</th>
            <th scope="col">Tipo de Requerimiento</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
    
    @if(count($solicitudes)<=0)    
        <tr> 
            <td colspan="8">No hay resultados</td>
        </tr>
    @else    
         @foreach  ($solicitudes as $solicitud)
         <tr>
              <td>{{ $solicitud->id }}</td>
             @if($solicitud->tipo_de_recurso == 'EXTERNO')   
              <td>RL_{{ $solicitud->aplicacion }}_2023{{ $solicitud->id }}_AM</td>
             @else
              <td>RL_{{ $solicitud->aplicacion }}_2023{{ $solicitud->id }}</td>
             @endif
              <td>{{ $solicitud->descripcion }}</td>
              <td>{{ $solicitud->responsable_movistar }}</td>
              <td>{{ $solicitud->tipo_de_requerimiento }}-{{ $solicitud->registro_rq }}</td>
             
             <td>
                  <form action="{{ route ('solicitud.destroy',$solicitud->id)}}" method="POST">
                  @csrf 
                  @method('DELETE')
                  <button type="submit" class="btn btn-primary">Consultar</button>
                  </form>
               </td> 
         </tr>
         @endforeach
         @endif
        
    </tbody>            
</table>

<div class="card-footer mr-auto">
    {{ $solicitudes->links() }}
</div>  
@stop

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function () {
    $('#articulos').DataTable({
       "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "ALL"]] 
    });
});
</script>
@stop