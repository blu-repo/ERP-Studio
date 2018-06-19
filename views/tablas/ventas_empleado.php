



<!-- Tabla de ventas -->
<?php require_once('../controlador/ventasController.php'); ?>
<?php $controller = new ventasController(); ?>
<?php setlocale(LC_MONETARY,"en_US"); ?>

<?php $ventas = $controller->getVentasEmpleadoController($_SESSION['id']); ?>
<?php if(empty($ventas) || $ventas==null){  ?>
<?php  echo "<h3 class='section-heading'>No se encontraron Resultados</h3> <br> <h4 class='section-heading'></h4> <br>"; ?>
<?php  }else { ?>
<h4>Mis Ventas</h4>
<div class="table-responsive container" id="tablaVentasEmpleado">
  <table class="table table-hover ">
    <thead>
      <tr>
        <th scope="col">Venta Nro</th>
        <th scope="col">Total</th>
        <th scope="col">Fecha registro</th>
        <th scope="col">Cliente</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($ventas as $key => $value){  ?>
      <tr>
        <td scope="row"> <?php echo $value["ID"]; ?> </td>
        <td><?php echo number_format($value["total"]); ?></td>
        <td><?php echo $value["fecha"]; ?></td>
        <td><?php echo $value["nombre"]; ?></td>
        <td><button class="btn btn-info">Reportar!</button></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<?php  } ?>
