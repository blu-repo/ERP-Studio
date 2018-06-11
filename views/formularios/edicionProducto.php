


<?php require_once('../controlador/productoController.php'); ?>
<?php require_once('../controlador/tablasController.php'); ?>
<?php $tablas = new tablasController(); ?>
<?php $productos = new productoController(); ?>
<?php $categoria = $tablas->getCategorias(); ?>
<?php $material = $tablas->getTipoDeTela(); ?>
<?php $producto = $tablas->getTipoProducto(); ?>
<?php $proveedores = $tablas->getProveedores(); ?>
<?php echo $_POST['IDproductoImagen']; ?>
<?php $datos = $productos->getDatosProducto($_POST['IDproductoImagen']); ?>

<div class="container">
<h4>Registro de Producto</h4>
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