






<!-- Modal que permite editar un empleado Solo sus datos Personales -->

 <div class="modal fade" id="editarEmpleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Editar Empleado</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button> 
       </div>
       <div id="ajax_editarEmpleado"></div>
       <div id="ajax_editarEmpleadoError"></div>
      <form  id="formEditarEmpleado">
      <input type="hidden" id="idEmpleado">
       <div class="modal-body">
        <div class="container-fluid">

          <div class="row">
            <div class="form-group col-md-12">
              <label for="nombre1">Primer Nombre</label>
              <input type="text" class="form-control" id="primerNombreEmpleadoED" name="primerNombreEmpleadoED" placeholder="Nombres">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-6">
              <label for="nombre2">Apellidos</label>
              <input type="text" class="form-control" id="apellidosEmpleadoED" name="apellidosEmpleadoED" placeholder="Apellidos">
            </div>
            <div class="form-group col-md-6">
              <label for="apellidos">Documento</label>
              <input type="text" class="form-control" id="documentoEmpleaadoED" name="documentoEmpleaadoED" placeholder="Documento">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-6">
              <label for="apellidos">Direccion</label>
              <input type="text" class="form-control" id="direccionEmpleadoED" name="direccionEmpleadoED" placeholder="Direccion">
            </div>
            <div class="form-group col-md-6">
              <label for="Correo">Correo</label>
              <input type="email" class="form-control" id="correoEmpleadoED" name="correoEmpleadoED" placeholder="Correo Electronico">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-6">
              <label for="Correo">Fecha Registro</label>
              <input type="text" class="form-control" id="fechaRegistoEmpleadoED" name="fechaRegistoEmpleadoED" placeholder="Fecha Registro" disabled>
            </div>
          </div> 

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Descartar</button>
        <input type="submit" class="btn btn-primary" value="Editar Empleado"></input>
      </div>
    </form>
    </div>
  </div>
</div>


