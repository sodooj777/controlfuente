@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')

   @if($flash=Session::get('exito'))
    <h1>Listado de Solicitudes</h1>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>felicidades</strong> {{ $flash }} 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
@stop

@section('content')

<a href="solicitud/create" class="btn btn-primary mb-3">CREAR</a>
{{--$nombre_aplicativo[0] -> $nombre_de_aplicativo--}}
<table id="solicitud" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tipo de aplicativos</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Responsable movistar</th>
            <th scope="col">Tipo de Requerimiento</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
         @foreach  ($solicitudes as $solicitud)
         <tr>
              <td>{{ $solicitud->id }}</td>
              <td>{{ $solicitud->tipo_de_aplicativos }}</td>
              <td>{{ $solicitud->descripcion }}</td>
              <td>{{ $solicitud->responsable_movistar }}</td>
              <td>{{ $solicitud->tipo_de_requerimiento }}-{{ $solicitud->registro_rq }}</td>
             
             <td>
                  <form action="{{ route ('solicitud.destroy',$solicitud->id)}}" method="POST">
                  <a href="/solicitud/{{ $solicitud->id }}/edit" class="btn btn-info">Editar</a>
                  @csrf 
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Borrar</button>
                  </form>
               </td> 
         </tr>
         @endforeach
    </tbody>            
</table>

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