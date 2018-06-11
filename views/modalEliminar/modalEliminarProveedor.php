


<!-- Modal para eliminar un proveedor de la BD -->
<div class="modal fade" id="eliminarProveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formEliminarProveedor">
      <input type="hidden" id="idEliminaProveedor">
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="c-md-6">
              <p>Estas seguro que deseas eliminar el proveedor?</p>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-primary" value="Eliminar"></input>
      </div>
      </form> 
    </div>
  </div>
</div>