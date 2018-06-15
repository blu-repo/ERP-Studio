


<div class="container" >
<h4>Registro de Proveedores</h4>
<form id="formProveedor" >

  <div class="form-group row">
    <div class="form-group col-md-4">
      <label for="nombreEmpresa">Nombre de la Empresa</label>
      <input type="text" class="form-control" id="nombreEmpresaProveedor" name="nombreEmpresaProveedor" placeholder="Nombre Empresa">
    </div>
    <div class="form-group col-md-4">
      <label for="nit">NIT</label>
      <input type="text" class="form-control" id="nitProveedor" name="nitProveedor" placeholder="NIT">
    </div>
    <div class="form-group col-md-4">
      <label for="telefonoproveedor">Telefono</label>
      <input type="text" class="form-control" id="telefonoproveedor"name="telefonoproveedor"placeholder="Telefono proveedor">
    </div>
  </div>

   <div class="form-group row">
       <div class="form-group col-md-4">
           <label for="emailempresa">Email de la empresa</label>
           <input type="email" class="form-control" id="emailempresa" name="emailempresa" placeholder="Email de la Empresa">
        </div>
        <div class="form-group col-md-4">
           <label for="direccionProveedor">Direccion Empresa</label>
           <input type="text" class="form-control" id="direccionEmpresa" name="direccionEmpresa" placeholder="Direccion Empresa">
        </div>
        <div class="form-group col-md-4">
        <label for="formapago">Forma de pago</label>
          <select id="pagoID" name="pagoID" class="form-control">
            <option >Efectivo</option>
            <option>Transferencia bancaria</option>
            <option>Cheques</option>
            <option selected>...</option>
          </select>
        </div>
    </div> 

  <input type="hidden" name="registroProveedorEmpresa" value="3">
  <input type="submit" class="btn btn-primary" value="Registrar proveedor!"></input>
</form>
</div>

<?php 
include('modal/modal_success.php');
include('modal/modal_error.php');