

<?php $ID = $_GET['IDproveedorEditar']; ?>
<?php require_once('../controlador/proveedorController.php'); ?>
<?php $controller = new proveedorController(); ?>
<?php $info = $controller->getProveedorController($ID); ?>
<?php $contacto = $controller->getContactoProveedorController($ID); ?>

<?php $con;
 $imp; ?>
<?php if(!is_array($contacto)){
    if(empty($contacto) || $contacto==='null'){
      $imp ="Agregar";
      $con="agregar";
    }
  }
  else{
    $imp="Editar";
    $con="editar";
  }
?>

<?php if(is_array($info)){  ?>
  <?php if(empty($info)){   ?>
    <div class="container col-xs-12 text-center">
      <div class="form-group row">
        <h4>No se encontraron resultados</h4>
      </div>
    </div>
  <?php }else{?>
  
  <div class="container">
  <h4>Editar Proveedor</h4>
    <form id="formEditarEmpresa">
      <input type="hidden" value="<?php echo $ID; ?>" name="idproveedorEditar" id="idproveedorEditar">
      <div class="form-group row">
        <div class="form-group col-md-4">
          <label for="nombreEmpresa">Nombre de la Empresa</label>
          <input type="text" class="form-control" value="<?php echo $info[0]['empresa']; ?>"  name="nombreEmpresaProveedorEditar" id="nombreEmpresaProveedorEditar"  placeholder="Nombre Empresa">
        </div>
        <div class="form-group col-md-4">
          <label for="nit">NIT</label>
          <input type="text" class="form-control" value="<?php echo $info[0]['nit']; ?>" id="nitProveedorEditar" name="nitProveedorEditar" placeholder="NIT">
        </div>
        <div class="form-group col-md-4">
          <label for="telefonoproveedor">Telefono</label>
          <input type="text" class="form-control" value="<?php echo $info[0]['telefono']; ?>" id="telefonoproveedorEditar" name="telefonoproveedorEditar"placeholder="Telefono proveedor">
        </div>
      </div>

      <div class="form-group row">
        <div class="form-group col-md-4">
            <label for="emailempresa">Email de la empresa</label>
            <input type="email" class="form-control" value="<?php echo $info[0]['correoempresa']; ?>" id="emailempresaEditar" name="emailempresaEditar" placeholder="Email de la Empresa">
        </div>
        <div class="form-group col-md-4">
            <label for="direccionProveedor">Direccion Empresa</label>
            <input type="text" class="form-control" value="<?php echo $info[0]['direccion']; ?>" id="direccionEmpresaEditar" name="direccionEmpresaEditar" placeholder="Direccion Empresa">
        </div>
      </div>
      
      <div class="form-group row">
        <div class="form-group col-md-4">
          <label for="pensionEmpleado"><?php echo $imp; ?> Contacto de proveedor</label><br>
          <a href="" data-toggle="modal" data-target="#editarContacto"  class="btn  btn-lg mybutton_cyano wow fadeIn"><span class="network-name"><?php echo $imp; ?> Contacto!</span></a>
        </div>
      </div>
      
      <input type="submit" class="btn btn-primary" value="Editar proveedor!"/>
    </form>
      <?php require_once('modalEditar/modalContactoProveedor.php'); ?>  
  </div>
<?php  }  ?>
<?php }else{ ?>
  <div class="container col-xs-12 text-center">
    <div class="form-group row">
      <h4>No se encontraron resultados</h4>
    </div>
  </div>
<?php } ?>