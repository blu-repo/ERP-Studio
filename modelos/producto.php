<?php 


require_once('../DB/db.php');

class producto {

    private $nombre = "";
    private $referencia = "";
    private $color = "";
    private $fechaRegistro;
    private $tipoMaterial;
    private $tipoArticulo;
    private $precio = 0;
    private $talla = "";
    private $cantidad;
    private $conectar;
    private $categoria;
    private $proveedor;

    /**
     * Permite insertar un producto dentro de la BD - Modificar Eliminar Modal de detalle
     */
    public function insertarProducto(
    $nombre , 
    $codigo , 
    $color, 
    $tela, 
    $proveedor, 
    $tipoproducto, 
    $categoria, 
    $talla, 
    $precio, 
    $cantidad)
    {
        $this->nombre = $nombre;
        $this->referencia = $codigo;
        $this->color = $color;
        $this->fechaRegistro = date('Y-m-d');
        $this->tipoMaterial = $tela;
        $this->tipoArticulo = $tipoproducto;
        $this->precio = $precio;
        $this->talla = $talla;
        $this->cantidad = (int)$cantidad-1;
        $this->categoria=$categoria;
        $this->proveedor = $proveedor;

        $this->conectar = Conectar::conectarBD();
        
         $sql_producto = "INSERT INTO
          producto 
          (nombre,referencia,color,fecharegistro,tipomaterial,tipoarticulo,categoria,proveedor,precio,talla,stock,cantidad)
          values
          ('$this->nombre','$this->referencia',
          '$this->color',NOW(),'$this->tipoMaterial',
          '$this->tipoArticulo','$this->categoria',
          '$this->proveedor','$this->precio',
          '$this->talla',1,'$this->cantidad')";   

         $query_producto = mysqli_query($this->conectar,$sql_producto);

         if($query_producto==true){
            echo "true";
         }   
         else{
            echo mysqli_error($this->conectar);
         }
    }

    /**
     * Permite obtener todos los productos dentro de la base de datos
     */
    public function getProductos()
    {
        $this->conectar = Conectar::conectarBD();

        $sql = "SELECT * from producto";

        $query = mysqli_query($this->conectar,$sql);

        if($query==true){
            return $query;
        }
        else{
            return "null";
        }
    }

    /**
     * Permite obtener el nombre de una categoria segun el ID del producto
     */
    public function getCategoria($ID)
    {
       $this->conexion = Conectar::conectarBD();
        $sql = "SELECT categoria.nombre , categoria.id from categoria inner join 
        producto on categoria.id=producto.categoria where producto.id='$ID'";
        
        $query = mysqli_query($this->conexion,$sql);

        if($query==true){
            return mysqli_fetch_array($query);
        }
        else{
            return "null";
        }
    }

    /**
     * Permite editar un producto en sus datos basicos
     */
    public function editarProducto($id,$nombre,$referencia,$precio,$talla)
    {
       $this->conexion = Conectar::conectarBD();

        $sql = "UPDATE producto 
        set nombre='$nombre',referencia='$referencia',precio='$precio',talla='$talla'
        where producto.id='$id'";    

       $query = mysqli_query($this->conexion,$sql);

       if($query==true){
           echo "true";
       }
       else{
           echo mysqli_error($this->conexion);
       }
    }


    /**
     * Permite editar un producto con todos sus datos
     */
    public function getDatos($ID)
    {
        try{
            $this->conectar = Conectar::conectarBD();
            
            $sql = "SELECT producto.nombre as nombre, producto.referencia as referencia, tipomaterial.id as idmaterial,
                    tipoarticulo.id as idarticulo, tipoarticulo.nombre as desarticulo, tipomaterial.nombre as desmaterial, 
                    proveedor.empresa as empresa, proveedor.id as idproveedor, categoria.nombre as descategoria,categoria.id as idcategoria,
                    producto.talla as talla, producto.precio as precio
                    from producto
                    inner join proveedor on proveedor.id=producto.proveedor
                    inner join categoria on producto.categoria=categoria.id
                    inner join tipoarticulo on tipoarticulo.id=producto.tipoarticulo
                    inner join tipomaterial on tipomaterial.id=producto.tipomaterial
                    where producto.id=?";

            $stm = $this->conectar->prepare($sql);
            $stm->bind_param('s',$ID);
            $stm->execute();
            $rta = $stm->get_result();  

            if($rta->num_rows===0)
                return "null";
            
            
            $datos = $rta->fetch_all(MYSQLI_ASSOC);
            $stm->close();
            return $datos;

        }catch(Exception $e){
            return "null";
        }
    }

