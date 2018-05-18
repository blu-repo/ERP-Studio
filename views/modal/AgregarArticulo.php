

<!-- Modal que permite agregar una categoria nueva -->

<div class="modal fade" id="agregar_articulo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo Articulo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <br>
        <div id="ajax_articulo"></div>
      </div>
      <div class="modal-body">
      <form id="formTipoArticulo">
        <div class="form-group col-md-12"> 
            <label for="nombre1">Nombre</label>
            <input type="text" class="form-control" id="nombrearticuloM" name="nombrearticuloM" placeholder="Nombre articulo">
          </div>
          <div class="form-group col-md-6">
            <label for="nombre2">Descripcion</label>
            <input type="text" class="form-control" id="descripcionarticuloM" name="descripcionarticuloM" placeholder="Descripcion articulo">
          </div>
          <div class="form-group col-md-6">
            <label for="apellidos">Fecha</label>
            <input type="text" class="form-control"  value="<?php echo date('Y-m-d'); ?>" placeholder="Fecha registro">
          </div>
          <div class="form-group col-md-6">
            <label for="apellidos"></label>
            <input type="hidden" class="form-control" id="aggArticulo" name="aggArticulo" value="2" placeholder="Fecha registro">
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Descartar</button>
        <input type="submit" class="btn btn-primary" value="Agregar"></input>
      </div>
      </form>
    </div>
  </div>
</div>