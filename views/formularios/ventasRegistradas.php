


<?php  require_once("../controlador/ventasController.php");  ?>
<?php  $ventas = new ventasController();  ?>
<?php  $todasVentas = $ventas->getTodasVentas();  ?>
<h4 class="section-heading">Ventas registradas!!</h4>

<?php if(empty($todasVentas) || $todasVentas==="null"): ?>
  <h3 class='section-heading'>No se encontraron Resultados</h3> <br> <h4 class='section-heading'>Contacta con el Administrador</h4> <br>
<?php else: ?>
  <div class="table-responsive container" id="tablaVentasEmpleado">
    <table class="table table-hover ">
      <thead>
        <tr>
          <th scope="col">Venta Nro</th>
          <th scope="col">Total</th>
          <th scope="col">Fecha registro</th>
          <th scope="col">Cliente</th>
          <th scope="col">Pago</th>
          <th scope="col">Vendedor</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($todasVentas as $key => $value){  ?>
        <tr>
          <td scope="row"> <?php echo $value["id"]; ?> </td>
          <td><?php echo number_format($value["total"]); ?></td>
          <td><?php echo $value["fecha"]; ?></td>
          <td><?php echo $value["nombres"]; ?></td>
          <td><?php echo $value["modo"]; ?></td>
          <td><?php echo $value["nombreempleado"]; ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <div class="container">
    <form action="PDF/reporte_general.php" target="_blank" method="GET">
        <input type="hidden"/>
        <input type="submit"  value="Reporte Total de Ventas" target="_blank" class="btn btn-primary"/>
    </form>
  </div>
<?php endif; ?>

