

<!-- Tabla de proveedores -->
<?php require_once('../controlador/proveedorController.php'); ?>
<?php $productos = new proveedorController(); ?>
<?php $proveedores = $productos->getProveedoresController(); ?>


  <?php if(empty($proveedores)){  ?>
    <div class="container col-xs-12 text-center">
      <div class="form-group row">
        <h4>No se encontraron resultados</h4>
      </div>
    </div>
  <?php }else{ ?>

<div class="table-responsive container" id="tablaProveedores">
<table class="table table-hover ">
  <thead>
    <tr>
      <th scope="col">Empresa</th>
      <th scope="col">Direccion</th>
      <th scope="col">Telefono</th>
      <th scope="col">Email</th>
      <th scope="col">NIT</th>
      <th scope="col">Fecha registro</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  <?php while($row = mysqli_fetch_row($proveedores)) { ?>
  <?php #$categoria = $productos->getCategoriaController($row[0]); ?>
    <tr>
      <td scope="row"> <?php echo $row[1]; ?> </td>
      <td><?php echo $row[2]; ?></td>
      <td><?php echo $row[3]; ?></td>
      <td><?php echo $row[4]; ?></td>
      <td><?php echo $row[5]; ?></td>
      <td><?php echo $row[6]; ?></td>
      <td>
       <form action="editarPerfilProveedor.php" method="GET" >
          <input type="hidden" value="<?php echo $row[0];?>" id="IDproveedorEditar" name="IDproveedorEditar"/>
          <input type="submit" class="btn btn-info" value="Editar">
          <button type="button" class="btn btn-danger" data-id="<?php echo $row[0]; ?>" id="IDproveedorEliminar" name="IDproveedorEliminar" >Eliminar</button>
       </form>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
  <?php } ?>
