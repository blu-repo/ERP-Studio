


<!-- Tabla de productos -->
<?php require_once('../controlador/productoController.php'); ?>
<?php $productos = new productoController(); ?>
<?php $proc = $productos->getProductosController(); ?>
<?php $categoria; ?>

<div class="table-responsive container" id="tablaProducto">
<table class="table table-hover ">
  <thead>
    <tr>
      <th scope="col">Nombres</th>
      <th scope="col">Referencia</th>
      <th scope="col">Color</th>
      <th scope="col">Fecha registro</th>
      <th scope="col">Categoria</th>
      <th scope="col">Precio</th>
      <th scope="col">Talla</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  <?php while($row = mysqli_fetch_row($proc)){  ?>
  <?php $categoria = $productos->getCategoriaController($row[0]); ?>
    <tr>
      <td scope="row"> <?php echo $row[1]; ?> </td>
      <td><?php echo $row[2]; ?></td>
      <td><?php echo $row[3];  ?></td>
      <td><?php echo $row[4]; ?></td>
      <td><?php echo $categoria[0]; ?></td>
      <td><?php echo $row[9]; ?></td>
      <td><?php echo $row[10]; ?> </td>
      <td>
        <button type="button"
        data-id="<?php echo $row[0]; ?>"
        data-nombre="<?php echo $row[1]; ?>"
        data-referencia="<?php echo $row[2]; ?>"
        data-precio="<?php echo $row[9]; ?>"
        data-talla="<?php echo $row[10]; ?>"
        data-toggle="modal"
        data-target="#editarProducto"
        class="btn btn-info">Editar</button>
        <button type="button" class="btn btn-danger">Cerrar</button>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
