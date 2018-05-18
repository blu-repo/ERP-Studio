


<!-- Tabla de productos -->
<?php require_once('../controlador/productoController.php'); ?>
<?php $productos = new productoController(); ?>
<?php $proc = $productos->getProductos(); ?>
<?php ?>

<div class="table-responsive" id="tablaProducto">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Codigo</th>
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
    <tr>
      <th scope="row">1</th>
      <td>Blue jean</td>
      <td>Pantalon</td>
      <td>Azul</td>
      <td>12/12/15</td>
      <td>Pantalon hombre</td>
      <td>10.000</td>
      <td>28 - 36</td>
      <td>
        <button type="button" class="btn btn-info">Editar</button>
        <button type="button" class="btn btn-danger">Eliminar</button>
      </td>
    </tr>
    <tr>
      
    </tr>
    <tr>
      
    </tr>
  </tbody>
</table>
</div>
