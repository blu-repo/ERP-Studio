
<?php $valor = $empleado->getEmpleadoByIdController($_POST['idEmpleadoEditar']); ?>
<?php
$td;
if($valor[5]==1){
 $td =  'C.C';
}
else{
  $td = 'NIT';
}

$rol = $empleado->getRolEmpleadoController($_POST['idEmpleadoEditar']);


?>

<div class="container" id="regEmpleadoEdicion">
<form id="formEmpleadoEdicion">
  <input type="hidden" id="idEmpleadogeneral" name="idEmpleadogeneral" value="<?php echo $_POST['idEmpleadoEditar']; ?>">
  <div class="form-group row">

    <div class="form-group col-md-6">
      <label for="nombre1_empleado">Primer nombre</label>
      <input type="text" class="form-control" id="nombresEmpleadoEditar" name="nombresEmpleadoEditar" value="<?php echo $valor[1]; ?>" placeholder="Primer nombre">
    </div>
    
    <div class="form-group col-md-6">
      <label for="apellidosEmpleado">Apellidos</label>
      <input type="text" class="form-control" id="apellidosEmpleadoEditar" name="apellidosEmpleadoEditar" value="<?php echo $valor[2]; ?>" placeholder="Apellidos">
    </div>

  </div>

   <div class="form-group row">
       <div class="form-group col-md-4">
           <label for="documentoEmp">Tipo de documento</label>
           <input id="TipoDocumentoEmpleadoEdicion" name="TipoDocumentoEmpleadoEdicion" value="<?php echo $td; ?>" class="form-control" disabled />
        </div>
        <div class="form-group col-md-4">
          <label for="documento">Documento</label>
          <input type="text" class="form-control" id="documentoEmpleadoEdicion" name="documentoEmpleadoEdicion" value="<?php echo $valor['documento']; ?>" placeholder="Documento">
        </div>
        <div class="form-group col-md-4">
           <label for="nacionalidad">Nacionalidad</label>
           <input id="nacionalidadEmpleadoEdicion" name="nacionalidadEmpleadoEdicion" value="<?php echo $valor['nacionalidad']; ?>" class="form-control" disabled/>
        </div>
    </div>

  <div class="form-group row">
    <div class="form-group col-md-4">
      <label for="nacimientoEmpleado">Fecha de nacimiento</label>
      <input type="date" class="form-control" id="nacimientoEmpleadoEditar" name="nacimientoEmpleadoEditar" value="<?php echo $valor['fechanacimiento']; ?>" placeholder="Fecha de nacimiento">
    </div>
    <div class="form-group col-md-4">
      <label for="direccionEmpleado">Direccion</label>
      <input type="text" id="direccionEmpleadoEditar" name="direccionEmpleadoEditar" class="form-control" value="<?php echo $valor['direccion']; ?>" placeholder="Direccion">
    </div>
    <div class="form-group col-md-4">
      <label for="tipocontrato">Lugar de nacimiento</label>
      <input type="text" id="lugarnacimientoEmpleadoEditar" name="lugarnacimientoEmpleadoEditar" class="form-control" value="<?php echo $valor['lugarnacimiento']; ?>" placeholder="Lugar de nacimiento">
    </div>
  </div>

  <div class="form-group row">
    <div class="form-group col-md-4">
      <label for="expedicion_doc_empleado">Expedicion de documento</label>
      <input type="text" class="form-control" id="expedocEmpleado" name="expedocEmpleado" value="<?php echo $valor['expediciondocumento']; ?>" placeholder="Expedicion de documento" disabled>
    </div>
    <div class="form-group col-md-4">
      <label for="aux_empleado">Correo electronico</label>
      <input type="text" class="form-control" id="emailempleadoEditar" name="emailempleadoEditar" value="<?php echo $valor['correo']; ?>"  placeholder="Email">
    </div>
    <div class="form-group col-md-4">
    <label for="empleadoRol">Rol del Empleado</label>
     <input name="rolEmpleado" id="rolEmpleado" class="form-control" value="<?php echo $rol; ?>" disabled/>
    </div>
  </div>

   <div class="form-group row">
    <div class="form-group col-md-4">
      <label for="pensionEmpleado">Cotizando Pension</label><br>
      <a href="" data-toggle="modal" data-target="#agregar_pension"  class="btn  btn-lg mybutton_cyano wow fadeIn"><span class="network-name">Cotiza Pension!</span></a>
    </div>
    <div class="form-group col-md-4">
      <label for="estudios">Estudios realizados</label><br>
      <a href="" data-toggle="modal" data-target="#agregar_estudios"  class="btn  btn-lg mybutton_cyano wow fadeIn"><span class="network-name">Registra un estudio!</span></a>
    </div>
    <div class="form-group col-md-4">
      <label for="estudios">Examenes Realizados</label><br>
      <a href="" data-toggle="modal" data-target="#agregar_examen"  class="btn  btn-lg mybutton_cyano wow fadeIn"><span class="network-name">Registro de examen!</span></a>
    </div>
  </div>

  <input type="submit" class="btn btn-primary" value="Editar Empleado"></input>
</form>
</div>
<?php include('modal/AgregarEstudios.php');  ?>
<?php include('modal/AgregarExamen.php');  ?>
<?php include('modal/AgregarPension.php');  ?>
<?php include('modal/AgregarEps.php');  ?>
