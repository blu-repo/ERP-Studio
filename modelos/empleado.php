<?php

require_once('../DB/db.php');


class Empleado {


        private $nombres = "";
        private $apellidos = "";
        private $lugarNacimiento = "";
        private $fechaNacimiento = "";
				private $tipoDocumento = "";
				private $documento;
        private $expDocumento = "";
        private $nacionalidad = "";
        private $direccion = "";
        private $correo = "";
				private $fechaRegistro = "";
				private $rol;
        private $conexion;



      public function __CONSTRUCT(){
      }


      public function insertarEmpleado($nombres, $apellidos, $lugarNacimiento, $tipoDocumento, $expDocumento, $nacionalidad, $direccion, $correo,$nacimiento,$documentoEmpleado,$rol)
      {
					$this->conexion=Conectar::conectarBD();

					$this->nombres = $nombres;
					$this->apellidos=$apellidos;
					$this->lugarNacimiento = $lugarNacimiento;
					$this->fechaNacimiento = $nacimiento;
					$this->tipoDocumento = $tipoDocumento;
					$this->documento = $documentoEmpleado;
					$this->expDocumento = $expDocumento;
					$this->nacionalidad = $nacionalidad;
					$this->direccion = $direccion;
					$this->correo = $correo;
					$this->rol=$rol;

					if($this->validarEmail($this->conexion, $this->correo)==false){

						$usuario =$this->registrarUsuario($this->conexion,$this->rol,$this->correo,$this->documento);
						if($usuario!=0 || $usuario!=null){

							$sql = "INSERT INTO empleado (nombres,apellidos,lugarnacimiento,fechanacimiento,
							tipodocumento,documento,expediciondocumento,nacionalidad,direccion,correo,usuario,fecharegistro,estado)
							values ('$this->nombres','$this->apellidos','$this->lugarNacimiento','$this->fechaNacimiento','$this->tipoDocumento','$this->documento','$this->expDocumento','$this->nacionalidad','$this->direccion','$this->correo','$usuario',NOW(),0)";

							$query = mysqli_query($this->conexion , $sql);

							if($query==true){
								echo "true";
							}
							else{
								echo mysqli_error($this->conexion);
							}
						}
						else{
							echo "no se pudo registrar el usuario";
						}
					}
					else{
						echo "emailregistrado";
					}

					echo mysqli_error($this->conexion);
				}

				private function registrarUsuario($conexion , $rol , $email , $documento)
				{
						$sql = "INSERT into usuario
						(rol,user,pass,estado,fecharegistro)
						values('$rol','$email','$documento',0,NOW())";

						$query = mysqli_query($conexion,$sql);

						if($query==true){
							return mysqli_insert_id($conexion);
						}
						else{
							mysqli_close($query);
							return mysqli_error($conexion);
						}
						return 0;
				}

				private function validarEmail($conexion , $email)
				{
					 $sql = "SELECT correo from empleado where '$email'=correo";
					 $query = mysqli_query($conexion,$sql);

					 if($query==true){
						 if(mysqli_num_rows($query) > 0){
							 return true;
						 }
					 }
					 return false;
				}


				public function getEmpleados()
				{
						$this->conexion = Conectar::conectarBD();
						$empleados = array();
						$sql = "SELECT * from empleado";

						$query = mysqli_query($this->conexion,$sql);

						if($query==true){
							 if(mysqli_num_rows($query) > 0){
								 return $query;
							 }
						}
						else{
							return "null";
						}
				}

        #Metodo que permite obtener un empleado para editarlo segun su identificador

        public function getEmpleadoById($ID)
        {
           $this->conexion = Conectar::conectarBD();
           $empleado = array();

           $sql = "SELECT * from empleado where id='$ID'";

           $query = mysqli_query($this->conexion , $sql);

           if($query==true){
						 if(mysqli_num_rows($query)==1){
								return mysqli_fetch_array($query);
						 }
						}
						else{
             return "null";
            }
				}

				/**
				 * Metodo que permite obtener el rol de un empleado atravez de su ID
				 */
				public function getRolEmpleado($ID)
				{
					echo $ID;
					$this->conexion = Conectar::conectarBD();
					$sql = "SELECT usuario.rol from usuario inner join empleado on empleado.usuario=usuario.id where empleado.id='$ID'";

					$query = mysqli_query($this->conexion,$sql);

					if($query==true){
						// if(mysqli_num_rows($query) >=1 ){
							$var = mysqli_fetch_array($query);
							return $var[0];
						// }
					}
					else{	
						return 'null';
					}
				}
				
				/**
				 * Metodo que permite editar y agregar el estudio para un cliente
				 */

				public function editarEmpleadoEstudios($id,$instituto,$titulo,$fecha)
				{		
					$this->conexion = Conectar::conectarBD();
					$sql = "INSERT into estudios (instituto,titulo,aniosalida,empleado,fecharegistro) 
					values ('$instituto','$titulo','$fecha','$id', NOW())";

					$query = mysqli_query($this->conexion,$sql);

					if($query==true){
						echo "true";
					}
					else{
						echo mysqli_error($this->conexion);
						// mysqli_close($this->conexion);
					}
				}

				public function editarEmpleadoExamenes($id,$entidad,$dictamen,$fecha,$telefono,$direccion,$observacionExamen)
				{
					 $this->conexion = Conectar::conectarBD();
					 $sql = "INSERT into examenes 
					 (entidadmedica,dictamen,fecharealizacion,observacion,telefono,direccion,empleado,fecharegistro)
					 values
					 ('$entidad','$dictamen','$fecha','$observacionExamen','$telefono','$direccion','$id', NOW())";

					 $query = mysqli_query($this->conexion,$sql);

					 if($query==true){
						 echo "true";
					 }
					 else{
						 mysqli_error($this->conexion);
					 }
				}



}
