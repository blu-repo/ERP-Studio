<?php

require_once('../DB/db.php');

class Articulo {


    private $nombre;
    private $descripcion;
    private $conectar;


		/**
		 * Metodo que permite insertar un tipo de articulo en la base de datos
		 */

    public function insertarTipoArticulo($nombre , $descripcion)
    {							

			$this->nombre = $nombre;
			$this->descripcion = $descripcion;

			$this->conectar = Conectar::conectarBD();

			if($this->existeTipoArticulo($this->nombre) == true){
			
				$sql = " INSERT INTO 
				tipoarticulo 
				(nombre,descripcion,fecharegistro) 
				values 
				('$this->nombre','$this->descripcion',NOW())";	

				$query = mysqli_query($this->conectar , $sql);

				if($query == true){
					echo "true";
				}
				else{
					mysqli_error($this->conectar);
				}
			}
			else{
				echo "ya se encuentra registrado el articulo";
			}
		}
		
		/**
		 * Metodo que permite validar si se encuentra registrado un articulo por su nombre
		 */

		private function existeTipoArticulo($nombre)
    {
        $this->conectar = Conectar::conectarBD();
        $sql = "SELECT nombre from tipoarticulo where nombre='$nombre'";
        
        $query = mysqli_query( $this->conectar,$sql);

        if($query==true){
			if(mysqli_num_rows($query) >= 1){
					return false;
			}
		}

        return true;
    }


}



