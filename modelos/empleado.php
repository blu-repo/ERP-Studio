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
			return "null";
			
	}

#Metodo que permite obtener un empleado para editarlo segun su identificador

public function getEmpleadoById($ID)
{
		$this->conexion = Conectar::conectarBD();
		$empleado = array();

		$sql = "SELECT * from empleado where empleado.usuario='$ID'";

		$query = mysqli_query($this->conexion , $sql);

		if($query==true){
			if(mysqli_num_rows($query)==1){
				return mysqli_fetch_array($query);
			}
		}
		return "null";
		
	}

	/**
	 * Metodo que permite obtener el rol de un empleado atravez de su ID
	 */
	public function getRolEmpleado($ID)
	{
		echo $ID;
		$this->conexion = Conectar::conectarBD();
		$sql = "SELECT usuario.rol from usuario inner join empleado on empleado.usuario=usuario.id where empleado.usuario='$ID'";

		$query = mysqli_query($this->conexion,$sql);

		if($query==true){
			// if(mysqli_num_rows($query) >=1 ){
				$var = mysqli_fetch_array($query);
				return $var[0];
			// }
		}
			
		return 'null';
		
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
		
		echo mysqli_error($this->conexion);
			// mysqli_close($this->conexion);
		
	}

	/**
	 * PErmite agregar los examenes a un empleado para asi validar las condiciones fisicas dentro de la empresa
	 */

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
			return mysqli_error($this->conexion);

	}

	/**
	 * Permite obtener todas las empresas en las cuales se estan pagando pension
	 */

	public function getPension()
	{
		$this->conexion = Conectar::conectarBD();

		$sql = "SELECT * from pension";
		$query = mysqli_query($this->conexion,$sql);

		if($query==true){
			return $query;
		}
		
		return null;
		
	}

	/**
	 * Meotod que permite actualizar la empresa en la que el empleado paga su pension
	 */
	public function actualizarPension($id_empleado , $id_empresa)
	{
		$this->conexion = Conectar::conectarBD();

		$sql  = "UPDATE empleado 
		set pension='$id_empresa'
		where empleado.id='$id_empleado'";

		$query = mysqli_query($this->conexion,$sql);

		if($query==true){
			echo "true";
		}
		
		echo mysqli_error($this->conexion);
		
	}


	/**
	 * Permite editar los datos principales de un empleado apartir de su ID
	 */
	public function editarEmpleado($id,$nombres,$apellidos,$documento,$direccion,$lugarnacimiento,$email,$nacimientoEmpleado)
	{
		$this->conexion = Conectar::conectarBD();
		if($this->validarEmail($this->conexion,$email)==false){ 
			
			$sql = "UPDATE empleado
			set nombres='$nombres',apellidos='$apellidos',lugarnacimiento='$lugarnacimiento',direccion='$direccion',correo='$email',fechanacimiento='$nacimientoEmpleado'
			where empleado.id='$id'";

			$query = mysqli_query($this->conexion,$sql);

			if($query==true){
				echo 'true';
			}
			else{
				echo mysqli_error($this->conexion);
			}	
		}
		else{
			echo 'emailNO';
		}
	}

	/**
	 * Permite hacer el login de un usuario valido
	 */
	public function loginEmpleado($usuario , $pass)
	{
		$this->conexion = Conectar::conectarBD();

		$sql = "SELECT usuario.rol , empleado.nombres , empleado.correo , usuario.id
		from usuario inner join empleado on usuario.id=empleado.usuario
		where usuario.user='$usuario' and usuario.pass='$pass'";

		$query = mysqli_query($this->conexion,$sql);

		if($query==true){
			if(mysqli_num_rows($query)>=1){
				return $query;
			}
		}
		return 'null';
	}


	public function logOut() {
		session_unset();
		session_destroy();
		session_start();
		session_regenerate_id(true);
	}

	/**
	 * Permite obtener los datos de un empleado dependiendo de su ID
	 */
	public function getDatosEmpleado($ID)
	{

		$this->conexion = Conectar::conectarBD();

		$sql = "SELECT empleado.nombres , empleado.apellido, empleado.documento, empleado.nacionalidad, empleado.correo , empleado.fecharegistro,
						experiencia.empresa , experiencia.cargoocupado,
						estudios.titulo , estudios.instituto,
						experiencia.dictamen , experiencia.observacion , experiencia.entidadmedica,
						usuario.rol
						from empleado 
						inner join experiencia on empleado.id=experiencia.empleado
						inner join estudios on estudios.empleado=empleado.id
						inner join examenes on examenes=empleado=empleado.id
						inner join usuario on usuario.id=empleado.usuario
						where empleado=?";

		$exe = $this->conexion->prepare($sql);
		$exe->bind_param('s',$ID);
		$exe->execute();
		$resultado = $exe->get_result();
		
		if($resultado->num_rows===0)
			exit('null');

		$var = $resultado->fetch_assoc(MYSQLI_ASSOC);
		$exe->close();
		return $var;
		
	}


	/**
	 * Permite obtener el rol de un empleado apartir de su ID
	 */
		 
	 public function getRol($ID)
	 {
		 try{

			 $this->conexion = Conectar::conectarBD();
			 
			 $sql = "SELECT rol from usuario where usuario.id=?";
			 $stam = $this->conexion->prepare($sql);
			 
			 $stam->bind_param('s',$ID);
			 $stam->execute();
			 $resultado = $stam->get_result();
			 
			 if($resultado->num_rows===0)
			  exit('null');
			 
			 $vector = $resultado->fetch_assoc();	
			 $stam->close();
			 return $vector;
		}catch(Exception $e){
			 return "null";	
		}	

	 }

	 /**
		* Permite obtener la imagen de perfil de un empleado
	  */
	 public function getImagenEmpleado($ID)
	 {
		 try{
				$this->conexion = Conectar::conectarBD();
				$IDEmpleado = $this->getEmpleadoID($ID,$this->conexion);
				$sql = "SELECT meta_empleado.src from meta_empleado where meta_empleado.empleado_id=?";

				$stam = $this->conexion->prepare($sql);
				$stam->bind_param('s',$IDEmpleado);
			 	$stam->execute();
			 	$resultado = $stam->get_result();
				 
			 	if($resultado->num_rows===0)
					return "null";
			 
				$imagen = $resultado->fetch_all(MYSQLI_ASSOC);	

				
				$stam->close();
			 	return $imagen;

		 }catch(Exception $e){
				return "null";
		 }
	 }

	 /**
		* 
	  */
	 private function getEmpleadoID($ID,$conexion)
	 {
		try{
      $sql ="SELECT id from empleado where empleado.usuario=?";
      $emp = $conexion->prepare($sql);
      $emp->bind_param("s",$ID);
      $emp->execute();

      $resultado = $emp->get_result();

      if($resultado->num_rows===0)
        return "null";

      $vector = $resultado->fetch_assoc();

      $emp->close();
      return $vector["id"];

    }catch(Exception $e){
      return "null";
    }
	 }

	 /**
		* Permite saber si el usuario tiene una imagen de perfil ya definida
	  */

	 private function getImagenEmpleadoExiste($ID)
	 {
			$this->conexion = Conectar::conectarBD();
			$sql = "SELECT count(meta_empleado.src) as dato from meta_empleado where meta_empleado.empleado_id='$ID'";

			$query = mysqli_query($this->conexion,$sql);
			$restore;

			if($query==true){
				$vec = mysqli_fetch_assoc($query);
				if(!empty($vec)){
					$dato = (int)$vec['dato'];
					if($dato==0){
						$restore = true;
					}
					else{
						$restore = false;
					}
				}
			}

			return $restore;
	 }

	 /**
		* Permite insertar la direccion del SRC de una imagen dentro de la BD
	  */

	 public function uploadImagenEmpleado($ID)
	 {
		 try{
				$this->conexion=Conectar::conectarBD();
				$ID = $ID;
				$imagen = $this->getImagenEmpleadoExiste($ID);
				$sql;
				$src = $this->uploadImagenServer();
				$IDEmpleado = $this->getEmpleadoID($ID,$this->conexion);

				if($imagen==true){
					if(strcmp($src,'null')==0 || strcmp($src,'imgegrande')==0){
						return "imagengrande";
					}
					$sql = "INSERT into meta_empleado 
					(src,empleado_id)
					values
					(?,?)";
					$stm = $this->conexion->prepare($sql);
					$stm->bind_param('ss',$src,$IDEmpleado);
					$stm->execute();
					$stm->close();
					return "insertada";

				}
				else{
					if(strcmp($src,'null')==0 || strcmp($src,'imgegrande')==0){
						return "imagengrande";
					}
					$sql = "UPDATE meta_empleado set src=? where empleado_id=?";
					$stm  = $this->conexion->prepare($sql);
					$stm->bind_param('ss',$src,$IDEmpleado);
					$stm->execute();
					$stm->close();
					return "actualizada";
				}

		 }catch(Exception $e){
				return "null";
		 }
	 }


	 /**
		* Permite subir una imagen de un empleado a el server
	  */
	 private function uploadImagenServer()
	 {
			$nombre_img = $_FILES['imagen']['name'];
			$tipo = $_FILES['imagen']['type'];
			$tamano = $_FILES['imagen']['size'];
				
			//Si existe imagen y tiene un tamaño correcto
				if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 20000000)) 
				{
					//indicamos los formatos que permitimos subir a nuestro servidor
					if (($_FILES["imagen"]["type"] == "image/gif")
					|| ($_FILES["imagen"]["type"] == "image/jpeg")
					|| ($_FILES["imagen"]["type"] == "image/jpg")
					|| ($_FILES["imagen"]["type"] == "image/png"))
					{
						// Ruta donde se guardarán las imágenes que subamos
						$directorio = $_SERVER['DOCUMENT_ROOT'].'/modelo/ERP-Studio/img/upload/';
						// Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
						move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
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


		/**
		 * Permite obtener el menu sgun el rol que haya iniciado sesion
		 */
		public function getMenuRol($ID,$ROL)
		{
			if($ID!=null || $ID!=''){

				if(strcmp($ROL,'admin')==0){
					echo '<nav class="navbar-default" role="navigation">
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="panel_administrativo.php">S. Princes</a>
						</div>
			
						<div id="menu" class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
							<ul class="nav navbar-nav">
								
								<li class="menuItem"><a href="#whatis">Registros</a>
									 <ul id="menuRegistro" class="submenu" style="display:none;">
										 	<li id=""><a href="registrarCliente.php">Registro Cliente</a> </li>
											<li id=""><a href="registrarEmpleado.php">Registro empleado</a> </li>
											<li id=""><a href="registrarProveedor.php">Registro proveedor</a> </li>
										 	<li id=""><a href="registrarProducto.php">Registro producto</a> </li>	
									</ul>	
								</li>
			
								<li class="menuItem"><a href="#useit">Clientes</a>
									<ul id="menuRegistro" class="submenu" style="display:none;">
										 <li id="tablaClienteLink"><a href="">Listar clientes</a> </li>
										 <li id="regClientelink"><a href="">Registrar clientes</a> </li>	
									</ul>
								</li>
			
								<li class="menuItem"><a href="#useit">Empleados</a>
									<ul id="menuRegistro" class="submenu" style="display:none;">
										 <li id="tablaEmpleadoLink"><a href="">Listar empleados</a> </li>
										 <li id="regEmpleadolink"><a href="">Registrar empleados</a> </li>	
									</ul>
								</li>
			
								<li class="menuItem"><a href="#screen">Producto</a>
									<ul id="menuRegistro" class="submenu" style="display:none;">
										 <li id="tablaProductolink"><a href="">Listar productos</a> </li>
										<li id="regProductolink"><a href="">Registrar productos</a> </li>	
									</ul>	
								</li>

								<li class="menuItem"><a href="#screen">Proveedores</a>
									<ul id="menuRegistro" class="submenu" style="display:none;">
										 <li id=""><a href="proveedores.php">Listar Proveedores</a> </li>
									</ul>	
								</li>
								
								<li class="menuItem"><a href="#contact">Usuario!</a>
									<ul id="menuUsuario" class="submenu" style="display:none;">
										<li id="email">'. $_SESSION['email'] .'</li>
										<form action="" method="post">
											<input type="hidden" id="" name="" value="<?php echo $ID; ?>">
											<li id="perfil"><a href="miperfil.php">Mi perfil</a></li>
										</form>
										<form action="">
											<li id="salirAdmin"><a href="">Salir</a></li>
											<input type="hidden" value="'.  $_SESSION['id']. ' " id ="IDadminSalir" name="IDadminSalir">
										</form>
									</ul>
								</li>
							</ul>
						</div>
						 
					</div>
				</nav> ';
			}
			else if(strcmp($ROL,'vendedor')==0){
					echo '<!-- NavBar-->
					<nav class="navbar-default" role="navigation">
						<div class="container">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
									<span class="sr-only">Toggle navigation</span>
								</button>
								<a class="navbar-brand" href="panel_empleado.php">S. Princes</a>
							</div>
				
							<div id="menu" class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
								<ul class="nav navbar-nav">
									
									<li class="menuItem"><a href="#whatis">Ventas</a>
										 <ul id="menuRegistro" class="submenu" style="display:none;">
											 <li id=""><a href="registrarCliente.php">Registro Cliente</a> </li>
											<li id=""><a href="panel_ventas.php">Registro Venta</a> </li>
											<li id=""><a href="mis_ventas.php">Mis ventas</a> </li>
											<li><a href="" data-toggle="modal" data-target="#modal_validarCC">Validar Cedula</a> </li>
										</ul>	
									</li>
				
									<!-- <li class="menuItem"><a href="#useit">Empleados</a>
										<ul id="menuRegistro" class="submenu" style="display:none;">
											 <li id="tablaEmpleadoLink"><a href="">Listar empleados</a> </li>
											<li id="regEmpleadolink"><a href="">Registrar empleados</a> </li>	
										</ul>
									</li> -->
				
									<li class="menuItem"><a href="#screen">Producto</a>
										<ul id="menuRegistro" class="submenu" style="display:none;">
											 <li id="tablaProductolink"><a href="">Listar Producto</a> </li>
											<li id=""><a href="registrarProducto.php">Registrar productos</a> </li>	
										</ul>	
									</li>
									
									<li class="menuItem"><a href="#contact">Usuario!</a>
										<ul id="menuUsuario" class="submenu" style="display:none;">
											<li id="email">'. $_SESSION['email'] . '</li>
											<form action="" method="post">
												<input type="hidden" id="idEmpleadoLogin" name="idEmpleadoLogin" value="'. $_SESSION['id'].' ">
												<li id="perfil"><a href="miperfil.php">Mi perfil</a></li>
											</form>
											<form action="">
												<li id="salirEmpleado"><a href="">Salir</a></li>
												<input type="hidden" value="'. $_SESSION['id'].' " id ="IDempleadoSalir" name="IDempleadoSalir">
											</form>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					</nav> ';
			}
			else if(strcmp($ROL,'contador')==0){
				echo '<!-- NavBar-->
					<nav class="navbar-default" role="navigation">
						<div class="container">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
									<span class="sr-only">Toggle navigation</span>
								</button>
								<a class="navbar-brand" href="panel_contador.php">S. Princes</a>
							</div>
				
							<div id="menu" class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
								<ul class="nav navbar-nav">
									
									<li class="menuItem"><a href="#whatis">Ventas</a>
										 <ul id="menuRegistro" class="submenu" style="display:none;">
											<li id=""><a href="ventas_registradas.php">Ventas Registradas</a></li>
										</ul>	
									</li>
			
									<li class="menuItem"><a href="#screen">Proveedores</a>
										<ul id="menuRegistro" class="submenu" style="display:none;">
											 <li id=""><a href="proveedores.php">Listar Proveedores</a> </li>
										</ul>	
									</li>
									
									<li class="menuItem"><a href="#screen">Pagos</a>
										<ul id="menuRegistro" class="submenu" style="display:none;">
											 <li id=""><a href="pagoEmpleados.php">Pago empleados</a> </li>
											 <li id=""><a href="pagoProveedores.php">Pago proveedores</a> </li>
										</ul>	
									</li>

									<li class="menuItem"><a href="#contact">Usuario!</a>
										<ul id="menuUsuario" class="submenu" style="display:none;">
											<li id="email">'. $_SESSION['email'] . '</li>
											<form action="" method="post">
												<input type="hidden" id="idEmpleadoLogin" name="idEmpleadoLogin" value="'. $_SESSION['id'].' ">
												<li id="perfil"><a href="miperfil.php">Mi perfil</a></li>
											</form>
											<form action="">
												<li id="salirEmpleado"><a href="">Salir</a></li>
												<input type="hidden" value="'. $_SESSION['id'].' " id ="IDempleadoSalir" name="IDempleadoSalir">
											</form>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					</nav> ';
			}
		}
		else{
				header('location:../404.php');
				die();
		}

	}

}
