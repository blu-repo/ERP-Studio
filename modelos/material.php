<?php 


require_once('../DB/db.php');

class Material {


    private $nombre;
    private $descripcion;
    private $conectar;

	/** 
	 * Metodo que permite agregar un material a la base de datos
	 * 
	 * */		
	
    public function insertarMaterial($nombre , $descripcion)
    {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->conectar = Conectar::conectarBD();

				if($this->existeTipoMaterial($this->nombre) == true){	

					$sql = "INSERT INTO 
					tipomaterial 
					(nombre,descripcion,fecharegistro)
					values
					('$this->nombre','$this->descripcion',NOW())";

					$query = mysqli_query($this->conectar , $sql);

					if($query == true){
							echo "true";
					}
					else{
							echo mysqli_error($this->conectar);
					}
				}
				else{
					echo "El elemento ya se encuentra registrado";
				}
        
	}
	
	/** metodo que permite saber si existe un material en la BD */

    private function existeTipoMaterial($nombre)
    {
        $this->conectar = Conectar::conectarBD();
        $sql = "SELECT nombre from tipomaterial where nombre='$nombre'";
        
        $query = mysqli_query( $this->conectar,$sql);

        if($query==true){
					if(mysqli_num_rows($query) >= 1){
							return false;
					}
				}

        return true;
    }




}