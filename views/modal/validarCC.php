

<!-- Modal para validar la CC de un cliente -->
<div class="modal fade" id="modal_validarCC" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="exampleModalLabel">Validar Documento de cliente</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div id="ajax_errorValidar"></div>
			<div id="ajax_successValidar"></div>
			<div class="modal-body">
				<form id="formValidar">
					<div class="form-group">
					  <label for="exampleInputEmail1">Cedula del cliente</label>
					  <input type="text" class="form-control" id="clienteCC" name="clienteCC" aria-describedby="emailHelp" placeholder="Documento Cliente">
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			  <input type="submit" class="btn  btn-lg mybutton_cyano wow fadeIn" value="Validar" ></input>
			</div>
		  </div>
		</form>			
		</div>
	  </div>
