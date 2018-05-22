




<div class="modal fade" id="agregar_estudios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Estudios de Empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="ajax_editarEmpleadoEstudios"></div>
      <form id="formEstudiosEmpleado">
      <div class="modal-body">
          <input type="hidden" name="idEmpleadoeEstudios" id="idEmpleadoeEstudios" value="<?php echo $_POST['idEmpleadoEditar']; ?>">
        <div class="form-group col-md-12">
          <label for="nombre1">Instituto</label>
          <input type="text" class="form-control" id="Instituto" name="Instituto" placeholder="Instituto">
        </div>
        <div class="form-group col-md-6">
          <label for="nombre2">Titulo</label>
          <input type="text" class="form-control" id="Titulo" name="Titulo" placeholder="Titulo">
        </div>
        <div class="form-group col-md-6">
          <label for="apellidos">Año de salida</label>
          <input type="date" class="form-control" id="aniosalida" name="aniosalida" placeholder="Año de Salida">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Descartar</button>
        <input type="submit" class="btn btn-primary" value="Guardar"></input>
      </div>
    </form>
    </div>
  </div>
</div>
