

<!-- Modal que permite agregar un material nuevo -->

<div class="modal fade" id="agregar_material" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo Material</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button><br>
          <div id="ajax_material"></div>
        </div>
        <div class="modal-body">
        <form id="formTipoMaterial">
          <div class="form-group col-md-12"> 
              <label for="nombre1">Nombre</label>
              <input type="text" class="form-control" id="nombrematerialM" name="nombrematerialM" placeholder="Nombre material">
            </div>
            <div class="form-group col-md-6">
              <label for="nombre2">Descripcion</label>
              <input type="text" class="form-control" id="descripcionmaterialM" name="descripcionmaterialM" placeholder="Descripcion material">
            </div>
            <div class="form-group col-md-6">
              <label for="apellidos">Fecha</label>
              <input type="text" class="form-control" id="fechaarticulo" name="fechaarticulo" value="<?php echo date('Y-m-d'); ?>" placeholder="Fecha registro">
            </div>
              <label for="apellidos"></label>
              <input type="hidden" class="form-control" id="aggMaterial" name="aggMaterial" value="1">
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Descartar</button>
          <input type="submit" class="btn btn-primary" value="Agregar"></input>
        </div>
       </form>
      </div>
    </div>
  </div>