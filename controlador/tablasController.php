<?php
require_once('../DB/db.php');


class tablasController {

  private $conectar;    

    public function __construct()
    {
    }

    public function getCategorias()
    {
        $this->conectar = Conectar::conectarBD();

        $sql = "SELECT * from categoria";
        $query = mysqli_query($this->conectar , $sql);

        $categorias = array();
        $i=0;
        if($query==true){
          while($row = mysqli_fetch_row($query)){
            $categorias[$row[0]] = $row[1];
          }

          mysqli_close($this->conectar);
          return $categorias;
        }

        mysqli_close($this->conectar);
        return 0;

    }

    public function getProveedores()
    {
        $this->conectar = Conectar::conectarBD();

        $sql= "SELECT * from proveedor";
        $query = mysqli_query($this->conectar,$sql);

        $proveedores = array();

        if($query==true){
            if(mysqli_num_rows($query) > 0){
                while ($row = mysqli_fetch_row($query)) {
                    $proveedores[$row[0]] = $row[1];
                }
                mysqli_close($this->conectar);
                return $proveedores;
            }
            else{
                mysqli_close($this->conectar);
                return 0;
            }
        }
        mysqli_close($this->conectar);
    }

    public function getTipoDeTela()
    {
        $this->conectar = Conectar::conectarBD();

        $sql = "SELECT * from tipomaterial";
        $query = mysqli_query($this->conectar , $sql);

        $material = array();

        if($query==true){
            if(mysqli_num_rows($query) > 0) {

               while ($row = mysqli_fetch_row($query)) {
                  $material[$row[0]] = $row[1];
               }                 
            return $material;   
            }
            mysqli_close($this->conectar);
            return 0;
        }
        mysqli_close($this->conectar);
    }

    public function getTipoProducto()
    {
        $this->conectar = Conectar::conectarBD();

        $sql = "SELECT * from tipoarticulo";
        $query = mysqli_query($this->conectar , $sql);

        $producto = array();

        if($query==true){
            if(mysqli_num_rows($query) > 0) {

               while ($row = mysqli_fetch_row($query)) {
                  $producto[$row[0]] = $row[1];
               }     
            return $producto;   
            }
            mysqli_close($this->conectar);
            return 0;
        }
        mysqli_close($this->conectar);
    }


    public function getTiposCliente()
    {
        $this->conectar = Conectar::conectarBD();
        $sql = "SELECT * from tipocliente";

        $tipoCliente = array();
        $query = mysqli_query($this->conectar , $sql);

        if($query==true){
            if(mysqli_num_rows($query) > 0 ){
                while($row = mysqli_fetch_row($query)){
                    $tipoCliente[$row[0]]  = $row[1];
                }
                return $tipoCliente; 
            }
            mysqli_close($this->conectar);
            return 0;
        }
        else{
            mysqli_close($this->conectar);
        }

    }

    
    

}
