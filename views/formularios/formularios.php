
<?php require_once('../controlador/tablasController.php'); ?>
<?php $tablas = new tablasController(); ?>

<!-- Formulario para el registro del cliente para la botique -->
<?php $tipoCliente  = $tablas->getTiposCliente();  ?>
<div class="container" id="regCliente">
<form id="formCliente">

  <div class="form-group row">
    <div class="form-group col-md-4">
      <label for="nombre1">Primer nombre</label>
      <input type="text" class="form-control" id="primernombreCliente" name="primernombreCliente" placeholder="Primer nombre" name="primernombreCliente">
    </div>
    <div class="form-group col-md-4">
      <label for="nombre2">Segundo nombre</label>
      <input type="text" class="form-control" id="segundonombreCliente" name="segundonombreCliente" placeholder="Segundo nombre">
    </div>
    <div class="form-group col-md-4">
      <label for="apellidos">Apellidos</label>
      <input type="text" class="form-control" id="apellidosCliente" name="apellidosCliente" placeholder="Apellidos">
    </div>
  </div>

   <div class="form-group row">
      <div class="form-group col-md-4">
      <label for="tipoCliente">Tipo de Cliente</label>
      <select name="tipoCliente" id="tipoCliente" class="form-control">
      <?php if($tipoCliente!=0){ ?>
        <?php foreach ($tipoCliente as $ID => $nombre) { ?>
          <option value="<?php echo $ID; ?>"><?php echo $nombre; ?></option>   
        <?php } ?>
      <?php } ?>
        <option selected>...</option>
      </select>
      </div>
      <div class="form-group col-md-4">
        <label for="telefono">Telefono</label>
        <input type="text" class="form-control" id="telefonoCliente" name="telefonoCliente" placeholder="Telefono">
      </div>
      <div class="form-group col-md-4">
        <label for="documento">Documento</label>
        <input type="text" class="form-control" id="documentoCliente" name="documentoCliente" placeholder="Documento">
      </div>
    </div> 

  <div class="form-group row">
    <div class="form-group col-md-5">
      <label for="direccion">Direccion</label>
      <input type="text" class="form-control" id="direccionCliente" name="direccionCliente" placeholder="Direccion Cliente">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Email</label>
      <input type="email" id="emailCliente" name="emailCliente" class="form-control" placeholder="Email">
    </div>
  </div>

  <input type="hidden" value="2" name="tipoClienteRegistro"> 
  <input type="submit" id="cliente1" class="btn btn-primary" value="Registrar Cliente"></input>
</form>
</div>








<!-- Registro Producto, formulario -->

<?php $categoria = $tablas->getCategorias(); ?>
<?php $material = $tablas->getTipoDeTela(); ?>
<?php $producto = $tablas->getTipoProducto(); ?>
<?php $proveedores = $tablas->getProveedores(); ?>



