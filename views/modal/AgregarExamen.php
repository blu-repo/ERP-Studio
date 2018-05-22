



<div class="modal fade" id="agregar_examen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Examen de Ingreso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="ajax_examenEmpleado"></div>
      <div id="ajax_errorExamenEmpleado"></div>
      <form id="formExamenEmpleado">
      <div class="modal-body">
          <input type="hidden" id="idEmpleadoExamenes" name="idEmpleadoExamenes" value="<?php echo $_POST['idEmpleadoEditar']; ?>">
          <div class="form-group col-md-12">
            <label for="nombre1">Entidad Medica</label>
            <input type="text" class="form-control" id="entidadmedica" name="entidadmedica" placeholder="Nombre de la entidad medica">
          </div>

          <div class="form-group col-md-6">
            <label for="nombre2">Dictamen</label>
            <input type="text" class="form-control" id="dictamen" name="dictamen" placeholder="Dictamen">
          </div>

          <div class="form-group col-md-6">
            <label for="apellidos">Fecha Realizacion </label>
            <input type="date" class="form-control" id="fecharealizacionExamen" placeholder="Fecha Realizacion">
          </div>

          <div class="form-group col-md-6">
            <label for="apellidos">Observacion</label>
            <input type="text" class="form-control"  id="observacionExamen"  placeholder="Observacion">
          </div>

          <div class="form-group col-md-6">
            <label for="apellidos">Telefono</label>
            <input type="text" class="form-control"  id="telefonoEntidad"  placeholder="Telefono Entidad">
          </div>

          <div class="form-group col-md-6">
            <label for="apellidos">Direccion</label>
            <input type="text" class="form-control"  id="direccionEntidad" placeholder="Direccion Entidad">
          </div>
          <div class="form-group col-md-8">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Descartar</button>
            <input type="submit" class="btn btn-primary" value="Guardar"></input>
          </div>
      </div>
        <div class="modal-footer">
        </div>
      </form>
    </div>
  </div>
</div>


