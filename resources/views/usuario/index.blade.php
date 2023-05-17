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

<a href="usuario/create" class="btn btn-primary mb-3">CREAR</a>
<table id="usuario" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Cedula</th>
            <th scope="col">Rol</th>
            <th scope="col">Email</th>
           
        </tr>
    </thead>
    <tbody>
         @foreach  ($usuarios as $usuario)
         <tr>
              <td>{{ $usuario->id }}</td>
              <td>{{ $usuario->name }}</td>
              <td>{{ $usuario->lastname }}</td>
              <td>{{ $usuario->cedula }}</td>
              <td>{{ $usuario->rol }}</td>
              <td>{{ $usuario->email }}</td>
                 {{--<form action="{{ route ('usuario.destroy',$usuario->id)}}" method="POST">
                  <a href="/usuario/{{ $usuario->id }}/edit" class="btn btn-info">Editar</a>
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