$(document).ready(function(){
//VALIDACION DE DATOS
	$("#ced_medico").on("keypress",function(e){
		validarkeypress(/^[0-9-\b]*$/,e);
	});

	$("#ced_medico").on("keyup",function(){
		validarkeyup(/^[0-9]{7,8}$/,$(this),
		$("#m_ced_medico"),"El formato debe ser 9999999 ");
	});

	$("#nombres").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});

	$("#nombres").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$(this),$("#m_nombres"),"Solo letras  entre 3 y 30 caracteres");
	});

	$("#apellidos").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});

	$("#apellidos").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$(this),$("#m_apellidos"),"Solo letras  entre 3 y 30 caracteres");
	});

  $("#telefono").on("keypress",function(e){
		validarkeypress(/^[0-9-\b]*$/,e);
	});

	$("#telefono").on("keyup",function(){
		validarkeyup(/^0[0-9]{10}$/,
		$(this),$("#m_telefono_celular"),"El formato no es valido");
	});
});

//Validación de todos los campos antes del envio
function validarEnvio(){
	if(validarkeyup(/^[0-9]{7,8}$/,$("#ced_medico"),
		$("#m_ced_medico"),"El formato debe ser 9999999")==0){
	    muestraMensaje("La cedula debe coincidir con el formato <br/>"+
						"99999999");
		return false;
	}
	else if(validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$("#nombres"),$("#m_nombres"),"Solo letras  entre 3 y 30 caracteres")==0){
		muestraMensaje("Apellidos <br/>Solo letras  entre 3 y 30 caracteres");
		return false;
	}
	else if(validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$("#apellidos"),$("#m_apellidos"),"Solo letras  entre 3 y 30 caracteres")==0){
		muestraMensaje("Nombres <br/>Solo letras  entre 3 y 30 caracteres");
		return false;
	}
  else if(validarkeyup(/^0[0-9]{10}$/,
		$("#telefono"),$("#m_telefono"),"Solo letras  entre 3 y 30 caracteres")==0){
		muestraMensaje("Nombres <br/>el formato no es valido");
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
  $("#nombres").val("");
	$("#apellidos").val("");
	$("#cedula").val("");
	$("#externo").val("");
  $("#telefono").val("");
}
