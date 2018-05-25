



<!-- 
	Modal de login para cualquier usuario que quiera ingresar en el sistema 
-->

<div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="exampleModalLabel">Inicio de Sesion</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div class="modal-body">
				<form id="loginForm">
					<div class="form-group">
					  <label for="exampleInputEmail1">Correo electronico o usuario</label>
					  <input type="email" class="form-control" id="InputEmail" name="InputEmail"aria-describedby="emailHelp" placeholder="Email o usuario">
					</div>
					<div class="form-group">
					  <label for="exampleInputPassword1">Contraseña</label>
					  <input type="password" class="form-control" id="InputPassword" name="InputPassword" placeholder="Contraseña">
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			  <input type="submit" class="btn  btn-lg mybutton_cyano wow fadeIn" value="Iniciar Sesion" ></input>
			</div>
		  </div>
		</form>			
		</div>
	  </div>
	

<!-- Modal de recuperar contraseña - Form recuperar contraseña -->


<div class="modal fade" id="recuperarContraseña" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="exampleModalLabel">Recuperar Contraseña</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div class="modal-body">
				<form id="recuperarContrasenaForm">
					<div class="form-group">
					  <label for="exampleInputEmail1">Correo electronico o usuario</label>
					  <input type="email" class="form-control" id="recuperarContraseña" aria-describedby="emailHelp" placeholder="Email o usuario">
					  <small id="emailHelp" class="form-text text-muted">Ingresa tu correo electronico</small>
					</div>
				</form>			
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			  <button type="button" class="btn  btn-lg mybutton_cyano wow fadeIn">Enviar</button>
			</div>
		  </div>
		</div>
	  </div>

