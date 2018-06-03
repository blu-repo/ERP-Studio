



<!-- Tabla de ventas -->
<?php require_once('../controlador/ventasController.php'); ?>
<?php $controller = new ventasController(); ?>
<?php $ventas = $controller->getVentasEmpleadoController($_SESSION['id']); ?>
<?php if(empty($ventas) || $ventas==null){  ?>
<?php  echo "<h3 class='section-heading'>No se encontraron Resultados</h3> <br> <h4 class='section-heading'></h4> <br>"; ?>
<?php  }else { ?>
<div class="table-responsive container" id="tablaVentasEmpleado">
<table class="table table-hover ">
  <thead>
    <tr>
      <th scope="col">Venta Nro</th>
      <th scope="col">Precio</th>
      <th scope="col">Cliente</th>
      <th scope="col">Fecha registro</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  <?php while($row = mysqli_fetch_row($ventas)){  ?>
    <tr>
      <td scope="row"> <?php echo $row[0]; ?> </td>
      <td><?php echo $row[1]; ?></td>
      <td><?php echo $row[2];  ?></td>
      <td><?php echo $row[3]; ?></td>
      <td>
        <form action="PDF/reporte_venta.php" method="GET" target="_blank">
          <input type="hidden" value="<?php echo $row[0]; ?>" id="ventaID" name="ventaID"> 
          <input type="submit" class="btn btn-info" value="Reportar"></input>
        </form>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
<?php  } ?>
