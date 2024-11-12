$(document).ready(function(){
	_get();

//VALIDACION DE DATOS
	$("#ced_afiliado").on("keypress",function(e){
		validarkeypress(/^[0-9-\b]*$/,e);
	});

	$("#ced_afiliado").on("keyup",function(){
		validarkeyup(/^[0-9]{7,8}$/,$(this),
		$("#scedula"),"El formato debe ser 9999999 ");
	});

  $("#primer_nombre").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});

	$("#primer_nombre").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,15}$/,
		$(this),$("#snombres"),"Solo letras  entre 3 y 15 caracteres");
	});

  $("#segundo_nombre").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});

	$("#segundo_nombre").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,15}$/,
		$(this),$("#seg_nombre"),"Solo letras  entre 3 y 15 caracteres");
	});

	$("#primer_apellido").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});

	$("#primer_apellido").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,15}$/,
		$(this),$("#sapellidos"),"Solo letras  entre 3 y 15 caracteres");
	});

  $("#segundo_apellido").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});

	$("#segundo_apellido").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,15}$/,
		$(this),$("#seg_apellidos"),"Solo letras  entre 3 y 15 caracteres");
	});


$("#telefono_celular").on("keypress", function(e) {
    validarkeypress(/^[\d\+\-\s()]*$/, e); // Solo permite caracteres válidos para números de teléfono
});

$("#telefono_celular").on("keyup", function() {
    validarkeyup(/^\+?\d{0,3}?[-.\s]?\(?\d{2,4}\)?[-.\s]?\d{3,4}[-.\s]?\d{4}$/,
   $(this), $("#tlf_celular"), "Ingrese un número de teléfono válido.");
});

$("#telefono_habitacion").on("keypress", function(e) {
  validarkeypress(/^[\d\+\-\s()]*$/, e); // Solo permite caracteres válidos para números de teléfono
});

$("#telefono_habitacion").on("keyup", function() {
  validarkeyup(/^\+?\d{0,3}?[-.\s]?\(?\d{2,4}\)?[-.\s]?\d{3,4}[-.\s]?\d{4}$/,
 $(this), $("#tlf_habitacion"), "Ingrese un número de teléfono válido.");
});

$("#telefono_trabajo").on("keypress", function(e) {
  validarkeypress(/^[\d\+\-\s()]*$/, e); // Solo permite caracteres válidos para números de teléfono
});

$("#telefono_trabajo").on("keyup", function() {
  validarkeyup(/^\+?\d{0,3}?[-.\s]?\(?\d{2,4}\)?[-.\s]?\d{3,4}[-.\s]?\d{4}$/,
 $(this), $("#tlf_trabajo"), "Ingrese un número de teléfono válido.");
});

$("#correo_electronico").on("keyup",function(){
  validarkeyup(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
  $(this),$("#correo"),"correo electronico no valido");
});

$("#rif_institucion").on("keypress",function(e){
	validarkeypress(/^[0-9-\b]*$/,e);
});

$("#rif_institucion").on("keyup",function(){
	validarkeyup(/^[0-9]{7,8}$/,$(this),
	$("#rif"),"El formato debe ser 9999999 ");
});

let fecha = $('#fecha_nacimiento').val().trim();

 if(!fecha.length){
  $('#obligatorio').show();
  return 0;
 }

});

// Función para validar un select
function validarSelect(select, contenedorError, mensajeError) {
  if (select.val() === "" || select.val() === "0") { // Ajusta "0" si tu valor por defecto es diferente
      contenedorError.text(mensajeError);
      return false;
  } else {
      contenedorError.text("");
      return true;
  }
}

