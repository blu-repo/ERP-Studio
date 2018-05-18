<?php 

require_once('../DB/db.php');

class cliente{


    private $nombre = "";
    private $apellidos = "";
    private $documento = "";
    private $direccion = "";
    private $telefono = "";
    private $correo = "";
    private $tipo;
    private $conectar;

    public function __CONSTRUCT()
    {
    }

    public function insertarCliente($nombre , $apellidos , $documento , $direccion , $telefono , $correo , $tipo )
    {
        $this->conectar = Conectar::conectarBD();
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->documento = $documento;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->tipo = $tipo;

        if($this->existeCliente($this->documento)==true){

            $sql = "INSERT into cliente 
            (nombres,apellidos,documento,direccion,telefono,correo,tipocliente)
            values ('$this->nombre','$this->apellidos', '$this->documento','$this->direccion','$this->telefono','$this->correo','$this->tipo')";

            $query = mysqli_query($this->conectar, $sql);

            if($query==true){
                echo "true";
            }
            else{
                echo mysqli_error($this->conectar);    
            }
        }
        else{
            echo "Ya esta registrado";
            mysqli_close($this->conectar);
        }
        
    }

    private function existeCliente($documento){

        $this->conectar = Conectar::conectarBD();

        $sql = "SELECT cliente.documento from cliente where '$documento'=cliente.documento";

        $query = mysqli_query($this->conectar,$sql);
        if($query==true){
            if(mysqli_num_rows($query) >= 1){
                return false;
            }
        }
        return true;
    }

    public function getClientes()
    {
        $this->conectar = Conectar::conectarBD();

        $sql = "SELECT * from cliente";
        $query = mysqli_query($this->conectar,$sql);

        if($query==true){
            if(mysqli_num_rows($query) > 0){
                return $query;
            }
        }

        return null;
    }
        
    public function editarCliente($id,$nombres,$apellidos,$documento,$telefono,$email)
    {
        $this->conectar = Conectar::conectarBD();
        if($this->existeEmail($email,$this->conectar,$id)==true){
            $sql = "UPDATE cliente 
            set nombres='$nombres',apellidos='$apellidos',documento='$documento',telefono='$telefono',correo='$email'
            where id='$id'";
            $query = mysqli_query($this->conectar,$sql);

            if($query==true){
                echo "true";
            }
            else{
                echo mysqli_error($this->conectar);
            }
        }
        else{
            echo "emailregistradocliente";
        }
    }

    private function existeEmail($email,$conexion,$id)
    {
        $sql = "SELECT correo from cliente where correo='$email' and id !='$id'";
        $query = mysqli_query($conexion , $sql);

        if($query==true){
            if(mysqli_num_rows($query) >= 1){
                return false;
            }
        }
        return true;
    }


    public function eliminarCliente($id)
    {
        $this->conectar = Conectar::conectarBD();
            
    }

}