    /**
     * Permite actualizar un producto dependiendo de su ID
     */
    public function setProducto($ID,$nombre,$referencia,$color,$material,$proveedor,$articulo,$categoria,$talla,$precio)
    {
        try{
            $this->conectar = Conectar::conectarBD();
            $sql = "UPDATE producto 
                    set nombre='$nombre',referencia='$referencia',color='$color',tipomaterial='$material',
                    tipoarticulo='$articulo',categoria='$categoria',proveedor='$proveedor',precio='$precio',
                    talla='$talla'
                    where producto.id=?";
            $stm = $this->conectar->prepare($sql);
            $stm->bind_param('s',$ID);
            $dato = $stm->execute();
            
            if($dato==true){
                echo "true";
            }
            else{
                echo "false";
            }
        }catch(Exception $e){
            return "null";
        }
    }


    /**
     * 
     */
    public function cargarImagenProducto($ID)
    {
        $this->conectar = Conectar::conectarBD();
        $valor = $this->superaCantidadImagenes($ID,$this->conectar);
        if($valor==true) { 
            return "tope";
        }
        else{
            $valor = $this->uploadImagenServerProducto();
            $sql = "INSERT INTO meta_producto
                    (src,producto_id)
                    values
                    ('$valor','$ID')";
            $query = mysqli_query($this->conectar, $sql);

            if($query==true){
                return "true";
            }
            return "false";
        }    
    }



    /**
     * 
     */
    private function superaCantidadImagenes($ID,$conexion)
    {
        $sql = "SELECT count(*) from meta_producto where producto_id='$ID'";
        $query = mysqli_query($conexion,$sql);
        $vector = mysqli_fetch_array($query);
        
        if($query==true){
            if($vector[0]<6){
                return false;
            }
            return true;
        }
        return false;
    
    }


    /**
     * Permite subir una imagen dentro de la BD
     */
    private function uploadImagenServerProducto()
	{
        $nombre_img = $_FILES['imagenProducto']['name'];
        $tipo = $_FILES['imagenProducto']['type'];
        $tamano = $_FILES['imagenProducto']['size'];
            
        //Si existe imagen y tiene un tamaño correcto
            if (($nombre_img == !NULL) && ($_FILES['imagenProducto']['size'] <= 20000000)) 
            {
                //indicamos los formatos que permitimos subir a nuestro servidor
                if (($_FILES["imagenProducto"]["type"] == "image/gif")
                || ($_FILES["imagenProducto"]["type"] == "image/jpeg")
                || ($_FILES["imagenProducto"]["type"] == "image/jpg")
                || ($_FILES["imagenProducto"]["type"] == "image/png"))
                {
                    // Ruta donde se guardarán las imágenes que subamos
                    $directorio = $_SERVER['DOCUMENT_ROOT'].'/modelo/ERP-Studio/img/upload_producto/';
                    // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
                    move_uploaded_file($_FILES['imagenProducto']['tmp_name'],$directorio.$nombre_img);
                    return $directorio.$nombre_img;
                    // header('location:../views/miperfil.php');
                } 
                else 
                {
                        //si no cumple con el formato
                        return "null";
                }
            } 
            else 
            {
                    //si existe la variable pero se pasa del tamaño permitido
                    if($nombre_img == !NULL) return "imgegrande"; 
            }
        }
    

}