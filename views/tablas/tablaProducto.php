


<!-- Tabla de productos -->
<?php require_once('../controlador/productoController.php'); ?>
<?php $productos = new productoController(); ?>
<?php $proc = $productos->getProductosController(); ?>
<?php $categoria; ?>


<?php if(empty($proc)){  ?>
  <div class="container col-xs-12 text-center">
    <div class="form-group row">
      <h4>No se encontraron resultados</h4>
    </div>
    </div>
<?php }else{  ?>

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
        <form action="editarPerfilProducto.php" id="formEditarProductoImagen" method="POST">
          <input type="hidden" value="<?php echo $row[0]; ?>" id="IDproductoImagen" name="IDproductoImagen">
          <input type="submit" value="Editar" class="btn btn-info">
          <button type="button" class="btn btn-danger">Eliminar</button>
        </form>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
<?php } ?>