


<!-- Modal que permite editar un cliente -->

 <div class="modal fade" id="editarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button> 
       </div>
       <div id="ajax_editarCliente"></div>
       <div id="ajax_editarClienteError"></div>
      <form  id="formEditarCliente">
      <input type="hidden" id="idCliente">
       <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="form-group col-md-12">
              <label for="nombre1">Primer Nombre</label>
              <input type="text" class="form-control" id="primerNombreClienteED" name="primerNombreClienteED" placeholder="Primer Nombre">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="nombre2">Apellidos</label>
              <input type="text" class="form-control" id="apellidosClienteED" name="apellidosClienteED" placeholder="Apellidos">
            </div>
            <div class="form-group col-md-6">
              <label for="apellidos">Documento</label>
              <input type="text" class="form-control" id="documentoClienteED" name="documentoClienteED" placeholder="Documento">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="apellidos">Telefono</label>
              <input type="text" class="form-control" id="telefonoClienteED" name="telefonoClienteED" placeholder="Telefono">
            </div>
            <div class="form-group col-md-6">
              <label for="apellidos">Email</label>
              <input type="email" class="form-control" id="emailClienteED" name="emailClienteED" placeholder="Correo">
            </div>
          </div>  
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Descartar</button>
        <input type="submit" class="btn btn-primary" value="Editar Cliente"></input>
      </div>
    </form>
    </div>
  </div>
</div>


