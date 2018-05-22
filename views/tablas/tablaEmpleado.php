


<!-- Tabla sobre empleados de la empresa -->

<?php require_once('../controlador/empleadoController.php'); ?>
<?php $controller = new empleadoController(); ?>
<?php $empleados = $controller->getEmpleados(); ?>


<div class="table-responsive container" id="tablaEmpleados">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nombres</th>
      <th scope="col">Documento</th>
      <th scope="col">Estado</th>
      <th scope="col">Acciones</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = mysqli_fetch_row($empleados)){ ?>
    <tr>
      <td class="row"><?php echo $row[1]; ?></td>
      <td class="row"><?php echo $row[6]; ?></td>
      <td class="row">
      <!-- Falta programa editar Estado Empleado -->
       <?php if($row[15]==0){  ?>
        <div class="alert alert-info" role="alert" style="padding:8px;">
        <?php echo "Activo"; ?>
        </div>
       <?php } else{ ?>
        <div class="alert alert-warning" role="alert" style="padding:8px;">
         <?php echo "Desactivo"; ?>
        <?php } ?>
       </div>
      </td>
      <td class="row">
        <form id="formEditarEmpleadoHidden" action="./editarPerfilEmpleado.php" method="POST" >
          <input type="hidden" value="<?php echo $row[0]; ?>" id="idEmpleadoEditar" name="idEmpleadoEditar">
          <input type="submit" id="buttonAlerta" value="Editar" class="btn btn-info buttonE">
          <button type="button" class="btn btn-danger buttonD">Eliminar</button>
        </form>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
