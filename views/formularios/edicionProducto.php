


<?php require_once('../controlador/productoController.php'); ?>
<?php require_once('../controlador/tablasController.php'); ?>
<?php $tablas = new tablasController(); ?>
<?php $pro = new productoController(); ?>
<?php $categoria = $tablas->getCategorias(); ?>
<?php $material = $tablas->getTipoDeTela(); ?>
<?php $producto = $tablas->getTipoProducto(); ?>
<?php $proveedores = $tablas->getProveedores(); ?>
<?php $ide = $_POST['IDproductoImagen']; ?>
<?php $datos = $pro->getDatosProducto($ide); ?>
<?php if(!is_array($datos)){?>
  <div class="container col-xs-12 text-center">
      <div class="form-group row">
        <h4>Se ha producido un error al cargar los datos</h4>
      </div>
    </div>
<?php }else{  ?>

<div class="container">
<h4>Registro de Producto</h4>
 <form id="formEditarProductoPage">
  <input type="hidden" value="<?php echo $ide; ?>" id="ideProductoEditarVal" name="ideProductoEditarVal">
  <div class="form-group row">
    <div class="form-group col-md-4">
      <label for="nombreproducto">Nombre producto</label>
      <input type="text" class="form-control" id="nombreproductoEditar" value="<?php echo $datos[0]['nombre'];  ?>" name="nombreproductoEditar" placeholder="Nombre producto">
    </div>
    <div class="form-group col-md-4">
      <label for="codigo">Codigo</label>
      <input type="number" class="form-control" id="codigoproductoEditar" value="<?php echo $datos[0]['referencia']; ?>" name="codigoproductoEditar" placeholder="Codigo producto">
    </div>
    <div class="form-group col-md-4">
      <label for="color">Color</label>
      <select id="colorIDproductoEditar" class="form-control" name="colorIDproductoEditar">
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
           <select id="telaIDproductoEditar" class="form-control" name="telaIDproductoEditar">
             <?php if($material!=0){  ?>
                <?php foreach ($material as $key => $value) { ?>
                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                <?php } ?>
             <?php } ?>
             <option>...</option>
             <option value="<?php echo $datos[0]['idmaterial']; ?>" selected><?php echo $datos[0]['desmaterial']; ?></option>
           </select>
        </div>

        
        <div class="form-group col-md-4">
           <label for="proveedor">Proveedor</label>
           <select id="proveedorIDProductoEditar" class="form-control" name="proveedorIDProductoEditar">
            <?php if($proveedores!=0){ ?>
              <?php foreach ($proveedores as $key => $value) { ?>
                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
              <?php } ?>
             <?php } ?>
            <option>...</option>
            <option value="<?php echo $datos[0]['idproveedor']; ?>" selected><?php echo $datos[0]['empresa']; ?></option>
           </select>
        </div>
        <div class="form-group col-md-4">
           <label for="documento">Tipo de producto</label>
           <select id="productoIDEditar" class="form-control" name="productoIDEditar">
              <?php if($producto > 0){  ?>
                <?php foreach ($producto as $key => $value) {?>
                  <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                <?php  } ?>
              <?php } ?>    
             <option>...</option>
              <option value="<?php echo $datos[0]['idarticulo']; ?>" selected><?php echo $datos[0]['desarticulo']; ?></option>
           </select>
        </div>
        
    </div> 

  <div class="form-group row">
    <div class="form-group col-md-4">
      <label for="direccion">Categoria</label>
      <select id="categoriaIDproductoEditar" class="form-control" name="categoriaIDproductoEditar">
      <?php if($categoria!=0){ ?>
        <?php foreach($categoria as $valor=>$nombre){ ?>
          <option value="<?php echo $valor; ?>"><?php echo $nombre; ?></option>
        <?php 
              }
          } 
        ?> 
        <option>...</option> 
        <option value="<?php echo $datos[0]['idcategoria']; ?>" selected><?php echo $datos[0]['descategoria']; ?></option> 
      </select>
    </div>

     
    <div class="form-group col-md-4">
      <label for="inputState">Talla</label>
      <input type="text" id="tallaproductoEditar" value="<?php echo $datos[0]['talla']; ?>" name="tallaproductoEditar" class="form-control" placeholder="Talla">
    </div>

    <div class="form-group col-md-4">
      <label for="inputState">Precio</label>
      <input type="number" id="precioproductoEditar" value="<?php echo $datos[0]['precio']; ?>" name="precioproductoEditar" class="form-control" placeholder="Precio">
    </div> 
  </div>
  
  <div class="form-group row">
    
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
   
  <input type="submit" class="btn btn-lg btn-primary" value="Editar Producto"></input>
</form>
</div>

<div class="form-group col-md-3"><br>
  <form enctype="multipart/form-data" method="post" id="formImagenProducto">
    <label for="imagen">Imagen:</label>
    <input id="imagenProducto" name="imagenProducto" size="30" type="file"/>
    <input type="hidden" name="id_pro" id="id_pro" value="<?php echo $ide;?>"/>
    <input type="submit" class="btn btn-info"value="Cargar imagen de portada"/>
  </form>
</div>

 
<?php include('modal/AgregarCategoria.php'); ?> 
<?php include('modal/AgregarArticulo.php'); ?> 
<?php include('modal/AgregarMaterial.php'); ?>
<?php } ?>