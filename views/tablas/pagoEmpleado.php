


<!-- Tabla sobre empleados de la empresa -->

<?php require_once('../controlador/empleadoController.php'); ?>
<?php $controller = new empleadoController(); ?>
<?php $empleados = $controller->getEmpleados(); ?>

<h3 class="h3_home wow">Listado de Empleados</h3><br>
<div class="table-responsive container">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nombres</th>
      <th scope="col">Documento</th>
      <th scope="col">Correo</th>
      <th scope="col">Fecha registro</th>
      <th scope="col">Acciones</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = mysqli_fetch_row($empleados)){ ?>
    <tr>
      <td class="row"><?php echo $row[1]; ?></td>
      <td class="row"><?php echo $row[6]; ?></td>
      <td class="row"><?php echo $row[10]; ?></td>
      <td class="row"><?php echo $row[14]; ?></td>
      <td class="row">
      <button 
      data-nombre="<?php echo $row[1]." ".$row[2]; ?>"
      data-doc="<?php echo $row[6]; ?>"
      data-email="<?php echo $row[10]; ?>"
      data-fecha="<?php echo $row[14]; ?>"
      data-nacion="<?php echo $row[8]; ?>"
      
      data-toggle="modal" data-target="#modalReportePago" class="btn btn-primary">Reportar pago!</button>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
<script>
   
</script>