// Evento de validación al hacer clic en el botón de enviar
$("#action_modal").on("click", function(event) {
  event.preventDefault();

  // Validar los selectores
  let validSexo = validarSelect($("#sexo"), $("#sexo_error"), "Debe seleccionar una opción para el sexo.");
  let validSituacionLaboral = validarSelect($("#situacion_lavoral"), $("#situacion_laboral_error"), "Debe seleccionar una situación laboral.");
  let validEstadoCivil = validarSelect($("#estado_civil"), $("#estado_civil_error"), "Debe seleccionar un estado civil.");
  let validCargo = validarSelect($("#cargo"), $("#cargo_error"), "Debe seleccionar un cargo.");

  // Comprobar si todos los campos son válidos
  if (validSexo && validSituacionLaboral && validEstadoCivil && validCargo) {
      alert("Formulario validado correctamente.");
      cerrarFormulario(); // Llamada a una función para cerrar el formulario, si es necesario
  } else {
      alert("Por favor, complete todos los campos obligatorios.");
  }
});

//Validación de todos los campos antes del envio
 function validarenvio(){
 	 if(validarkeyup(/^[0-9]{7,8}$/,$("#cedula"),
 	 	$("#scedula"),"El formato debe ser 9999999")==0){
 	     muestraMensaje("La cedula debe coincidir con el formato <br/>"+
 	 					"99999999");
 	 	return false;
 	 }
 	 else if(validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,15}$/,
 	 	$("#apellido"),$("#sapellido"),"Solo letras  entre 3 y 15 caracteres")==0){
 	 	muestraMensaje("Apellidos <br/>Solo letras  entre 3 y 15 caracteres");
 	 	return false;
 	 }
 	else if(validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,15}$/,
 	 	$("#nombre"),$("#snombre"),"Solo letras  entre 3 y 15 caracteres")==0){
 	 	muestraMensaje("Nombres <br/>Solo letras  entre 3 y 15 caracteres");
 		return false;
 	 }

 	return true;
 }

//Funcion que muestra el modal con un mensaje
function muestraMensaje(mensaje){
	$("#contenidodemodal").html(mensaje);
    $("#mostrarmodal").modal("show");
    setTimeout(function() {
      $("#mostrarmodal").modal("hide");
    },5000);
}

//Función para validar por Keypress
function validarkeypress(er,e){
	key = e.keyCode;
  tecla = String.fromCharCode(key);
  a = er.test(tecla);
  if(!a){
		e.preventDefault();
  }
}

//Función para validar por keyup
function validarkeyup(er,etiqueta,etiquetamensaje,
mensaje){
	a = er.test(etiqueta.val());
	if(a){
		etiquetamensaje.text("");
		return 1;
	}
	else{
		etiquetamensaje.text(mensaje);
		return 0;
	}
}

function limpia(){
	$("#ced_afiliado").val("");
	$("#nombre").val("");
	$("#segunado_nombre").val("");
	$("#apellido").val("");
  $("#segunado_apellido").val("");
	$("#fecha_nacimiento").val("");
	$("#fecha_ingreso").val("");
	$("#sexo").val("");
	$("#provincia_estado").val("");
	$("#ciudad").val("");
	$("#direccion").val("");
	$("#numero_casa").val("");
	$("#codigo_postal").val("");
	$("#telefono_celular").val("");
	$("#correo").val("");
	$("#tipo_sangre").val("");
	$("#n_historia").val("");
	$("#rif_institucion").val("");
}


function limpia(){
  $('ced_afiliado').val("");
  $('rif_institucion').val("");
  $('primer_nombre').val("");
  $('segundo_nombre').val("");
  $('primer_apellido').val("");
  $('segundo_apellido').val("");
  $('sexo').val("");
  $('fecha_nacimiento').val("");
  $('estado_civil').val("");
  $('direccion_habitacion').val("");
  $('estado').val("");
  $('ciudad').val("");
  $('municipio').val("");
  $('parroquia').val("");
  $('correo_electronico').val("");
  $('telefono_celular').val("");
  $('telefono_habitacion').val("");
  $('telefono_trabajo').val("");
  $('fecha_ingreso').val("");
  $('cargo').val("");
  $('situacion_laboral').val("");
	$("#postal_institucion").val("");
}
