<?php 


require_once('../DB/db.php');
class proveedor {

    private $empresa = "";
    private $direccion = "";
    private $telefono = "";
    private $email = "";
    private $nit = "";
    private $conectar;
    


    public function insertarProveedor($nombreEmpresa , $direccion , $telefono , $email , $nit)
    {
         $this->conectar = Conectar::conectarBD();

         $this->empresa = $nombreEmpresa;
         $this->direccion = $direccion;
         $this->telefono = $telefono;
         $this->email = $email;
         $this->nit = $nit;

         $sql = "INSERT into proveedor
         (empresa,direccion,telefono,correoempresa,nit,fecharegistro)
         values('$this->empresa','$this->direccion','$this->telefono','$this->email','$this->nit',NOW())";

         $query = mysqli_query($this->conectar , $sql);

         if($query==true){
             echo "true";
         }
         else{
             echo mysqli_error($this->conectar);
         }
    }



}
