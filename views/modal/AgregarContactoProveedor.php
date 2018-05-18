



<!-- Modal para agregar contactod del proveedor de la empresa -->


<div class="modal fade" id="agregar_proveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Contacto con la Empresa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div id="ajax_proveedor"></div>
      </div>
      <div class="modal-body">
        <div class="form-group col-md-12"> 
            <label for="nombre1">Nombre Proveedor</label>
            <input type="text" class="form-control" id="nombreproveedorM" name="nombreproveedorM" placeholder="Nombre Empleado">
          </div>
          <div class="form-group col-md-6">
            <label for="nombre2">documento</label>
            <input type="text" class="form-control" id="documentoProveedor" name="documentoProveedor" placeholder="Documento del Proveedor">
          </div>
          <div class="form-group col-md-6">
            <label for="apellidos">Direccion</label>
            <input type="text" class="form-control" id="direccionEmpleadoProveedor" name="direccionEmpleadoProveedor" placeholder="Direccion Empleado Proveedor">
          </div>
          <div class="form-group col-md-6">
            <label for="apellidos">Telefono</label>
            <input type="text" class="form-control" id="telefonoEmpleadoProveedor" name="telefonoEmpleadoProveedor" placeholder="Telefono Empleado Proveedor">
          </div>
          <div class="form-group col-md-6">
            <label for="apellidos">Email</label>
            <input type="text" class="form-control" id="emailEmpleadoProveedor" name="emailEmpleadoProveedor" placeholder="Email Empleado Proveedor">
          </div>
          <div class="form-group col-md-6">
            <label for="apellidos"></label>
            <input type="hidden" class="form-control" id="numeroEmpleadoProveedor" name="numeroEmpleadoProveedor" value="1" placeholder="Fecha registro">
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Descartar</button>
        <button type="button" class="btn btn-primary" value="Agregar">Guardar!</button>
      </div>
      
    </div>
  </div>
</div>
