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


function validarenvio() {
  // Validación de la cédula (número de 7 a 8 dígitos)
  if (validarkeyup(/^[0-9]{7,8}$/, $("#ced_afiliado"), $("#scedula"), "La cédula debe tener entre 7 y 8 dígitos numéricos") == 0) {
    muestraMensaje("La cédula debe tener entre 7 y 8 dígitos numéricos");
    return false;
  }

  // Validación del primer y segundo nombre (solo letras, entre 3 y 15 caracteres)
  if (validarkeyup(/^[A-Za-z\s\u00f1\u00d1\u00E0-\u00FC]{3,15}$/, $("#primer_nombre"), $("#snombres"), "El primer nombre debe contener solo letras, entre 3 y 15 caracteres") == 0) {
    muestraMensaje("El primer nombre debe contener solo letras, entre 3 y 15 caracteres");
    return false;
  }

  if (validarkeyup(/^[A-Za-z\s\u00f1\u00d1\u00E0-\u00FC]{3,15}$/, $("#segundo_nombre"), $("#seg_nombre"), "El segundo nombre debe contener solo letras, entre 3 y 15 caracteres") == 0) {
    muestraMensaje("El segundo nombre debe contener solo letras, entre 3 y 15 caracteres");
    return false;
  }

  // Validación de primer y segundo apellido (solo letras, entre 3 y 15 caracteres)
  if (validarkeyup(/^[A-Za-z\s\u00f1\u00d1\u00E0-\u00FC]{3,15}$/, $("#primer_apellido"), $("#sapellidos"), "El primer apellido debe contener solo letras, entre 3 y 15 caracteres") == 0) {
    muestraMensaje("El primer apellido debe contener solo letras, entre 3 y 15 caracteres");
    return false;
  }

  if (validarkeyup(/^[A-Za-z\s\u00f1\u00d1\u00E0-\u00FC]{3,15}$/, $("#segundo_apellido"), $("#seg_apellidos"), "El segundo apellido debe contener solo letras, entre 3 y 15 caracteres") == 0) {
    muestraMensaje("El segundo apellido debe contener solo letras, entre 3 y 15 caracteres");
    return false;
  }

  // Validación de teléfonos (solo números de 7 a 10 dígitos)
  if (validarkeyup(/^[0-9]{7,10}$/, $("#telefono_celular"), $("#tlf_celular"), "El teléfono celular debe contener entre 7 y 10 dígitos") == 0) {
    muestraMensaje("El teléfono celular debe contener entre 7 y 10 dígitos");
    return false;
  }

  if (validarkeyup(/^[0-9]{7,10}$/, $("#telefono_habitacion"), $("#tlf_habitacion"), "El teléfono de habitación debe contener entre 7 y 10 dígitos") == 0) {
    muestraMensaje("El teléfono de habitación debe contener entre 7 y 10 dígitos");
    return false;
  }

  if (validarkeyup(/^[0-9]{7,10}$/, $("#telefono_trabajo"), $("#tlf_trabajo"), "El teléfono de trabajo debe contener entre 7 y 10 dígitos") == 0) {
    muestraMensaje("El teléfono de trabajo debe contener entre 7 y 10 dígitos");
    return false;
  }

  // Validación de correo electrónico
  if (validarkeyup(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/, $("#correo_electronico"), $("#correo"), "Correo electrónico no válido") == 0) {
    muestraMensaje("El correo electrónico no es válido");
    return false;
  }

  // Validación de campos select
  if ($("#situacion_lavoral").val() === null || $("#situacion_lavoral").val() === "") {
    $("#situacion_laboral_error").text("Debe seleccionar una situación laboral");
    return false;
  }

  if ($("#estado_civil").val() === null || $("#estado_civil").val() === "") {
    $("#estado_civil_error").text("Debe seleccionar un estado civil");
    return false;
  }

  if ($("#cargo").val() === null || $("#cargo").val() === "") {
    $("#cargo_error").text("Debe seleccionar un cargo");
    return false;
  }

  if ($("#sexo").val() === null || $("#sexo").val() === "") {
    $("#sexo_error").text("Debe seleccionar un sexo");
    return false;
  }

  // Validación de rif de la institución (7 a 10 dígitos)
  if (validarkeyup(/^[0-9]{7,10}$/, $("#rif_institucion"), $("#rif"), "El RIF debe contener entre 7 y 10 dígitos numéricos") == 0) {
    muestraMensaje("El RIF debe contener entre 7 y 10 dígitos numéricos");
    return false;
  }

  // Validación de campos de dirección (no vacíos)
  if ($("#estado").val().trim() === "") {
    muestraMensaje("El campo Estado no puede estar vacío");
    return false;
  }

  if ($("#ciudad").val().trim() === "") {
    muestraMensaje("El campo Ciudad no puede estar vacío");
    return false;
  }

  if ($("#municipio").val().trim() === "") {
    muestraMensaje("El campo Municipio no puede estar vacío");
    return false;
  }

  if ($("#parroquia").val().trim() === "") {
    muestraMensaje("El campo Parroquia no puede estar vacío");
    return false;
  }

  if ($("#direccion_habitacion").val().trim() === "") {
    muestraMensaje("El campo Dirección no puede estar vacío");
    return false;
  }

  return true; // Si todas las validaciones se pasan, permitir el envío del formulario
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

function limpia() {
  $("#ced_afiliado").val("");
  $("#primer_nombre").val("");
  $("#segundo_nombre").val("");
  $("#primer_apellido").val("");
  $("#segundo_apellido").val("");
  $("#fecha_nacimiento").val("");
  $("#fecha_ingreso").val("");
  $("#sexo").val("");
  $("#estado").val("");
  $("#ciudad").val("");
  $("#municipio").val("");
  $("#parroquia").val("");
  $("#direccion_habitacion").val("");
  $("#telefono_celular").val("");
  $("#telefono_habitacion").val("");
  $("#telefono_trabajo").val("");
  $("#correo_electronico").val("");
  $("#tipo_sangre").val("");
  $("#situacion_lavoral").val("");
  $("#estado_civil").val("");
  $("#cargo").val("");
  $("#rif_institucion").val("");
}

