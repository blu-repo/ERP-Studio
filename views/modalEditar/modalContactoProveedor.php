<?php 

  $id="";
  $nombre="";
  $documento ="";
  $direccion="";
  $telefono="";
  $correo="";
  $proveedor= $ID;
  $fecha_registro=""; 


  if(strcmp($con,'agregar')==0){

    $id=""; 
    $nombre="";
    $documento ="";
    $direccion="";
    $telefono="";
    $correo="";
    $proveedor= $ID;
    $fecha_registro="";

  }elseif(strcmp($con,'editar')==0){

    $id=$contacto[0]['id'];
    $nombre=$contacto[0]['nombre'];
    $documento =$contacto[0]['documento'];
    $direccion=$contacto[0]['direccion'];
    $telefono=$contacto[0]['telefono'];
    $correo=$contacto[0]['correo'];
    $proveedor= $ID;
    $fecha_registro=$contacto[0]['fecharegistro'];

  }  
?>

<!-- Modal que permite editar un contacto -->

 <div class="modal fade" id="editarContacto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Editar Contacto</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button> 
       </div>
       <div id="ajax_editarContacto"></div>
       <div id="ajax_editarContactoError"></div>
      <form  id="editarContactoProveedor">
      <input type="hidden" id="IDproveedorContacto" name="IDproveedorContacto" value="<?php echo $ID; ?>">
      <input type="hidden" id="accionContacto" name="accionContacto" value="<?php echo $con; ?>">
       <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="form-group col-md-12">
              <label for="nombre1">Nombre</label>
              <input type="text" class="form-control" value="<?php echo $nombre; ?>" id="nombreContacto" name="nombreContacto" placeholder="Nombre">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="nombre2">Documento</label>
              <input type="text" class="form-control" value="<?php echo $documento; ?>" id="documentoContacto" name="documentoContacto" placeholder="Documento">
            </div>
            <div class="form-group col-md-6">
              <label for="apellidos">Direccion</label>
              <input type="text" class="form-control" value="<?php echo $direccion; ?>" id="direccionContacto" name="direccionContacto" placeholder="Direccion">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="apellidos">Telefono</label>
              <input type="text" class="form-control" value="<?php echo $telefono; ?>" id="telefonoContacto" name="telefonoContacto" placeholder="Telefono">
            </div>
            <div class="form-group col-md-6">
              <label for="apellidos">Email</label>
              <input type="email" class="form-control" value="<?php echo $correo; ?>" id="emailContacto" name="emailContacto" placeholder="Correo">
            </div>
          </div>  
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Descartar</button>
        <input type="submit" class="btn btn-primary" value="Editar Contacto"/>
      </div>
    </form>
    </div>
  </div>
</div>


