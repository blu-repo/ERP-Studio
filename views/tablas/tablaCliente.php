


<!-- Tabla sobre los clientes -->
<?php require_once('../controlador/clienteController.php'); ?>
<?php $cliente = new clienteController(); ?>
<?php $clientes = $cliente->getClientesController(); ?>
<?php if($clientes!=null){ ?>

<div class="table-responsive-md container" id="tablaCliente">
<table class="table table-hover ">
  <thead>
    <tr>
      <th scope="col">Nombres y Apellidos</th>
      <th scope="col">Documento</th>
      <th scope="col">Direccion</th>
      <th scope="col">Telefono</th>
      <th scope="col">E-mail</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = mysqli_fetch_row($clientes)) { ?>
    <tr>
      <td><?php echo $row[1] . ' ' . $row[2]; ?></td>
      <td><?php echo $row[3]; ?></td>
      <td><?php echo $row[4]; ?></td>
      <td><?php echo $row[5]; ?></td>
      <td><?php echo $row[6]; ?></td>
      <td>
        <button type="button" data-toggle="modal" id="success" data-target="#editarCliente" 
          data-id="<?php echo $row[0]; ?>" 
          data-pnombre="<?php echo $row[1]; ?>"
          data-apellidos="<?php echo $row[2]; ?>"
          data-documento="<?php echo $row[3]; ?>"
          data-direccion="<?php echo $row[4]; ?>"
          data-telefono="<?php echo $row[5]; ?>"
          data-email="<?php echo $row[6]; ?>"
          class="btn btn-info">Editar</button>
        <button type="button" data-toggle="modal" data-target="#eliminarCliente" data-id="<?php echo $row[0]; ?>" class="btn btn-danger">Eliminar</button>
      </td>
    </tr>
    <?php } ?>
    
  </tbody>
</table>
</div>
<?php }
else
{
  ?>
    <div class="">
      <!-- No se encontraron Clientes registrados -->
    </div>
  <?php
}