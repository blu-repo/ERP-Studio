<?php require_once('../controlador/ventasController.php'); ?>
<?php $controllerVenta = new ventasController(); ?>
<?php $ventaID = $controllerVenta->getUltimaVentaController(); ?>
<?php $modoPago = $controllerVenta->getModoPagoController(); ?>


<div class="container" id="regVentaEmpleado">
<form id="formVentaEmpleado">
  <input type="hidden" id="idEmpleadogeneral" name="idEmpleadogeneral" value="">
  <div class="form-group row">
      <?php
      if(is_numeric($ventaID)){
        echo "Es la venta # " . $ventaID + 1;
      }else if(empty($ventaID) || $ventaID=='nohayventas' || strcasecmp($ventaID,'nohayventas')==0){
        echo "<h4> No hay ventas registradas </h4>"; 
      } 
      ?> 
  </div>
  <div class="form-group row">

    <div class="form-group col-md-6">
      <label for="nombre1_empleado">Referencia de producto</label>
      <input type="text" class="form-control" id="referenciaProductoCompra" name="referenciaProductoCompra" placeholder="Refencia producto">
    </div>
   
    <div class="form-group col-md-6">
      <label for="documentoEmp">Documento</label>
      <input id="documentoEmpleado" name="documentoEmpleadoVenta" placeholder="Documento del empleado" class="form-control" />
    </div>  
  </div>

    <div class="form-group row">
         
      <div class="form-group col-md-4">
        <label for="apellidosEmpleado">Fecha</label>
        <input type="text" class="form-control" id="fechaActual" name="fechaActual" value="<?php echo date("Y-m-d"); ?>" placeholder="Fecha Actual">
      </div>
      
      <div class="form-group col-md-4">
        <label for="documento">Modo de pago</label>
        <select name="modopago" id="" class="form-control">
          <?php while($row = mysqli_fetch_row($modoPago)){  ?>
          <option value="<?php echo $row[0]; ?>"> <?php echo $row[1];  ?> </option>
          <?php } ?>
          <option selected value="...">...</option>
        </select>
      </div>

      
    </div>

  <!-- <div class="form-group row">
    <div class="form-group col-md-4">
      <label for="nacimientoEmpleado">Fecha de nacimiento</label>
      <input type="date" class="form-control" id="nacimientoEmpleadoEditar" name="nacimientoEmpleadoEditar"  placeholder="Fecha de nacimiento">
    </div>
    <div class="form-group col-md-4">
      <label for="nacionalidad">Nacionalidad</label>
      <input id="nacionalidadEmpleadoEdicion" name="nacionalidadEmpleadoEdicion"  class="form-control" disabled/>
    </div>
    <div class="form-group col-md-4">
      <label for="direccionEmpleado">Direccion</label>
      <input type="text" id="direccionEmpleadoEditar" name="direccionEmpleadoEditar" class="form-control" placeholder="Direccion">
    </div>
    <div class="form-group col-md-4">
      <label for="tipocontrato">Lugar de nacimiento</label>
      <input type="text" id="lugarnacimientoEmpleadoEditar" name="lugarnacimientoEmpleadoEditar" class="form-control"  placeholder="Lugar de nacimiento">
    </div>
  </div> -->

  <!-- <div class="form-group row">
    <div class="form-group col-md-4">
      <label for="expedicion_doc_empleado">Expedicion de documento</label>
      <input type="text" class="form-control" id="expedocEmpleado" name="expedocEmpleado"  placeholder="Expedicion de documento" disabled>
    </div>
    <div class="form-group col-md-4">
      <label for="aux_empleado">Correo electronico</label>
      <input type="text" class="form-control" id="emailempleadoEditar" name="emailempleadoEditar"   placeholder="Email">
    </div>
    <div class="form-group col-md-4">
    <label for="empleadoRol">Rol del Empleado</label>
     <input name="rolEmpleado" id="rolEmpleado" class="form-control"  disabled/>
    </div>
  </div> -->

  <input type="submit" class="btn btn-primary" value="Registrar Venta"></input>
</form>
</div>