@extends('adminlte::page')

@section('title', 'CRUD con Laravel')

@section('content_header')
    <h1>Administracion de usuarios -EDICION</h1>
@stop

@section('content')
<form action="/administracion" method="POST">
    @csrf
    
     <div class="col-md-6">
        <label for="">Prooveedor</label>
        <select name="proveedor" id="proveedor" class="form-select" aria-label="Default select example">
            
            <option>------Seleccionar------</option>
           
             <option value="ACCENTURE" >ACCENTURE</option>
             <option value="ADECCO">ADECCO</option>
             <option value="CONSEIN">CONSEIN</option>
             <option value="FYC">FYC</option>
             <option value="INDRA">INDRA</option>
             <option value="INFOSOFT">INFOSOFT</option>
             <option value="INNOVATEC">INNOVATEC</option>
             <option value="MANPOWER">MANPOWER</option>
             <option value="SGH Consultores">SGH Consultores</option>
             <option value="TELEFONICA VENEZUELA">TELEFONICA VENEZUELA</option>
        </select>    
    </div> 
  {{--<div class="col-md-6">
        <label for="">Tipo de Recurso</label>
        <select name="tipo_de_recurso" id="tipo_de_recurso" class="form-select" aria-label="Default select example">
            
            <option>------Seleccionar------</option>
           
             <option value="EXTERNO" >EXTERNO</option>
             <option value="INTERNO">INTERNO</option>
          
        </select>    
    </div>--}} 
   
    <div class="col-md-6">
        <label for="">Gerencia</label>
        <select name="gerencia" id="gerencia" class="form-select" aria-label="Default select example">
            
            <option>------Seleccionar------</option>
           
             <option value="Gerencia de Configuracion e Integracion" >Gerencia de Configuracion e Integracion</option>
             <option value="Gerencia de Procesos y Productos">Gerencia de Procesos y Productos</option>
             <option value="Gerencia de Pruebas Integrales y Certificacion">Gerencia de Pruebas Integrales y Certificacion</option>
             <option value="Gerencia Desarrollo de Sistemas Soporte Operacion">Gerencia Desarrollo de Sistemas Soporte Operacion</option>
             <option value="Gerencia Desarrollo e Implementacion Sistemas Backend">Gerencia Desarrollo e Implementacion Sistemas Backend</option>
             <option value="Gerencia Desarrollo e Implementacion Sistemas Cliente Final">Gerencia Desarrollo e Implementacion Sistemas Cliente Final</option>
             <option value="Gerencia Desarrollo e implementacion Sistemas Empresariales">Gerencia Desarrollo e implementacion Sistemas Empresariales</option>
             <option value="Gerencia Desarrollo e Implementacion Sistemas Front-End">Gerencia Desarrollo e Implementacion Sistemas Front-End</option>
             <option value="Gerencias Desarrollo e Implementacion Sistemas Informacion">Gerencias Desarrollo e Implementacion Sistemas Informacion</option>
             <option value="Gerencia Soporte Tecnico Aplicaciones">Gerencia Soporte Tecnico Aplicaciones</option>
        </select>    
    </div> 
    <div class="col-md-6">
        <label for="">Supervisor</label>
        <select name="supervisor" id="supervisor"  class="form-select" aria-label="Default select example" >
            
            <option selected>------Seleccionar------</option>
           
             <option value="ANA CHACON" >ANA CHACON</option>
             <option value="CARMEN GOMEZ">CARMEN GOMEZ</option>
             <option value="DANIELO JAIME" >DANIELO JAIME</option>
             <option value="ELIECER RUSSIAN">ELIECER RUSSIAN</option>
             <option value="FRANKLIN BALLESTEROS" >FRANKLIN BALLESTEROS</option>
             <option value="GABRIELA SANCHEZ">GABRIELA SANCHEZ</option>
             <option value="GLORIANA AGUIRRE" >GLORIANA AGUIRRE</option>
             <option value="GRISBEL LEON">GRISBEL LEON</option>
             <option value="GUSTAVO HOENICKA" >GUSTAVO HOENICKA</option>
             <option value="HENRY HUMBERTO GARCIA MENDOZA">HENRY HUMBERTO GARCIA MENDOZA</option>
             <option value="JAVIER LEON" >JAVIER LEON</option>
             <option value="JUAN LUIS RODRIGUEZ">JUAN LUIS RODRIGUEZ</option>
             <option value="LESTER MENDOZA">LESTER MENDOZA</option>
             <option value="MARCIAL MARTINEZ">MARCIAL MARTINEZ</option>
             <option value="MARIA CHACON">MARIA CHACON</option>
             <option value="ROSA AGUERA">ROSA AGUERA</option>
             <option value="SOTITIOS XANTHOULIS">SOTITIOS XANTHOULIS</option>
        </select>    
    </div> 
    <div class="col-sm-6">
        <label for="" class="form-label">Sufijo</label>
        <input id="sufijo"  name="sufijo" type="text" class="form-control" value="">
    </div>
    <div class="col-sm-6">
        <label for="" class="form-label">Cargo</label>
        <input id="cargo"  name="cargo" type="text" class="form-control" value="">
    </div>
    <div class="col-sm-6">
        <label for="" class="form-label">Codigo</label>
        <input id="op_id"  name="op_id" type="text" class="form-control" value="">
    </div>
   <br>
    <a href="/administracion" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>

    

</form>
@stop

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
@stop

@section('js')

@stop