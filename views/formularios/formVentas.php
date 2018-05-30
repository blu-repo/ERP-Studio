<?php require_once('../controlador/ventasController.php'); ?>
<?php $controllerVenta = new ventasController(); ?>
<?php $ventaID = $controllerVenta->getUltimaVentaController(); ?>
<?php $modoPago = $controllerVenta->getModoPagoController(); ?>


<div class="container" id="regVentaEmpleado">
  <div class="form-group row">
    <?php
    if($ventaID!=null && is_numeric($ventaID)){
      $ventaID = (int)$ventaID + 1;
      echo "<h4> Es la venta # " . $ventaID . "</h4>";
    }else if(empty($ventaID) || $ventaID=='nohayventas' || strcasecmp($ventaID,'nohayventas')==0){
      echo "<h4> No hay ventas registradas </h4>"; 
    } 
    ?> 
  </div>

<form id="formVentaEmpleado">
  <input type="hidden" id="idEmpleadoVenta" name="idEmpleadoVenta" value="<?php echo $_SESSION['id']; ?>">
  
  <div class="form-group row">

    <div class="form-group col-md-6">
      <label for="nombre1_empleado">Referencia de producto</label>
      <input type="text" class="form-control" id="referenciaProductoCompra" name="referenciaProductoCompra" placeholder="Refencia producto">
    </div>
   
    <div class="form-group col-md-6">
      <label for="documentoEmp">Documento</label>
      <input id="documentoEmpleadoVenta" name="documentoEmpleadoVenta" placeholder="Documento del empleado" class="form-control" />
    </div>  

  </div>

    <div class="form-group row">
         
      <div class="form-group col-md-4">
        <label for="apellidosEmpleado">Fecha</label>
        <input type="text" class="form-control" id="fechaActual" name="fechaActual" value="<?php echo date("Y-m-d"); ?>" placeholder="Fecha Actual">
      </div>
      
      <div class="form-group col-md-4">
        <label for="documento">Modo de pago</label>
        <select name="modopago" id="modopago" class="form-control">
          <?php while($row = mysqli_fetch_row($modoPago)){  ?>
          <option value="<?php echo $row[0]; ?>"> <?php echo $row[1];  ?> </option>
          <?php } ?>
          <option selected value="...">...</option>
        </select>
      </div>

    </div>

  <input type="submit" id="ventaCliente" class="btn btn-primary" value="Registrar Venta"/>
</form>
</div>