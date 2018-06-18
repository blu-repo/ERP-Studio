'use_strict';

$(document).ready(function(){

    var sw;

    $.validator.addMethod("valueNotEquals", function(value, element, arg){
        return arg !== value;
    }, "Value must not equal arg.");

    // Registro en la base de datos

    $('#formCliente').validate({
        rules:{
            primernombreCliente:{
                required:true
            },
            segundonombreCliente:{
                required: true
            },
            apellidosCliente:{
                required:true
            },
            telefonoCliente:{
                required: true,
                number:true
            },
            documentoCliente:{
                required:true,
                number:true
            },
            direccionCliente:{
                required:true
            },
            emailCliente:{
                required:true,
                email:true
            },
            tipoCliente:{
                valueNotEquals:'...',
                required: true
            }
        },
        messages:{
            primernombreCliente:'Digite el nombre del cliente',
            segundonombreCliente:'Digite el nombre del cliente',
            apellidosCliente:'Digite los apellidos del cliente',
            telefonoCliente:'Digite el telefono de contacto',
            documentoCliente:'Digite el documento del cliente',
            direccionCliente:'Digite la direccion del cliente',
            emailCliente:'Digite el email del cliente',
            tipoCliente:'Seleccione un tipo de Cliente'
        },
        submitHandler: function(form){
            var formulario = $('#formCliente');

            $.ajax({
                url: "../controlador/clienteController.php",
                method:'post',
                data:formulario.serialize(),
                success:function(data){
                    if(data=="true"){
                        successModal("Registro exitoso!","Se registro Correctamente el cliente");
                        limpiarCliente();
                    }
                    else{
                        console.log(data);
                    }
                }
            })
        }
    })

    function limpiarCliente() {
        $('#primernombreCliente').val('')
        $('#segundonombreCliente').val('')
        $('#apellidosCliente').val('')
        $('#telefonoCliente').val('')
        $('#documentoCliente').val('')
        $('#direccionCliente').val('')
        $('#emailCliente').val('')
        $('#tipoCliente').val('')
    }


    $('#formProducto').validate({
        rules:{
            nombreproducto : {
                required:true

            },
            codigoproducto : {
                required:true ,
                 number:true
            },
            colorIDproducto: {
                required:true,
                valueNotEquals:'...'
            },
            telaIDproducto:{
                required:true,
                valueNotEquals: '...'
            },
            proveedorIDProducto:{
                required: true,
                valueNotEquals: '...'
            },
            productoID:{
                required: true,
                valueNotEquals:'...'
            },
            categoriaIDproducto:{
                required:true,
                valueNotEquals: '...'
            },
            observacionProducto:{
                required: true
            },
            tallaproducto:{
                required:true
            },
            cantidadProducto:{
                required:true,
                number:true
            }
        },
        messages: {
            nombreproducto: 'Ingrese nombre del producto',
            codigoproducto: 'Ingrese codigo de referencia del producto',
            colorIDproducto:  'Seleccione un Color',
            telaIDproducto : 'Seleccione un tipo de tela',
            proveedorIDProducto: 'Seleccione un proveedor',
            productoID: 'Seleccione un tipo de producto',
            categoriaIDproducto: 'Seleccione una categoria',
            tallaproducto: 'Digite una talla para registrar',
            precioproducto:'Digite el precio del producto',
            cantidadProducto:'Digite la cantidad del producto'
        },
        submitHandler : function(form){

            var formulario = $('#formProducto');
            console.log('llegamos a registrar');

            $.ajax({
                url: "../controlador/productoController.php",
                method:'post',
                data:formulario.serialize(),
             success : function(data)
                 {
                    console.log(data);
                    if(data=="true"){
                        successModal('Registro Exitoso','El producto se Registro correctamente!');
                        limpiarProducto();
                    }
                    else{
                        errorModal('Error','Se presento un Error al momento de registrar')
                    }
                 }
            });
        }
	});

		function limpiarProducto() {
				$('#nombreproducto').val('')
				$('#codigoproducto').val('')
				$('#colorIDproducto').val('')
				$('#telaIDproducto').val('')
				$('#proveedorIDProducto').val('')
				$('#productoID').val('')
				$('#categoriaIDproducto').val('')
				$('#tallaproducto').val('')
				$('#cantidadProducto').val('')
				$('#precioproducto').val('')
		}


    $('#formCategoria').validate({
        rules:{
            nombrecategoriaM: {
                required : true
            },
            descripcioncategoriaM:{
                required:true
            }
        },
        messages:{
            nombrecategoriaM: 'Digite un nombre de categoria',
            descripcioncategoriaM : 'Digite la descripcion de la categoria'
        },
        submitHandler :function(form){
						var formulario = $('#formCategoria');


            $.ajax({
                url: "../controlador/categoriaController.php",
                method:'post',
                data:formulario.serialize(),
             success : function(data)
                 {
                    if(data=="true"){
                        console.log('bein hecho');
                        successCategoria();
                    }
                    else
                    {
                        if(data=='ya esta registrada'){
                            $('#ajax').addClass('alert alert-warning');
                            $('#ajax').html('La categoria ya se encuentra registrada');
                            setTimeout(function() {
                                $("#ajax").fadeOut(1500);
                                },3000);
                        }else{
                        $('#ajax').html('No se pudo registrar correctamente la categoria0');
                        }
                    }
                 }
            });
        }
    });

    function successCategoria() {
        $('#ajax').addClass('alert alert-info');
        $('#ajax').html('Se registro correctamente la categoria');

        setTimeout(function() {
        $("#ajax").fadeOut(1500);
        },3000);

        $("#nombrecategoriaM").val('');
        $("#descripcioncategoriaM").val('');

        setTimeout(function() {
        $("#agregar_categoria").fadeOut(1500);
        $('#agregar_categoria').modal('hide');
        },3000);
    }


    $('#formTipoArticulo').validate({
        rules:{
            nombrearticuloM:{
                required:true
            },
            descripcionarticuloM:{
                required:true
            }
        },
        messages:{
            nombrearticuloM:' Digite el nombre del articulo',
            descripcionarticuloM: 'Digite la descripcion del articulo'
        },
        submitHandler: function(form){
            var formulario = $('#formTipoArticulo');

            $.ajax({
                url: "../controlador/articuloController.php",
                method:'post',
                data:formulario.serialize(),
             success : function(data)
                 {
                    if(data=="true"){
												console.log('bein hecho');
												$('#ajax_articulo').addClass('alert alert-info');
                        $('#ajax_articulo').html('Se registro correctamente el articulo');

                        setTimeout(function() {
                        $("#ajax_articulo").fadeOut(1500);
                        },3000);

                        $("#nombrearticuloM").val('');
                        $("#descripcionarticuloM").val('');

                        setTimeout(function() {
                        $("#agregar_articulo").fadeOut(1500);
                        $('#agregar_articulo').modal('hide');
                        },3000);
                    }
                    else
                    {
												if(data=="ya se encuentra registrado el articulo"){
													$('#ajax_articulo').addClass('alert alert-warning');
												  $('#ajax_articulo').html('El nombre del articulo ya se encuentra registrado');

													setTimeout(function() {
													$("#ajax_articulo").fadeOut(1500);
													},3000);
												}
												else{
													$('#ajax_articulo').html('No se pudo registrar correctamente el articulo');
												}
                    }
                 }
            });
        }
    })

    $('#formTipoMaterial').validate({

        rules:{
            nombrematerialM:{
            required:true
             },
            descripcionmaterialM:{
            required:true
			 			}
					},
            messages:{
							nombrematerialM: 'Digite el nombre del material',
							descripcionmaterialM: 'Digite el nombre de la descripcion'
            },
            submitHandler: function(form){

            var formulario = $('#formTipoMaterial');

            $.ajax({
            url: "../controlador/materialController.php",
            method:'post',
            data:formulario.serialize(),
            success : function(data)
                {
                if(data=="true"){
                    console.log('bein hecho');
                    successMaterial();
                }
                    else
                    {
                        if(data=="El elemento ya se encuentra registrado"){
                            $('#ajax_material').addClass('alert alert-warning');
                            $('#ajax_material').html('El nombre del material ya se encuentra registrado');

                                setTimeout(function() {
                                $("#ajax_material").fadeOut(1500);
                                },3000);
                        }
                        else{
                            $('#ajax_material').html('No se pudo registrar correctamente el material');
                        }
					}
                }
                });
            }


    })

    $('#formProveedor').validate({
        rules:{
            nombreEmpresaProveedor:{
                required:true
            },
            nitProveedor:{
                required:true
            },
            telefonoproveedor:{
                required:true,
                number:true
            },
            emailempresa:{
                required:true,
                email: true
            },
            direccionEmpresa:{
                required:true
            }
        },
        messages:{
            nombreEmpresaProveedor:'Digite nombre de la empresa',
            nitProveedor:'Digite un NIT correspondiente',
            telefonoproveedor:'Digite el telefono del proveedor',
            emailempresa:'Digite el email de la empresa',
            telefonocontacto:'Digite el telefono de contacto (Personal)',
            direccionEmpresa:'Digite la direccion de la empresa'
            },

            submitHandler: function(form){

            var formulario = $('#formProveedor');
            $.ajax({
                url: "../controlador/proveedorController.php",
                method:'post',
                data:formulario.serialize(),
                success : function(data){
                    if(data=="true"){
                        successModal('Registro Exitoso!','Se registro Correctamente el proveedor <br> Debes Asignar un contacto para el proveedor')
                        limpiarProveedor()
                    }
                    else{
                        errorProveedor(data);
                    }
                }
            })
            }
    })


    $('#formEmpleado').validate({
        rules:{
            primernombreEmpleado:{
                required:true
            },
            segundonombreEmpleado:{
                required:true
            },
            apellidosEmpleado:{
                required:true
            },
            TipoDocumentoEmpleado:{
                required:true,
                valueNotEquals:'...'
            },
            documentoEmpleado:{
                required:true,
                number:true
            },
            nacionalidadEmpleado:{
                required:true,
                valueNotEquals:'...'
            },
            nacimientoEmpleado:{
                required:true
            },
            direccionEmpleado:{
                required:true
            },
            lugarnacimientoEmpleado:{
                required:true
            },
            expedocEmpleado:{
                required:true
            },
            emailempleado:{
                required:true,
                email:true
            },
            rolEmpleado:{
                required:true,
                valueNotEquals:'..'
            }
        },
        messages:{
            primernombreEmpleado:'Digite el nombre del empleado',
            segundonombreEmpleado:'Digite el segundo nombre',
            apellidosEmpleado:'Digite el apellido del empleado',
            TipoDocumentoEmpleado:'Seleccione el tipo de documento',
            documentoEmpleado:'Digite el documento del empleado (Solo numeros)',
            nacionalidadEmpleado:'Seleccione la nacionalidad del empleado',
            nacimientoEmpleado:'Seleccione la fecha de nacimiento',
            lugarnacimientoEmpleado:'Digite el lugar de nacimiento',
            expedocEmpleado:'Digite la fecha de expedicion del documento',
            emailempleado:'Digite el correo del Empleado',
            rolEmpleado:'Seleccione el rol del empleado'
        },
        submitHandler: function(form){
            var formulario = $('#formEmpleado')

            $.ajax({
                url: "../controlador/empleadoController.php",
                method:'post',
                data:formulario.serialize(),
                success : function(data){
                    debugger
                    if(data=="true"){
                        successModal('Registro Exitoso!','Se registro correctamente el empleado!')
                        limpiarEmpleado()
                        console.log(data);
                    }
                    else{
                        // errorModal('Error','El registro no pudo ser completado')
                        // console.log(data);
                        if(data=="emailregistrado"){
                            errorModal('Registro errado','El email del empleado ya esta registrado');
                            $('#emailempleado').val('')
                        }
                        else if(data=="no se pudo registrar el usuario"){
                            errorModal('Registro Errado','No se pudo registrar correctamente <br> Rectifica tus datos')
                        }

                    }
                }
            })
        }
    })

		/**
		 * Funciones Personalizadas
		 */

        function limpiarEmpleado(){
            $('#primernombreEmpleado').val('')
            $('#segundonombreEmpleado').val('')
            $('#apellidosEmpleado').val('')
            $('#TipoDocumentoEmpleado').val('')
            $('#documentoEmpleado').val('')
            $('#nacionalidadEmpleado').val('')
            $('#nacimientoEmpleado').val('')
            $('#lugarnacimientoEmpleado').val('')
            $('#expedocEmpleado').val('')
            $('#emailempleado').val('')
        }

		 function errorProveedor(data) {
			 console.log(data);
		}

        function successMaterial() {
            $('#ajax_material').addClass('alert alert-info');

            $('#ajax_material').html('Se registro correctamente el material');

            setTimeout(function() {
            $("#ajax_material").fadeOut(1500);
            },3000);

            $("#nombrematerialM").val('');
            $("#descripcionmaterialM").val('');

            setTimeout(function() {
            $("#agregar_material").fadeOut(1500);
            $('#agregar_material').modal('hide');
            },3000);
        }

        function limpiarProveedor() {
                $('#nombreEmpresaProveedor').val('')
                $('#nitProveedor').val('')
                $('#telefonoproveedor').val('')
                $('#direccionEmpresa').val('')
                $('#emailempresa').val('')
        }

		function successModal(titulo,cuerpo) {
				$('#modalSuccessTitulo').html(titulo);
				$('#modalSuccessBody').html(cuerpo);
				$('#modalSuccess').modal('show');
				setTimeout(function() {
				$('#modalSuccess').modal('hide');
				},3900);
		}

		function errorModal(titulo,cuerpo) {
			$('#modalErrorTitulo').html(titulo);
			$('#modalErrorBody').html(cuerpo);
			$('#modalError').modal('show');
			setTimeout(function() {
			$('#modalError').modal('hide');
			},3900);
        }


        $('#editarCliente').on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget);
            var id = button.data('id');
            var pnombres=button.data('pnombre')
            var apellidos=button.data('apellidos')
            var documento=button.data('documento')
            var direccion=button.data('direccion')
            var telefono=button.data('telefono')
            var email=button.data('email')

            var modal = $('#editarCliente');

            modal.find('#idCliente').val(id);
            modal.find('#primerNombreClienteED').val(pnombres);
            modal.find('#apellidosClienteED').val(apellidos);
            modal.find('#documentoClienteED').val(documento);
            modal.find('#telefonoClienteED').val(telefono);
            modal.find('#emailClienteED').val(email);

        })


        $('#editarEmpleado').on('show.bs.modal',function(e){

            var button = $(e.relatedTarget)
            var id = button.data('id')
            var pnombres=button.data('nombres')
            var apellidos=button.data('apellidos')
            var documento=button.data('documento')
            var direccion=button.data('direccion')
            var nacionalida=button.data('nacionalidad')
            var email=button.data('email')
            var fecha=button.data('fecha')


            var modal = $('#editarEmpleado');

            modal.find('#idEmpleado').val(id);
            modal.find('#primerNombreEmpleadoED').val(pnombres);
            modal.find('#apellidosEmpleadoED').val(apellidos);
            modal.find('#documentoEmpleaadoED').val(documento);
            modal.find('#nacionalidadEmpleadoED').val(nacionalida);
            modal.find('#correoEmpleadoED').val(email);
            modal.find('#direccionEmpleadoED').val(direccion);
            modal.find('#fechaRegistoEmpleadoED').val(fecha);

        })


				// Falta Terminar eliminar cliente - Modo cascada
        $('#eliminarCliente').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget)
            var id = button.data('id')
            console.log(id);

            var modal = $('#eliminarCliente')
            modal.find('#idClienteElimina').val(id);
        })


        // Ediciones de la base de datos


        $('#formEditarCliente').validate({
            rules:{
                primerNombreClienteED:{
                    required:true
                },
                apellidosClienteED:{
                    required:true
                },
                documentoClienteED:{
                    required:true,
                    number:true
                },
                telefonoClienteED:{
                    required:true,
                    number:true
                },
                emailClienteED:{
                    required:true,
                    email:true
                }
            },
            messages:{
                primerNombreClienteED:'Digite el nombre del cliente',
                apellidosClienteED:'Digite los apellidos del cliente',
                documentoClienteED:'Digite el documento del cliente',
                telefonoClienteED:'Digite el telefono del cliente',
                emailClienteED:'Digite el email del cliente'
            },submitHandler: function(form){
                var data;
                var id = document.getElementById("idCliente").value;
                var primerNombreClienteED = document.getElementById("primerNombreClienteED").value;
                var apellidosClienteED = document.getElementById("apellidosClienteED").value;
                var documentoClienteED = document.getElementById("documentoClienteED").value;
                var telefonoClienteED = document.getElementById("telefonoClienteED").value;
                var emailClienteED = document.getElementById("emailClienteED").value;
                var editar = 1;

                $.ajax({
                    url: "../archivos/AjaxController.php",
                    method:'POST',
                    data:{id:id , primerNombreClienteED: primerNombreClienteED , apellidosClienteED:apellidosClienteED,
                    documentoClienteED:documentoClienteED, telefonoClienteED:telefonoClienteED , emailClienteED:emailClienteED,
                    editar:editar},
                    success : function(data){
                        if(data=="true"){
                            successAjaxDiv('#ajax_editarCliente','Se actualizaron los datos del cliente','#editarCliente','alert alert-info',data)
                        }
                        else{
                            if(data=="emailregistradocliente"){
                                successAjaxDiv('#ajax_editarClienteError','El Email del cliente ya se encuentra registrado','#editarCliente','alert alert-danger','false')
                            }
                            else{
                                successAjaxDiv('#ajax_editarClienteError','Error al conectar con la base de datos','#editarCliente','alert alert-danger','false')
                            }
                        }

                    }
                })
            }
		})

				// Falta terminar Eliminar cliente
        $('#formEliminarCliente').submit(function(event){
            event.preventDefault();

            var id = document.getElementById("idClienteElimina").value;
            var editar = 2;
            $.ajax({
                url: "../archivos/AjaxController.php",
                method: 'POST',
                data: {editar:editar , id:id},
                success : function(form){

                }
            })
        })

        function successAjaxDiv(div,contenido,modal,clase,data) {
        	$(div).addClass(clase);
        	$(div).html(contenido);
          if(data=="true"){

                setTimeout(function() {
                $(div).fadeOut(1500);
                },3000);

                setTimeout(function() {
                $(modal).fadeOut(1500);
                $(modal).modal('hide');
                },3000);
            }
            else{
                setTimeout(function() {
                $(div).fadeOut(1500);
                },3000);

            }

        	$(div).css('display','block');
        }

      $('#formEstudiosEmpleado').validate({
        rules:{
          Instituto:{
            required:true
          },
          Titulo:{
            required:true
          },
          aniosalida:{
            required:true
          }
        },
        messages:{
          Instituto:'Digite el nombre del Instituto',
          Titulo:'Digite el nombre del titulo obtenido',
          aniosalida:'Seleccione la fecha de terminacion'
        },
        submitHandler: function(form){

          var id = document.getElementById("idEmpleadoeEstudios").value;
          var Instituto = document.getElementById("Instituto").value;
          var titulo = document.getElementById("Titulo").value;
          var salid = document.getElementById("aniosalida").value;
          var editar = 3;
          console.log(salid);

          $.ajax({
              url: "../archivos/AjaxController.php",
              method: 'POST',
              data: {id:id,editar:editar,Instituto:Instituto,titulo:titulo,salid:salid},
              success : function(data){
                if(data=="true"){
                    successAjaxDiv('#ajax_editarEmpleadoEstudios','Se registro correctamente los estudios','#agregar_estudios','alert alert-info',data)
                    $('#Instituto').val('')
                    $('#Titulo').val('')
                    $('#aniosalida').val('')     
                }
                else{
                    successAjaxDiv('#ajax_errorEmpleadoEstudios','No se realizo el registro con Exito','#agregar_estudios','alert alert-warning','false')
                }  
              }
          })
        }
      })



      $('#formExamenEmpleado').validate({
        rules:{
          entidadmedica:{
            required:true
          },
          dictamen:{
            required:true
          },
          fecharealizacionExamen:{
            required:true
          },
          observacionExamen:{
              required:true
          },
          telefonoEntidad:{
              required:true,
              number:true
          },
          direccionEntidad:{
              required:true
          }
        },
        messages:{
          entidadmedica:'Digite el nombre de la entidad',
          dictamen:'Digite el dictamen del diagnostico',
          fecharealizacionExamen:'Seleccione la fecha de realizacion del examen',
          observacionExamen:'Digite alguna observacion',
          telefonoEntidad:'Digite el telefono donde se practico el examen',
          direccionEntidad:'Digite la direccion de la entidad'
        },
        submitHandler: function(form){

          var id = document.getElementById("idEmpleadoExamenes").value;
          var entidadmedica = document.getElementById("entidadmedica").value;
          var dictamen = document.getElementById("dictamen").value;
          var fecharealizacionExamen = document.getElementById("fecharealizacionExamen").value;
          var telefonoEntidad = document.getElementById("telefonoEntidad").value;
          var observacionExamen = document.getElementById("observacionExamen").value;
          var direccionEntidad = document.getElementById("direccionEntidad").value;
          var editar = 4;

          $.ajax({
              url: "../archivos/AjaxController.php",
              method: 'POST',
              data: {id:id,editar:editar,entidadmedica:entidadmedica,dictamen:dictamen,fecharealizacionExamen:fecharealizacionExamen,telefonoEntidad:telefonoEntidad,direccionEntidad:direccionEntidad,observacionExamen:observacionExamen},
              success : function(data){
                if(data=="true"){
                    successAjaxDiv('#ajax_examenEmpleado','Se registro correctamente el examen','#agregar_examen','alert alert-info',data)     
                }
                else{
                    successAjaxDiv('#ajax_errorExamenEmpleado','No se realizo el registro con Exito','#agregar_examen','alert alert-warning','false')
                }  
              }
            })
          }
      })


      $('#formPensionEmpleado').validate({
        rules:{
          empresaPensionEmpleado:{
            required:true,
            valueNotEquals:'...'
          }
        },
        messages:{
          empresaPensionEmpleado:'Seleccione una entidad de pension valida'
        },
        submitHandler: function(form){

          var id = document.getElementById("empresaPensionEmpleado").value;
          var id_empleado = document.getElementById("idEmpleadoPension").value;
          var editar = 5;
          

          $.ajax({
              url: "../archivos/AjaxController.php",
              method: 'POST',
              data: {id:id,id_empleado:id_empleado,editar:editar},
              success : function(data){
                  if(data=="true"){
                      successAjaxDiv('#ajax_pensionempleado','Se agrego correctamente la pension','#agregar_pension','alert alert-info',data)
                  }else{
                    successAjaxDiv('#ajax_errorpensionempleado','No se registro correctamente la pension','#agregar_pension','alert alert-warning','false')
                  }
              }
            })
          }
      })


      $('#formEmpleadoEdicion').validate({
        rules:{
            nombresEmpleadoEditar:{
                required:true
            },
            apellidosEmpleadoEditar:{
                required:true
            },
            documentoEmpleadoEdicion:{
                required:true
            },
            nacimientoEmpleadoEditar:{
                required:true,
                date:true
            },
            direccionEmpleadoEditar:{
                required:true
            },
            lugarnacimientoEmpleadoEditar:{
                required:true
            },
            emailempleado:{
                required:true,
                email:true
            }
        },
        messages:{
            nombresEmpleadoEditar:'Digite los nombres del empleado',
            apellidosEmpleadoEditar:'Digite los apellidos de los empleados',
            documentoEmpleadoEdicion:'Digite el documento del empleado',
            nacimientoEmpleadoEditar:'Seleccione la fecha del empleado',
            direccionEmpleadoEditar:'Digite la direccion del empleado',
            lugarnacimientoEmpleadoEditar:'Digite el lugar de nacimiento del empleado',
            emailempleado:'Digite el email del empleado de forma correcta'
        },
        submitHandler: function(form){
            var id = document.getElementById("idEmpleadogeneral").value;
            var nombresEmpleadoEditar = document.getElementById("nombresEmpleadoEditar").value;
            var apellidosEmpleadoEditar = document.getElementById("apellidosEmpleadoEditar").value;
            var documentoEmpleadoEdicion = document.getElementById("documentoEmpleadoEdicion").value;
            var direccionEmpleadoEditar = document.getElementById("direccionEmpleadoEditar").value;
            var lugarnacimientoEmpleadoEditar = document.getElementById("lugarnacimientoEmpleadoEditar").value;
            var emailempleadoEditar = document.getElementById("emailempleadoEditar").value;
            var nacimientoEmpleadoEditar = document.getElementById("nacimientoEmpleadoEditar").value;
            
            
            var editar = 6;
            $.ajax({
              url: "../archivos/AjaxController.php",
              method: 'POST',
              data: {id:id,nombresEmpleadoEditar:nombresEmpleadoEditar,
                    editar:editar,apellidosEmpleadoEditar:apellidosEmpleadoEditar,
                    documentoEmpleadoEdicion:documentoEmpleadoEdicion,
                    direccionEmpleadoEditar:direccionEmpleadoEditar,
                    lugarnacimientoEmpleadoEditar:lugarnacimientoEmpleadoEditar,
                    emailempleadoEditar:emailempleadoEditar,
                    nacimientoEmpleadoEditar:nacimientoEmpleadoEditar},
              success : function(data){
                  if(data=="true"){
                    successModal('Datos actualizados','Se actualizaron correctamente los datos')
                  }else{
                      if(data=='emailNO'){
                        errorModal('Error','El email del empleado se encuentra registrado')
                      }
                      else{
                        errorModal('Error','No se actualizaron de manera correcta los datos')
                     }
                    //  console.log(data);
                     
                  }
              }
            })
        }
      })


    $('#editarProducto').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget);

        var id = button.data('id');
        var nombre=button.data('nombre')
        var referencia=button.data('referencia')
        var precio=button.data('precio')
        var talla=button.data('talla')
        
        var modal = $('#editarProducto');

        modal.find('#idProducto').val(id);
        modal.find('#nombreProductoEditar').val(nombre);
        modal.find('#referenciaProductoEditar').val(referencia);
        modal.find('#precioProductoEditar').val(precio);
        modal.find('#tallaProductoEditar').val(talla);

    })


    $('#formEditarProducto').validate({
        rules:{
            nombreProductoEditar:{
                required:true
            },
            referenciaProductoEditar:{
                required:true,
                number:true
            },
            precioProductoEditar:{
                required:true,
                number:true
            },
            tallaProductoEditar:{
                required:true,
                maxlength: 3
            }
        },
        messages:{
            nombreProductoEditar:'Digite el nombre del producto',
            referenciaProductoEditar:'Digite la referencia del producto',
            precioProductoEditar:'Digite el precio del producto (Unidad)',
            tallaProductoEditar:'Digite la Talla del producto'
        },
        submitHandler: function(form){
              
            var id = document.getElementById("idProducto").value;
            var nombreProductoEditar = document.getElementById("nombreProductoEditar").value;
            var referenciaProductoEditar = document.getElementById("referenciaProductoEditar").value;
            var precioProductoEditar = document.getElementById("precioProductoEditar").value;
            var tallaProductoEditar = document.getElementById("tallaProductoEditar").value;
            
            $.ajax({
                url: "../archivos/AjaxController.php",
                method: 'POST',
                data:{id:id,
                    nombreProductoEditar:nombreProductoEditar,
                    referenciaProductoEditar:referenciaProductoEditar,
                    precioProductoEditar:precioProductoEditar,
                    tallaProductoEditar:tallaProductoEditar,
                    editar:7
                },
                success : function(data){
                    if(data=="true")
                    {
                        successAjaxDiv('#ajax_editarProducto','Se actualizaron correctamente los datos','#editarProducto','alert alert-info',data)
                    }
                    else{
                        console.log(data);
                        
                        // successAjaxDiv('#ajax_editarProductoError','No se actualizaron los datos del producto','#editarProducto','alert alert-warning','false')
                    }
                }
            })
        }
    })


    $('#loginForm').validate({
        rules:{
            InputEmail:{
                required:true
            },
            InputPassword:{
                required:true
            }
        },
        messages:{
            InputEmail:'Digite su correo o su usuario',
            InputPassword:'Digite alguna contraseña'
        },
        submitHandler : function(form){
            var email = document.getElementById('InputEmail').value;
            var pass = document.getElementById('InputPassword').value;
            
            $.ajax({
                url: "archivos/AjaxController.php",
                method: 'POST',
                data: {email:email,pass:pass,editar:8},
                success : function(data){
                    if(data=='admin'){
                        window.location.href="../ERP-Studio/views/panel_administrativo.php";
                    }
                    else if(data=='vendedor'){
                        window.location.href = "../ERP-Studio/views/panel_empleado.php"
                        limpiarLogin()
                    }
                    else if(data=='contador'){
                        window.location.href ="../ERP-Studio/views/panel_contador.php";
                        limpiarLogin()
                    }
                    else if(data=='noregistrado'){
                        successAjaxDiv('#ajax_error','No se encuentra registrado','#modal_login','alert alert-warning','false')
                        limpiarLogin()
                    }
                    else if(data=='novalido'){
                        successAjaxDiv('#ajax_error','No puedes ingresar con tu rol','#modal_login','alert alert-warning','false')
                        limpiarLogin()
                    }
                    else{
                        console.log(data);
                    }
                }
            })
        }
    })

    function limpiarLogin() {
         $('#InputEmail').val('')
         $('#InputPassword').val('')
    }    


    $('#formValidar').validate({
        rules:{
            clienteCC:{
                required:true
            }
        },
        messages:{
            clienteCC:'Digite el documento del cliente'
        },
        submitHandler:function(form){
            
            var cc = document.getElementById('clienteCC').value;
            
            $.ajax({
                url:'../archivos/AjaxController.php',
                method:'post',
                data:{cc:cc,editar:9},
                success : function(data){
                    if(data=='valido'){
                      successAjaxDiv('#ajax_successValidar','El cliente se encuentra registrado','#modal_validarCC','alert alert-info','true')
                      $('#clienteCC').val('')
                    }else if (data=='novalido') {
                      successAjaxDiv('#ajax_errorValidar','El cliente no se encuentra registrado','#modal_validarCC','alert alert-warning','false')
                      $('#clienteCC').val('')
                    }
                } 
            })
        }
    })

    


    $('#formVentaEmpleado').validate({
        rules:{
            documentoClienteVenta:{
                required:true
            },
            modopago:{
                required:true,
                valueNotEquals:'...'
            }
        },
        messages:{
            documentoClienteVenta:'Digite la referencia del producto',
            modopago:'Seleccione un modo de pago'
        },
        submitHandler:function(form){
             
             var documentoClienteVenta  = document.getElementById('documentoClienteVenta').value;
             var modopago  = document.getElementById('modopago').value;
             var idEmpleadoVenta  = document.getElementById('idEmpleadoVenta').value;
            
            $.ajax({
                url:'../archivos/AjaxController.php',
                method:'POST',
                data:{idEmpleadoVenta:idEmpleadoVenta,
                    documentoClienteVenta:documentoClienteVenta,
                    modopago:modopago,
                    editar:10},
                success:function(data){
                   console.log(data);
                    if(data=="nocreada"){
                        errorModal('Error','No hay articulos agregados a la venta')
                    }else if(data=="null"){
                        errorModal('Error','Error al conectar con la Base de datos')
                    }
                    // if(data=="exitoso"){
                    //     successModal('Registro Exitoso','Se registro correctamente la venta')
                    // }else if(data=="empleadonoregistrado"){
                    //     errorModal('Error de venta','El cliente no se encuentra registrado')
                    // }
                    // else{
                    //     errorModal('Error','No se concreto la venta de manera correcta')
                    // }
                }
            })
        }
    })

    /**
     * Subir imagen de perfil para el usuario
     */
    $('#formSubir').submit(function(event){
        
       event.preventDefault();
       var fileInput = document.getElementById('imagen'); 
       var id = document.getElementById('id_emp').value; 
       var file = fileInput.files[0];
       var envio = new FormData();
        envio.append('imagen',file);
        envio.append('editar',11);
        envio.append('id',id)

       $.ajax({
           url:'../archivos/AjaxController.php',
           method:'post',
           contentType: false,
           data:envio,
           processData: false,
           cache: false,
           success : function(data){
            if(data=="insertada"){
                successModal('Se inserto correctamente la Imagen','Se inserto correctamente la imagen de perfil');
            }
            else if(data=="actualizada"){
                successModal('Se actualizo correctamente la Imagen','Se actualizo correctamente la imagen de perfil');
            }
            else if(data=="imagengrande"){
                errorModal('Error','La imagen es muy grande o no cumple con un formato valido');
            }
           }        
       })
    })
    
    $('#salirEmpleado').on('click',function(event){
        event.preventDefault();
         
        var id = document.getElementById('IDempleadoSalir').value;
        
        $.ajax({
            url:'../archivos/AjaxController.php',
            method:'post',
            data:{id:id,editar:12},
            success:function(data){
                if(data=='index'){
                    window.location.href="../index.php"
                }
                else{

                }
            }
        })
    })

    $('#salirAdmin').on('click',function(event){
        event.preventDefault();
         
        var id = document.getElementById('IDadminSalir').value;
        
        $.ajax({
            url:'../archivos/AjaxController.php',
            method:'post',
            data:{id:id,editar:13},
            success:function(data){
                if(data=='index'){
                    window.location.href="../index.php"
                }
                else{

                }
            }
        })
    })
    
    
    $('#formEditarEmpresa').validate({
        rules:{
            nombreEmpresaProveedor:{
                required:true
            },
            nitProveedor:{
                required:true,
                number:true
            },
            telefonoproveedor:{
                required:true,
                number:true
            },
            direccionEmpresa:{
                required:true
            },
            emailempresa:{
                required:true,
                email:true
            }
        },
        messages:{
            nombreEmpresaProveedor:'Nombre de empresa vacio',
            nitProveedor:'NIT de empresa vacio',
            telefonoproveedor:'Telefono de proveedor vacio',
            direccionEmpresa:'Direccion de proveedor vacio',
            emailempresa:'Email de proveedor vacio'
        },
        submitHandler : function(form){
            
            var idproveedorEditar =  $('#formEditarEmpresa').find('#idproveedorEditar').val()
            var nombreEmpresaProveedorEditar = document.getElementById('nombreEmpresaProveedorEditar').value
            var telefonoproveedor = $('#formEditarEmpresa').find('#telefonoproveedorEditar').val()
            var nitProveedor = $('#formEditarEmpresa').find('#nitProveedorEditar').val()
            var emailempresa = $('#formEditarEmpresa').find('#emailempresaEditar').val()
            var direccionEmpresa = $('#formEditarEmpresa').find('#direccionEmpresaEditar').val()

            $.ajax({
                url:'../archivos/AjaxController.php',
                method:'post',
                data:{idproveedorEditar:idproveedorEditar,
                    nombreEmpresaProveedorEditar:nombreEmpresaProveedorEditar,
                    telefonoproveedor:telefonoproveedor,
                    nitProveedor:nitProveedor,
                    emailempresa:emailempresa,
                    direccionEmpresa:direccionEmpresa,
                    editar:14},
                success:function(data){
                    if(data=="true"){
                        successModal('Actualizacion exitosa','Se actualizaron de manera correcta los datos')
                    }else if(data=="false"){
                        errorModal('Error','No se actualizaron los datos de manera correcta')
                    }
                }
            })
        }
    })

    $('#editarContactoProveedor').validate({
        rules:{
            nombreContacto:{
                required:true
            },
            documentoContacto:{
                required:true,
                number:true
            },
            direccionContacto:{
                required:true
            },
            telefonoContacto:{
                required:true,
                number:true
            },
            emailContacto:{
                required:true,
                email:true
            }
        },
        messages:{
            nombreContacto:'Digite un nombre de contacto valido',
            documentoContacto:'Digite el documento valido (Solo numeros)',
            direccionContacto:'Digite la direccion de manera correcta',
            telefonoContacto:'Digite un telefono valido',
            emailContacto:'Digite una direccion de correo valida'
        },
        submitHandler:function(form){

             var IDproveedorContacto  = $('#editarContactoProveedor').find('#IDproveedorContacto').val()
             var nombreContacto  = document.getElementById('nombreContacto').value
             var documentoContacto  = $('#editarContactoProveedor').find('#documentoContacto').val()
             var direccionContacto  = $('#editarContactoProveedor').find('#direccionContacto').val()
             var telefonoContacto  = $('#editarContactoProveedor').find('#telefonoContacto').val()
             var emailContacto  = $('#editarContactoProveedor').find('#emailContacto').val()
             var accionContacto  = $('#editarContactoProveedor').find('#accionContacto').val()
             console.log(nombreContacto);
                

            $.ajax({
                url:'../archivos/AjaxController.php',
                method:'POST',
                data:{nombreContacto:nombreContacto,
                    IDproveedorContacto:IDproveedorContacto,
                    documentoContacto:documentoContacto,
                    direccionContacto:direccionContacto,
                    telefonoContacto:telefonoContacto,
                    emailContacto:emailContacto,
                    accionContacto:accionContacto,
                    editar:15},
                success:function(data){
                    console.log(data);
                    
                    if(data=='insertada'){
                        successAjaxDiv('#ajax_editarContacto','Se registro correctamente el contacto','#editarContacto','alert alert-info',"true");
                        window.location.href="../views/proveedores.php";
                    }else if(data=='actualizada'){
                        successAjaxDiv('#ajax_editarContacto','Se actualizaron los datos de contacto','#editarContacto','alert alert-info',"true")
                        window.location.href="../views/proveedores.php";
                    }else if(data=="noinsertada" || data=='noactualizada'){
                        successAjaxDiv('#ajax_editarContactoError','No se registro correctamente los datos','#editarContacto','alert alert-warning',"false")
                    }
                }
            })
        }
    })

    
    $('#formEditarProductoPage').validate({
        rules:{
            nombreproductoEditar : {
                required:true

            },
            codigoproductoEditar : {
                required:true, 
                number:true
            },
            colorIDproductoEditar: {
                required:true,
                valueNotEquals:'...'
            },
            telaIDproductoEditar:{
                required:true,
                valueNotEquals: '...'
            },
            proveedorIDProductoEditar:{
                required: true,
                valueNotEquals: '...'
            },
            productoIDEditar:{
                required: true,
                valueNotEquals:'...'
            },
            categoriaIDproductoEditar:{
                required:true,
                valueNotEquals: '...'
            },
            precioproductoEditar:{
                required: true,
                number:true
            },
            tallaproductoEditar:{
                required: true
            }
        },
        messages: {
            nombreproductoEditar: 'Ingrese nombre del producto',
            codigoproductoEditar: 'Ingrese codigo de referencia del producto',
            colorIDproductoEditar:  'Seleccione un Color',
            telaIDproductoEditar : 'Seleccione un tipo de tela',
            proveedorIDProductoEditar: 'Seleccione un proveedor',
            productoIDEditar: 'Seleccione un tipo de producto',
            categoriaIDproductoEditar: 'Seleccione una categoria',
            precioproductoEditar: 'Digite el precio del producto',
            tallaproductoEditar: 'Digite la talla del producto'
        },
        submitHandler : function(form){

            
            var ideProductoEditarVal = $('#formEditarProductoPage').find('#ideProductoEditarVal').val()
            var nombreproductoEditar = document.getElementById('nombreproductoEditar').value
            var codigoproductoEditar = document.getElementById('codigoproductoEditar').value
            var colorIDproductoEditar = document.getElementById('colorIDproductoEditar').value
            var telaIDproductoEditar = document.getElementById('telaIDproductoEditar').value
            var proveedorIDProductoEditar = document.getElementById('proveedorIDProductoEditar').value
            var productoIDEditar = document.getElementById('productoIDEditar').value
            var categoriaIDproductoEditar = document.getElementById('categoriaIDproductoEditar').value
            var precioproductoEditar = document.getElementById('precioproductoEditar').value
            var tallaproductoEditar = document.getElementById('tallaproductoEditar').value

            

            $.ajax({
                url: "../archivos/AjaxController.php",
                method:'POST',
                data:{ideProductoEditarVal:ideProductoEditarVal,
                    nombreproductoEditar:nombreproductoEditar,
                    codigoproductoEditar:codigoproductoEditar,
                    colorIDproductoEditar:colorIDproductoEditar,
                    telaIDproductoEditar:telaIDproductoEditar,
                    proveedorIDProductoEditar:proveedorIDProductoEditar,
                    productoIDEditar:productoIDEditar,
                    categoriaIDproductoEditar:categoriaIDproductoEditar,
                    precioproductoEditar:precioproductoEditar,
                    tallaproductoEditar:tallaproductoEditar,
                    editar:16},
             success : function(data)
                 {
                    if(data=="true"){
                        successModal('Actualizacion Exitosa','Se actualizo de manera correcta el producto')
                    }
                    else if(data=="false"){
                        errorModal('Error','No se actualizo de manera correcta el producto')
                    }
                    else{
                        errorModal('Error','No se actualizo de manera correcta el producto')
                    }
                 }
            });
        }
    });
    

    $('#formImagenProducto').submit(function(event){
        
        event.preventDefault();
        var fileInput = document.getElementById('imagenProducto'); 
        var id = document.getElementById('id_pro').value; 
        var file = fileInput.files[0];
        var envio = new FormData();
         envio.append('imagenProducto',file);
         envio.append('editar',17);
         envio.append('id',id)
 
        $.ajax({
            url:'../archivos/AjaxController.php',
            method:'post',
            contentType: false,
            data:envio,
            processData: false,
            cache: false,
            success : function(data){
                console.log(data);
                
             if(data=='true'){
                 successModal('Registro Exitoso','Se registro la imagen de manera correcta')
             }else if(data=='tope'){
                successModal('Cantidad Maxima','Se supero la cantidad maxima de imagenes por producto')
             }else if(data=='false'){
                successModal('Registro Errado','No se registro de manera correcta la imagen')
             }else{
                 successModal('Error','Ocurrio un error, verifica el formato de la imagen y el tamaño')
             }
            }        
        })
     })
})