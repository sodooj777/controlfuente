@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
    <h1>Listado de Releases</h1>
@stop

@section('content')
<a href="release/create" class="btn btn-primary mb-3">CREAR</a>

<table id="release" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
           
            <th scope="col">Estatus</th>
            <th scope="col">Nombre de release</th>
            <th scope="col">nombre dela numeracion</th>
            <th scope="col">nombre de la asociacion_de_release</th>
            <th scope="col">ID Solcicitud</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
         @foreach  ($release as $releases)
         <tr>
              <td>{{ $releases->id }}</td>
              <td>{{ $releases->estatus }}</td>
              <td>{{ $releases->nombre_de_release }}</td>
              <td>{{ $releases->nombre_de_la_numeracion}}</td>
              <td>{{ $releases->nombre_de_la_asociacion_de_release}}</td>
              <td>{{ $releases->id_solicitud}}</td>
             
            <td>
                  {{--<form action="{{ route ('release.destroy',$release->id)}}" method="POST">
                  <a href="/release/{{ $release->id }}/edit" class="btn btn-info">Editar</a>
                  @csrf 
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Borrar</button>
                  </form>--}}
               </td> 
         </tr>
         @endforeach
    </tbody>            
</table>

@stop

@section('css')
    <link href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css" rel="stylesheet">
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