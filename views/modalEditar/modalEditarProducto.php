


<!-- Modal que permite editar un producto -->

 <div class="modal fade" id="editarProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button> 
       </div>
       <div id="ajax_editarProducto"></div>
       <div id="ajax_editarProducto"></div>
      <form  id="formEditarProducto">
      <input type="hidden" id="idProducto">
       <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="form-group col-md-12">
              <label for="nombre1">Nombre producto</label>
              <input type="text" class="form-control" id="nombreProductoEditar" name="nombreProductoEditar" placeholder="Nombre Producto">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="nombre2">Referencia</label>
              <input type="text" class="form-control" id="referenciaProductoEditar" name="referenciaProductoEditar" placeholder="Referencia Producto">
            </div>
            <div class="form-group col-md-6">
              <label for="apellidos">Precio</label>
              <input type="text" class="form-control" id="precioProductoEditar" name="precioProductoEditar" placeholder="Precio Producto">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="apellidos">Talla</label>
              <input type="text" class="form-control" id="tallaProductoEditar" name="tallaProductoEditar" placeholder="Telefono">
            </div>
          </div>  
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Descartar</button>
        <input type="submit" class="btn btn-primary" value="Editar Producto"></input>
      </div>
    </form>
    </div>
  </div>
</div>


