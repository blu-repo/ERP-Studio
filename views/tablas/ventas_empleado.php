



<!-- Tabla de ventas -->
<?php require_once('../controlador/ventasController.php'); ?>
<?php $controller = new ventasController(); ?>
<?php $ventas = $controller->getVentasEmpleadoController($_SESSION['id']); ?>
<?php ?>

<div class="table-responsive container" id="tablaVentasEmpleado">
<table class="table table-hover ">
  <thead>
    <tr>
      <th scope="col">Identificador</th>
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
        <button type="button"
        class="btn btn-info">Editar</button>
        <button type="button" class="btn btn-danger">Eliminar</button>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
