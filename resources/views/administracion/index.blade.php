@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
    <h1>Administracion de usuarios -EDICION</h1>
@stop

@section('content')

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