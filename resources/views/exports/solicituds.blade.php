<table style="position: relative; top: 50px;">
    <thead>
    <tr>

    <th scope="col">Release</th>
    <th scope="col">Descripcion</th>
    <th scope="col">Responsable movistar</th>
    <th scope="col">Tipo de Requerimiento</th>
    <th scope="col">Año</th>
    <th scope="col">Estatus</th>
    <th scope="col">Nombre</th>
    <th scope="col">Apellido</th>
    <th scope="col">Cedula</th>
    <th scope="col">Recurso</th>
    
    </tr>
    </thead>
    <tbody>
    @foreach($solicitudes as $solicitud)
        <tr>
         @if($solicitud->tipo_de_recurso == 'EXTERNO')   
        <td>RL_{{ $solicitud->aplicacion }}_2023{{ $solicitud->id }}_AM</td>
         @else
        <td>RL_{{ $solicitud->aplicacion }}_2023{{ $solicitud->id }}</td>
         @endif
        <td>{{ $solicitud->descripcion }}</td>
        <td>{{ $solicitud->responsable_movistar }}</td>
        <td>{{ $solicitud->tipo_de_requerimiento }}-{{ $solicitud->registro_rq }}</td>
        <td>{{ $solicitud->año }}</td>
        <td>{{ $solicitud->estatus }}</td>
        <td>{{ $solicitud->name }}</td>
        <td>{{ $solicitud->lastname }}</td>
        <td>{{ $solicitud->cedula }}</td>
        <td>{{ $solicitud->tipo_de_recurso }}</td>
     
        </tr>
    @endforeach

   

    </tbody>
</table>