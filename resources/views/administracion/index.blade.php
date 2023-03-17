@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
    <h1>Administracion de usuarios -EDICION</h1>
@stop

@section('content')
<a href="administracion/create" class="btn btn-primary mb-3">CREAR</a>

<table id="administracion" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Proveedor</th>
            <th scope="col">Tipo de recurso</th>
            <th scope="col">Gerencia</th>
            <th scope="col">Supervisor</th>
            <th scope="col">Sufijo</th>
            <th scope="col">Cargo</th>
            <th scope="col">Codigo</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
         @foreach  ($administraciones as $administracion)
         <tr>
              <td>{{ $administracion->id }}</td>
              <td>{{ $administracion->proveedor }}</td>
              <td>{{ $administracion->tipo_de_recurso }}</td>
              <td>{{ $administracion->gerencia }}</td>
              <td>{{ $administracion->supervisor }}</td>
              <td>{{ $administracion->sufijo }}</td>
              <td>{{ $administracion->cargo }}</td>
              <td>{{ $administracion->op_id }}</td>
             
            <td>
                  <form action="{{ route ('administracion.destroy',$administracion->id)}}" method="POST">
                  <a href="/administracion/{{ $administracion->id }}/edit" class="btn btn-info">Editar</a>
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