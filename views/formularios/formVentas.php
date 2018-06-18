<?php require_once('../controlador/ventasController.php'); ?>
<?php require_once('../controlador/productoController.php'); ?>
<?php $controllerVenta = new ventasController(); ?>
<?php $controllerProducto = new productoController(); ?>
<?php $ventaID = $controllerVenta->getUltimaVentaController(); ?>
<?php $modoPago = $controllerVenta->getModoPagoController(); ?>
<?php $pro = $controllerProducto->getProductosController(); ?>
<?php #unset($_SESSION['cart']); ?>
<div class="container">

	<?php if(empty($pro) || $pro===null){  ?>
		<div class="form-group">
			<h4>No se encuentran productos registrados!</h4>
		</div>
	<?php }else{  ?>
			<div class="form-group row">
				<?php
				if($ventaID!=null && is_numeric($ventaID)){
					$ventaID = (int)$ventaID + 1;
					echo "<h4> Es la venta # " . $ventaID . "</h4><h5>Para la realizacion correcta de la venta verifica bien que el codigo de referencia este registrado</h5>";
				}else if(empty($ventaID) || $ventaID=='nohayventas' || strcasecmp($ventaID,'nohayventas')==0){
					echo "<h4> No hay ventas registradas </h4>"; 
				} 
				?> 
			</div>

		<div class="form-group row">

			<form action="ventas/agregarCarro.php" method="post" id="formCarrito">
				<div class="form-group col-md-4">
					<label for="nombre1_empleado">Referencia de producto</label>
					<select name="referenciaProductoVenta" id="referenciaProductoVenta" class="form-control" required>
							<?php while ($row = mysqli_fetch_row($pro)){ ?>
								<option value="<?php echo $row[0]."-".$row[2]."-".$row[9]."-".$row[12]."-".$row[10]; ?>"><?php echo $row[2] . " - ". $row[1] ?></option> 
							<?php } ?>
						<option>...</option>
					</select>
				</div>
			

				<div class="form-group col-md-4">
					<label for="documentoEmp">Cantidad</label>
					<input id="cantidadProductoVenta" name="cantidadProductoVenta" required placeholder="Cantidad de productos" class="form-control" />
				</div>

				
				<div class="form-group col-md-4">
					<label for="">Agregar a la venta</label><br>
					<input class="btn btn-info" type="submit" id="aggCarrito" value="Agregar"/>
				</div>
				

			</form>  
		</div>			
		
		<div class="form-group row">
	
			<?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>            
			
			<div class="form-group row">
				<div class="form-group col-md-9">
					<table class="table table-responsive">
						<thead>
							<tr>
								<th scope="col">Referencia</th>
								<th scope="col">Talla</th>
								<th scope="col">Cantidad</th>
								<th scope="col">Precio U.</th>
								<th scope="col">Total</th>
								<th scope="col">Accion</th>
							</tr>
						</thead>
						<tbody>
						<?php $cart = $_SESSION['cart'];?>
						<?php for ($i=0; $i<count($cart); $i++){ ?>
							<tr>
								<td><?php echo $cart[$i]["referencia"];?></td>
								<td><?php echo $cart[$i]["talla"]; ?></td>
								<td><?php echo $cart[$i]["cantidadCompra"]; ?></td>
								<td><?php echo $cart[$i]["precio"]; ?></td>
								<td><?php echo $cart[$i]["total"]; ?></td>
								<td><a href="ventas/borrarCarro.php?id=<?php echo $cart[$i]["id"];?>" class=""><i class="far fa-trash-alt"></i></a></td>
							</tr>
						<?php } ?>	
						</tbody>  
					</table>
				</div>
			</div>

			<?php else: ?>
			<div class="form-group">
				<h4>No has agregado nada aun!</h4>
		  </div>
			<?php endif; ?>

			<div class="form-group row">
				<form id="formVentaEmpleado">
					<input type="hidden" id="idEmpleadoVenta" name="idEmpleadoVenta" value="<?php echo $_SESSION['id']; ?>">
					
					<div class="form-group col-md-4">
						<label for="apellidosEmpleado">Fecha</label>
						<input type="text" class="form-control" id="fechaActual" disabled name="fechaActual" value="<?php echo date("Y-m-d"); ?>" placeholder="Fecha Actual">
					</div>
						
					<div class="form-group col-md-4">
						<label for="apellidosEmpleado">Document Cliente</label>
						<input type="text" class="form-control" id="documentoClienteVenta" name="documentoClienteVenta"  placeholder="Documento Cliente">
					</div>
				
					<div class="form-group col-md-4">
						<label for="documento">Modo de pago</label>
						<select name="modopago" id="modopago" class="form-control">
							<?php while($row = mysqli_fetch_row($modoPago)){  ?>
							<option value="<?php echo $row[0]; ?>"> <?php echo $row[1];  ?> </option>
							<?php } ?>
							<option selected value="...">...</option>
						</select>
					</div>

					<input type="submit" id="ventaCliente" class="btn btn-primary" value="Registrar Venta"/>
				</form>
			</div>
		</div>						

	<?php  } ?>              
</div>