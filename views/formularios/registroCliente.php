

<?php require_once('../controlador/tablasController.php'); ?>
<?php $tablas = new tablasController(); ?>



<!-- Formulario para el registro del cliente para la botique -->
<?php $tipoCliente  = $tablas->getTiposCliente();  ?>
<div class="container">
<h4>Registro de Clientes</h4>
<form id="formCliente">

  <div class="form-group row">
    <div class="form-group col-md-4">
      <label for="nombre1">Primer nombre</label>
      <input type="text" class="form-control" id="primernombreCliente" name="primernombreCliente" placeholder="Primer nombre" name="primernombreCliente">
    </div>
    <div class="form-group col-md-4">
      <label for="nombre2">Segundo nombre</label>
      <input type="text" class="form-control" id="segundonombreCliente" name="segundonombreCliente" placeholder="Segundo nombre">
    </div>
    <div class="form-group col-md-4">
      <label for="apellidos">Apellidos</label>
      <input type="text" class="form-control" id="apellidosCliente" name="apellidosCliente" placeholder="Apellidos">
    </div>
  </div>

   <div class="form-group row">
      <div class="form-group col-md-4">
      <label for="tipoCliente">Tipo de Cliente</label>
      <select name="tipoCliente" id="tipoCliente" class="form-control">
      <?php if($tipoCliente!=0){ ?>
        <?php foreach ($tipoCliente as $ID => $nombre) { ?>
          <option value="<?php echo $ID; ?>"><?php echo $nombre; ?></option>   
        <?php } ?>
      <?php } ?>
        <option selected>...</option>
      </select>
      </div>
      <div class="form-group col-md-4">
        <label for="telefono">Telefono</label>
        <input type="text" class="form-control" id="telefonoCliente" name="telefonoCliente" placeholder="Telefono">
      </div>
      <div class="form-group col-md-4">
        <label for="documento">Documento</label>
        <input type="text" class="form-control" id="documentoCliente" name="documentoCliente" placeholder="Documento">
      </div>
    </div> 

  <div class="form-group row">
    <div class="form-group col-md-5">
      <label for="direccion">Direccion</label>
      <input type="text" class="form-control" id="direccionCliente" name="direccionCliente" placeholder="Direccion Cliente">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Email</label>
      <input type="email" id="emailCliente" name="emailCliente" class="form-control" placeholder="Email">
    </div>
  </div>

  <input type="hidden" value="2" name="tipoClienteRegistro"> 
  <input type="submit" id="cliente1" class="btn btn-primary" value="Registrar Cliente"></input>
</form>
</div>