<?php 

require_once('../DB/db.php');


class Categoria {

    private $nombre;
    private $descripcion;
    private $fechaRegistro;
    private $conectar;

    public function insertarCategoria($nombre, $descripcion)
    {
       $this->nombre = $nombre;
       $this->descripcion = $descripcion;
       $this->fechaRegistro = date('Y-m-d');
       $this->conectar = Conectar::conectarBD();
 
       if($this->existeCategoria($this->nombre)==true){ 

       $minuscula_nombre = strtolower($this->nombre);     
       $sql  =   "INSERT INTO 
       categoria (nombre,descripcion,fecharegistro) 
       values ('$minuscula_nombre','$this->descripcion',NOW())";

       $query = mysqli_query($this->conectar , $sql);

       if($query == true){
            echo "true";
       }
       else{
        mysqli_error($this->conectar);
       }

       }
       else{
            echo "ya esta registrada";
       }

       mysqli_close($this->conectar);

    } 


    private function existeCategoria($nombre)
    {
        $this->conectar = Conectar::conectarBD();
        $minuscula = strtolower($nombre);

        $sql = "SELECT nombre from categoria where nombre='$minuscula'";
        $query = mysqli_query($this->conectar,$sql);

        if($query==true){
			if(mysqli_num_rows($query) >= 1){
					return false;
			}
		}

        return true;
    }


    

}