<div class="container" id="regProducto">
 <form id="formProducto">

  <div class="form-group row">
    <div class="form-group col-md-4">
      <label for="nombreproducto">Nombre producto</label>
      <input type="text" class="form-control" id="nombreproducto" name="nombreproducto" placeholder="Nombre producto">
    </div>
    <div class="form-group col-md-4">
      <label for="codigo">Codigo</label>
      <input type="number" class="form-control" id="codigoproducto" name="codigoproducto" placeholder="Codigo producto">
    </div>
    <div class="form-group col-md-4">
      <label for="color">Color</label>
      <select id="colorIDproducto" class="form-control" name="colorIDproducto">
        <option selected>Verde</option>
        <option>Rosa</option>
        <option>Azul</option>
        <option>Rojo</option>
        <option>...</option>
      </select>
    </div>
  </div>

   <div class="form-group row">
        <div class="form-group col-md-4">
           <label for="tipotela">Tipo de Tela</label>
           <select id="telaIDproducto" class="form-control" name="telaIDproducto">
             <?php if($material!=0){  ?>
                <?php foreach ($material as $key => $value) { ?>
                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                <?php } ?>
             <?php } ?>
             <option selected>...</option>
           </select>
        </div>

        
        <div class="form-group col-md-4">
           <label for="proveedor">Proveedor</label>
           <select id="proveedorIDProducto" class="form-control" name="proveedorIDProducto">
            <?php if($proveedores!=0){ ?>
              <?php foreach ($proveedores as $key => $value) { ?>
                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
              <?php } ?>
             <?php } ?>
            <option selected>...</option>
           </select>
        </div>
        <div class="form-group col-md-4">
           <label for="documento">Tipo de producto</label>
           <select id="productoID" class="form-control" name="productoID">
              <?php if($producto > 0){  ?>
                <?php foreach ($producto as $key => $value) {?>
                  <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                <?php  } ?>
              <?php } ?>    
             <option selected>...</option>
           </select>
        </div>
        
    </div> 

  <div class="form-group row">
    <div class="form-group col-md-4">
      <label for="direccion">Categoria</label>
      <select id="categoriaIDproducto" class="form-control" name="categoriaIDproducto">
      <?php if($categoria!=0){ ?>
        <?php foreach($categoria as $valor=>$nombre){ ?>
          <option value="<?php echo $valor; ?>"><?php echo $nombre; ?></option>
        <?php 
              }
          } 
        ?> 
        <option value="0" selected>...</option> 
      </select>
    </div>

     
    <div class="form-group col-md-4">
      <label for="inputState">Talla</label>
      <input type="text" id="tallaproducto" name="tallaproducto" class="form-control" placeholder="Talla">
    </div>

    <div class="form-group col-md-4">
      <label for="inputState">Precio</label>
      <input type="number" id="precioproducto" name="precioproducto" class="form-control" placeholder="Precio">
    </div> 
  </div>
  <input type="hidden" value="10" name="registroProdcutoH">

  <div class="form-group row">
    <div class="form-group col-md-3"><br>
      <label for=""></label>
      <a href="" data-toggle="modal" data-target="#agregar_detalles"  class="btn btn-lg mybutton_cyano wow fadeIn"><span class="network-name">Registra los detalles</span></a>
    </div>

    <div class="form-group col-md-3">
      <label for="inputState"></label><br>
      <a href="" data-toggle="modal" data-target="#agregar_articulo"  class="btn btn-lg mybutton_cyano wow fadeIn"><span class="network-name">Agregar producto</span></a>
    </div>

    <div class="form-group col-md-3">
      <label for="inputState"></label><br>
      <a href="" data-toggle="modal" data-target="#agregar_categoria"  class="btn btn-lg mybutton_cyano wow fadeIn"><span class="network-name">Agregar Categoria</span></a>
    </div>
    
    <div class="form-group col-md-3">
      <label for="inputState"></label><br>
      <a href="" data-toggle="modal" data-target="#agregar_material"  class="btn btn-lg mybutton_cyano wow fadeIn"><span class="network-name">Agregar Material</span></a>
    </div>
   
  </div>
   <?php include('../Studio_modals/AgregarDetalles.php'); ?> 
  <input type="submit" class="btn btn-lg btn-primary" value="Registrar Producto"></input>
</form>
</div>

<?php include('modal/AgregarCategoria.php'); ?> 
<?php include('modal/AgregarArticulo.php'); ?> 
<?php include('modal/AgregarMaterial.php'); ?> 







<!-- Formulario que permite registrar un empleado por parte del administrador -->

