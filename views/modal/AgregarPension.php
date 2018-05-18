



<div class="modal fade" id="agregar_pension" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar cotizacion de pension</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <div class="form-group col-md-12">
            <label for="nombre1">Nombre</label>
            <input type="text" class="form-control" id="nombrepension" placeholder="Nombre de Empresa de Pension">
          </div>

          <div class="form-group col-md-6">
            <label for="nombre2">Direccion</label>
            <input type="text" class="form-control" id="direccionpension" placeholder="Direccion">
          </div>

          <div class="form-group col-md-6">
            <label for="apellidos">Estado</label>
            <input type="text" class="form-control" id="estadopension" placeholder="Estado Pension">
          </div>

          <div class="form-group col-md-6">
            <label for="apellidos">Fecha Registro</label>
            <input type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="fecharegistroPension" readonly="readonly" placeholder="Fecha de Registro">
          </div>
          <div class="form-group col-md-8">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Descartar</button>
            <button type="button" class="btn btn-primary">Guardad</button>
          </div>

        </div>

        <div class="modal-footer">
        </div>

    </div>
  </div>
</div>
