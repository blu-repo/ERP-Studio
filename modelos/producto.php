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

    
    public function insertarProducto($nombre , $codigo , $color, $tela, $proveedor, $tipoproducto, $categoria, $talla, $cantidad, $precio)
    {
        $this->nombre = $nombre;
        $this->referencia = $codigo;
        $this->color = $color;
        $this->fechaRegistro = date('Y-m-d');
        $this->tipoMaterial = $tela;
        $this->tipoArticulo = $tipoproducto;
        $this->precio = $precio;
        $this->talla = $talla;
        $this->cantidad = $cantidad;
        $this->categoria=$categoria;
        $this->proveedor = $proveedor;

        $this->conectar = Conectar::conectarBD();
        
         $sql_producto = "INSERT INTO
          producto 
          (nombre,referencia,color,fecharegistro,tipomaterial,tipoarticulo,categoria,proveedor,precio,talla,stock)
          values
          ('$this->nombre','$this->referencia','$this->color',NOW(),'$this->tipoMaterial','$this->tipoArticulo','$this->categoria','$this->proveedor','$this->precio','$this->talla',1)";   

         $query_producto = mysqli_query($this->conectar,$sql_producto);

         if($query_producto==true){
             echo "true";
         }   
         else{
            echo mysqli_error($this->conectar);
         }
    }


}