<div class="container" id="regEmpleado">
<form id="formEmpleado">

  <div class="form-group row">
    <div class="form-group col-md-4">
      <label for="nombre1_empleado">Primer nombre</label>
      <input type="text" class="form-control" id="primernombreEmpleado" name="primernombreEmpleado" placeholder="Primer nombre">
    </div>
    <div class="form-group col-md-4">
      <label for="nombre2_empleado">Segundo nombre</label>
      <input type="text" class="form-control" id="segundonombreEmpleado" name="segundonombreEmpleado" placeholder="Segundo nombre">
    </div>
    <div class="form-group col-md-4">
      <label for="apellidosEmpleado">Apellidos</label>
      <input type="text" class="form-control" id="apellidosEmpleado" name="apellidosEmpleado" placeholder="Apellidos">
    </div>
  </div>

   <div class="form-group row">
       <div class="form-group col-md-4">
           <label for="documentoEmp">Tipo de documento</label>
           <select id="TipoDocumentoEmpleado" name="TipoDocumentoEmpleado" class="form-control">
                <option value="1">C.C</option>
                <option value="2">NIT</option>
                <option selected>...</option>
           </select>
        </div>
        <div class="form-group col-md-4">
          <label for="documento">Documento</label>
          <input type="text" class="form-control" id="documentoEmpleado" name="documentoEmpleado" placeholder="Documento">
        </div>
        <div class="form-group col-md-4">
           <label for="nacionalidad">Nacionalidad</label>
           <select id="nacionalidadEmpleado" name="nacionalidadEmpleado" class="form-control">
                <option value="colombiana">Colombiana</option>
                <option value="venezolana">Venezolana</option>
                <option value="rusa">Rusa</option>
                <option value="mexicana">Mexicana</option>
                <option selected>...</option>
           </select>
        </div>
    </div> 

  <div class="form-group row">
    <div class="form-group col-md-4">
      <label for="nacimientoEmpleado">Fecha de nacimiento</label>
      <input type="date" class="form-control" id="nacimientoEmpleado" name="nacimientoEmpleado" placeholder="Fecha de nacimiento">
    </div>
    <div class="form-group col-md-4">
      <label for="direccionEmpleado">Direccion</label>
      <input type="text" id="direccionEmpleado" name="direccionEmpleado" class="form-control" placeholder="Direccion">
    </div>
    <div class="form-group col-md-4">
      <label for="tipocontrato">Lugar de nacimiento</label>
      <input type="text" id="lugarnacimientoEmpleado" name="lugarnacimientoEmpleado" class="form-control" placeholder="Lugar de nacimiento">
    </div>
  </div>

  <div class="form-group row">
    <div class="form-group col-md-4">
      <label for="expedicion_doc_empleado">Expedicion de documento</label>
      <input type="text" class="form-control" id="expedocEmpleado" name="expedocEmpleado" placeholder="Expedicion de documento">
    </div>
    <div class="form-group col-md-4">
      <label for="aux_empleado">Correo electronico</label>
      <input type="text" class="form-control" id="emailempleado" name="emailempleado" placeholder="Email">
    </div>
    <div class="form-group col-md-4">
    <label for="empleadoRol">Seleccione un Rol</label>
     <select name="rolEmpleado" id="rolEmpleado" class="form-control">
      <option value="bodega">Bodega</option>
      <option value="contador">Contador</option>
      <option value="vendedor">Vendedor</option>
      <option value="Contratista">Contratista</option>
      <option selected>...</option>
     </select>
    </div>
  </div>
  <input type="hidden" value="11" id="registroEmpleadoH" name="registroEmpleadoH">

  <!-- <div class="form-group row">
    <div class="form-group col-md-4">
      <label for="pensionEmpleado">Cotizando Pension</label><br>
      <a href="" data-toggle="modal" data-target="#agregar_pension"  class="btn  btn-lg mybutton_cyano wow fadeIn"><span class="network-name">Cotiza Pension!</span></a>
    </div>
    <div class="form-group col-md-4">
      <label for="estudios">Estudios realizados</label><br>
      <a href="" data-toggle="modal" data-target="#agregar_estudios"  class="btn  btn-lg mybutton_cyano wow fadeIn"><span class="network-name">Registra un estudio!</span></a>
    </div>
    <div class="form-group col-md-4">
      <label for="estudios">Examenes Realizados</label><br>
      <a href="" data-toggle="modal" data-target="#agregar_examen"  class="btn  btn-lg mybutton_cyano wow fadeIn"><span class="network-name">Registro de examen!</span></a>
    </div>
  </div> -->
     
  <?php #include('../Studio_modals/AgregarEstudios.php');  ?>
  <?php #include('../Studio_modals/AgregarExamen.php');  ?>
  <?php #include('../Studio_modals/AgregarPension.php');  ?>
  <?php #include('../Studio_modals/AgregarEps.php');  ?>
  <input type="submit" class="btn btn-primary" value="Registrar Empleado"></input>
</form>
</div>







<!-- Formulario para el registro de los proveedores -->



<div class="container" id="regProveedor">
<form id="formProveedor">

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
 





