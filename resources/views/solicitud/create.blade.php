@extends('adminlte::page')

@section('title', 'CRUD con Laravel')

@section('content_header')
 <h2>Editar Solicitud</h2>
@stop


@section('content')
<form action="/solicitud" method="POST">
   @csrf 
    {{--COMENTADO<div class="mb-3">
        <label for="" class="form-label">Nombre de la Aplicacion</label>
        <input id="nombre_de_la_aplicacion" name="nombre_de_la_aplicacion" type="text" class="form-control" tabindex="1">
    </div>--}}

    <div class="mb-3">
        <label for="" class="form-label">Tipo de Aplicativos</label>
        <select name="id_aplicativos" id="id_aplicativos" class="form-control">
            
          <option>------Seleccionar------</option>
          @foreach ($aplicativos as $aplicativo)   
          <option value="{{ $aplicativo->id  }}">{{ $aplicativo->tipo_de_aplicativos }}</option>
            <!--  
             <option value="AAA_CDMA">AAA_GSM</option>   
             <option value="AAA_GSM">AAA_GSM</option>
             <option value="ACTIVAME">ACTIVAME</option>
             <option value="ADMDEBDIR">ADMDEBDIR</option>
             <option value="AGK2">AGK2</option>
             <option value="APROBACION_DE_REEMBOLSO">APROBACION_DE_REEMBOLSO</option>
             <option value="AUDITSRV">AUDITSRV</option>
             <option value="AVILA">AVILA</option>
             <option value="BBS">BBS</option>
             <option value="BDC">BDC</option>
             <option value="CANAIMA">CANAIMA</option>
             <option value="CBS">CBS</option>
             <option value="CGS">CGS</option>
             <option value="CGV">CGV</option>
             <option value="CIERRE">CIERRE</option>
             <option value="CIES">CIES</option>
             <option value="CLUB_MOVISTAR">CLUB_MOVISTAR</option>
             <option value="COBRANZAS">COBRANZAS</option>
             <option value="CONFIGURACIONP3S">CONFIGURACIONP3S</option>
             <option value="CONFIGURAME">CONFIGURAME</option>
             <option value="CONOCEME">CONOCEME</option>
             <option value="CONOCER_T">CONOCER_T</option>
             <option value="CONTACTOS">CONTACTOS</option>
             <option value="CONTACTOS_MANUALES">CONTACTOS_MANUALES</option>
             <option value="CVSCPLUS">CVSCPLUS</option>
             <option value="CVSCPSP">CVSCPSP</option>
             <option value="CVT_DEV">CVT_DEV</option>
             <option value="DATAMART">DATAMART</option>
             <option value="DATASTAGE">DATASTAGE</option>
             <option value="DOC1">DOC1</option>
             <option value="EME911">EME911</option>
             <option value="FASTNET">FASTNET</option>
             <option value="FASTWAY">FASTWAY</option>
             <option value="FC">FC</option>
             <option value="FIDELIZAME">FIDELIZAME</option>
             <option value="GESTIONAME">GESTIONAME</option>
             <option value="HBILLING">HBILLING</option>
             <option value="ICE">ICE</option>
             <option value="INTERMEDIATE">INTERMEDIATE</option>
             <option value="INTRANET">INTRANET</option>
             <option value="IVR">IVR</option>
             <option value="K2">K2</option>
             <option value="MASICOB">MASICOB</option>
             <option value="MIC">MIC</option>
             <option value="MIGRACIONP3S">MIGRACIONP3S</option>
             <option value="MI_MOVISTAR_ONLINE">MI_MOVISTAR_ONLINE</option>
             <option value="MI_PUNTO">MI_PUNTO</option>
             <option value="OSB">OSB</option>
             <option value="OSB_PNN">OSB_PNN</option>
             <option value="PLAN_OPTIMO">PLAN_OPTIMO</option>
             <option value="PREPAGO">PREPAGO</option>
             <option value="PRESUSCRIPCION">PRESUSCRIPCION</option>
             <option value="PROMOCION_FIDELIDAD">PROMOCION_FIDELIDAD</option>
             <option value="PROVISIONING_DATOS">PROVISIONING_DATOS</option>
             <option value="PROVISIONING_SUCUENTA">PROVISIONING_SUCUENTA</option>
             <option value="RBT">RBT</option>
             <option value="REMEDY">REMEDY</option>
             <option value="REPORTE">REPORTE</option>
             <option value="SAP_BW">SAP_BW</option>
             <option value="SAP_ECC">SAP_ECC</option>
             <option value="SAS">SAS</option>
             <option value="SCL ROAMING">SCL ROAMING</option>
             <option value="SISTEMA DE CONTROL FUENTES">SISTEMA DE CONTROL FUENTES</option>
             <option value="SUCUENTA">SUCUENTA</option>
             <option value="TBILLING">TBILLING</option>
             <option value="TCONECTA">TCONECTA</option>
             <option value="TELCOFINANCE">TELCOFINANCE</option>
             <option value="TELSAFE">TELSAFE</option>
             <option value="TIMETRAC">TIMETRAC</option>
             <option value="TMON">TMON</option>
             <option value="TOWIND">TOWIND</option>
             <option value="VOLUBILL">VOLUBILL</option>
             <option value="VYC500">VYC500</option> -->
             @endforeach
        </select>    
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descripcion</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="2" >
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Responsable Movistar</label>
        <input id="responsable_movistar" name="responsable_movistar" type="text" class="form-control" tabindex="3">
    </div>
    {{-- COMENTADO<div class="mb-3">
        <label for="" class="form-label">Tipo de Requerimiento</label>
        <input id="tipo_de_requerimiento" name="tipo_de_requerimiento" type="text" class="form-control" tabindex="4">
    </div>--}}
    <div class="col-md-4">
        <label for="" class="form-select">Tipo de Requerimiento</label>
        <select name="tipo_de_requerimiento" id="tipo_de_requerimiento" class="col-md-4" >
            
            <option>------Seleccionar------</option>
           
             <option value="WO" >Work Orden</option>
             <option value="INC">Incidencia</option>
             <option value="PRY">Proyecto</option>
             <option value="RQ">Requerimiento</option>
        </select>    
    </div> 
    <div id="showWO" class="myDiv">
    <label for="" class="form-label"><strong>"0000009999999"</strong></label>
    <input id="registro_rqWO" name="" type="number" class="form-control"  />
