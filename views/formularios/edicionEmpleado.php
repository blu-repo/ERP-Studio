
<?php $empleado->getEmpleadoById($_POST['idEmpleadoEditar']); ?>

<div class="container" id="regEmpleadoEdicion">
<form id="formEmpleadoEdicion">

  <div class="form-group row">
    <div class="form-group col-md-4">
      <label for="nombre1_empleado">Primer nombre</label>
      <input type="text" class="form-control" id="primernombreEmpleado" name="primernombreEmpleado" placeholder="Primer nombre">
    </div>
    <div class="form-group col-md-4">
      <label for="nombre2_empleado">Segundo nombre</label>
      <input type="text" class="form-control" id="segundonombreEmpleado" name="segundonombreEmpleado" placeholder="Segundo nombre">
    </div>
    <div class="form-group col-md-4">
      <label for="apellidosEmpleado">Apellidos</label>
      <input type="text" class="form-control" id="apellidosEmpleado" name="apellidosEmpleado" placeholder="Apellidos">
    </div>
  </div>

   <div class="form-group row">
       <div class="form-group col-md-4">
           <label for="documentoEmp">Tipo de documento</label>
           <select id="TipoDocumentoEmpleado" name="TipoDocumentoEmpleado" class="form-control">
                <option value="1">C.C</option>
                <option value="2">NIT</option>
                <option selected>...</option>
           </select>
        </div>
        <div class="form-group col-md-4">
          <label for="documento">Documento</label>
          <input type="text" class="form-control" id="documentoEmpleado" name="documentoEmpleado" placeholder="Documento">
        </div>
        <div class="form-group col-md-4">
           <label for="nacionalidad">Nacionalidad</label>
           <select id="nacionalidadEmpleado" name="nacionalidadEmpleado" class="form-control">
                <option value="colombiana">Colombiana</option>
                <option value="venezolana">Venezolana</option>
                <option value="rusa">Rusa</option>
                <option value="mexicana">Mexicana</option>
                <option selected>...</option>
           </select>
        </div>
    </div>

  <div class="form-group row">
    <div class="form-group col-md-4">
      <label for="nacimientoEmpleado">Fecha de nacimiento</label>
      <input type="date" class="form-control" id="nacimientoEmpleado" name="nacimientoEmpleado" placeholder="Fecha de nacimiento">
    </div>
    <div class="form-group col-md-4">
      <label for="direccionEmpleado">Direccion</label>
      <input type="text" id="direccionEmpleado" name="direccionEmpleado" class="form-control" placeholder="Direccion">
    </div>
    <div class="form-group col-md-4">
      <label for="tipocontrato">Lugar de nacimiento</label>
      <input type="text" id="lugarnacimientoEmpleado" name="lugarnacimientoEmpleado" class="form-control" placeholder="Lugar de nacimiento">
    </div>
  </div>

  <div class="form-group row">
    <div class="form-group col-md-4">
      <label for="expedicion_doc_empleado">Expedicion de documento</label>
      <input type="text" class="form-control" id="expedocEmpleado" name="expedocEmpleado" placeholder="Expedicion de documento">
    </div>
    <div class="form-group col-md-4">
      <label for="aux_empleado">Correo electronico</label>
      <input type="text" class="form-control" id="emailempleado" name="emailempleado" placeholder="Email">
    </div>
    <div class="form-group col-md-4">
    <label for="empleadoRol">Seleccione un Rol</label>
     <select name="rolEmpleado" id="rolEmpleado" class="form-control">
      <option value="bodega">Bodega</option>
      <option value="contador">Contador</option>
      <option value="vendedor">Vendedor</option>
      <option value="Contratista">Contratista</option>
      <option selected>...</option>
     </select>
    </div>
  </div>
  <input type="hidden" value="11" id="registroEmpleadoH" name="registroEmpleadoH">

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

  <input type="submit" class="btn btn-primary" value="Registrar Empleado"></input>
</form>
</div>
<?php include('modal/AgregarEstudios.php');  ?>
<?php include('modal/AgregarExamen.php');  ?>
<?php include('modal/AgregarPension.php');  ?>
<?php include('modal/AgregarEps.php');  ?>
