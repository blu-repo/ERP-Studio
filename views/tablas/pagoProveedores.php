


<!-- Tabla de proveedores -->
<?php require_once('../controlador/proveedorController.php'); ?>
<?php $productos = new proveedorController(); ?>
<?php $proveedores = $productos->getProveedoresController(); ?>


  <?php if(empty($proveedores) || $proveedores==null){  ?>
    <div class="container col-xs-12 text-center">
      <div class="form-group row">
        <h4>No se encontraron resultados</h4>
      </div>
    </div>
  <?php }else{ ?>
    <h3 class="h3_home wow">Listado de Proveedores</h3><br>
<div class="table-responsive container">
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
       <button class="btn btn-primary" 
       data-empresa="<?php echo $row[1]; ?>"
       data-direccion ="<?php echo $row[2]; ?>"
       data-telefono ="<?php echo $row[3]; ?>"
       data-email ="<?php echo $row[4]; ?>"
       data-fecha ="<?php echo $row[5]; ?>"
       data-toggle="modal" data-target="#modalReportePagoProveedor">
       Reportar Pago!</button>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
  <?php } ?>