</div>

<div id="showINC" class="myDiv">
    <label for="" class="form-label"><strong>"9999999"</strong></label>
    <input id="registro_rqINC" name="" type="number" class="form-control"  />
</div>
<div id="showPRY" class="myDiv">
	<label for="" class="form-label"><strong>"VE99XXYYYYY99/9999-999-99_9"</strong></label>
    <input id="registro_rqPRY" name="" type="number" class="form-control"  />
</div> 
<div id="showRQ" class="myDiv">
	<label for="" class="form-label"><strong>"00000000099999_99"</strong></label>
    <input id="registro_rqRQ" name="" type="number" class="form-control"  />
</div>
   <input id="registro_rq" name="registro_rq" type="hidden" class="form-control"  />
    <a href="/solicitud" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4" onclick="SetValuesRegisterQb();">Guardar</button>
     
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style type="text/css">
 .myDiv{
	display:none;
    padding:10px;
    margin-top:20px;
}  
#showOne{
    border:1px solid red;
}
#showTwo{
    border:1px solid green;
}
#showThree{
    border:1px solid blue;
}   

#showcuatro{
    border:1px solid blue;
}   
</style>  
@stop

@section('js')
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
 

    $('#tipo_de_requerimiento').on('change', function(){
    	var demovalue = $(this).val(); 
        $("div.myDiv").hide();
        $("#show"+demovalue).show();
        
    });

});

//function mostrar(){
 
/*swal("Titulo", "Contenido", "success");*/
//swal("Release", "se a creado");

//}    

SetValuesRegisterQb = function(){
        let demovalue = $("#tipo_de_requerimiento").val();
        console.log('demovalue',demovalue)
        let registerqb = $("#registro_rq"+demovalue).val();
        console.log('registerqb',registerqb)
        $("#registro_rq").val(registerqb);
        console.log('registerqb', $("#registro_rq").val())

    }


</script>
@stop