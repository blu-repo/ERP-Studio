<?php 


require_once('../DB/db.php');
class proveedor {

    private $empresa = "";
    private $direccion = "";
    private $telefono = "";
    private $email = "";
    private $nit = "";
    private $conectar;
    

    /**
     * Permite registrar un priveedore dentro de la BD
     */
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

    /**
     * Permite obtener todos los proveedores de la BD
     */
    public function getProveedores()
    {
        try{

            $this->conectar = Conectar::conectarBD();
            $sql = "SELECT * from proveedor";
            $query = mysqli_query($this->conectar,$sql);

            if($query==true){
                return $query;
            }

        }catch(Exception $e){
            return null;
        }    
    }


    /**
     * permite traer la informacion de un proveedor
     */
    public function getProveedorDatos($ID)
    {   
        
        $this->conectar = Conectar::conectarBD();
        $sql = "SELECT * from proveedor
        where proveedor.id=?";

        $stm = $this->conectar->prepare($sql);
        $stm->bind_param('s',$ID);
        $stm->execute();
        $resultado = $stm->get_result();
        
        if($resultado->num_rows===0)
            return "null";
        
        $datos = $resultado->fetch_all(MYSQLI_ASSOC);
        $stm->close();
        return $datos;
    }


    /**
     * Permite obtener el contacto de un proveedor
    */
    public function getContactoProveedor($ID)
    {   
        $this->conectar = Conectar::conectarBD();
        $sql = "SELECT * from contactoproveedor
        where contactoproveedor.proveedor_id=?";

        $stm = $this->conectar->prepare($sql);
        $stm->bind_param('s',$ID);
        $stm->execute();
        $resultado = $stm->get_result();
        
        if($resultado->num_rows===0)
            return "null";
        
        $datos = $resultado->fetch_all(MYSQLI_ASSOC);
        $stm->close();
        return $datos;
    }

    /**
     * Permite editar un proveedor dependiendo de su ID
     */
    public function setProveedor($ID,$nombre,$nit,$telefono,$email,$direccion)
    {
        try{
           $this->conectar = Conectar::conectarBD();
           $sql = "UPDATE proveedor 
                   set empresa='$nombre',direccion='$direccion',telefono='$telefono',correoempresa='$email',
                   nit='$nit'
                   where proveedor.id=?";
            $stm = $this->conectar->prepare($sql);
            $stm->bind_param('s',$ID);
            $rta = $stm->execute(); 
            
            if($rta==true){
                echo "true";
            }
            else{
                echo "false";
            }
            $stm->close();

        }catch(Exception $e){
            echo "error";
        }
    }


    /**
    * Permite actualizar y insertar el contacto del proveedor designado
    */
    public function setContactoProveedor($ID,$nombre,$documento,$direccion,$telefono,$email,$accion)
    {
        try{
            $this->conectar=Conectar::conectarBD();

            if(strcmp($accion,'editar')==0){

                $sql = "UPDATE contactoproveedor    
                        set nombre='$nombre',documento='$documento',direccion='$direccion',telefono='$telefono',
                        correo='$email'
                        where contactoproveedor.proveedor_id='$ID'";

                $query = mysqli_query($this->conectar,$sql);

                if($query==true){
                    echo "actualizada";
                }else{
                    echo "noactualizada";
                }        

            }else if(strcmp($accion,'agregar')==0){

                $sql = "INSERT into contactoproveedor
                        (nombre,documento,direccion,telefono,correo,proveedor_id,fecharegistro)
                        values
                        ('$nombre','$documento','$direccion','$telefono','$email','$ID',NOW())";
                $stm = $this->conectar->prepare($sql);
                
                $rta = $stm->execute();
                if($rta==true){
                    echo "insertada";
                }else{
                    echo "noinsertada";
                }
            }
        }catch(Exception $e){

        }
    }



}
