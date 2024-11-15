$(document).ready(function(){
//VALIDACION DE DATOS
$("#cod_cita").on("keypress",function(e){
  validarkeypress(/^[0-9-\b]*$/,e);
});

$("#cod_cita").on("keyup",function(){
  validarkeyup(/^[0-9]{7,8}$/,$(this),
  $("#m_cod_cita"),"El formato debe ser 9999999 ");
});

	$("#ced_afiliado").on("keypress",function(e){
		validarkeypress(/^[0-9-\b]*$/,e);
	});

	$("#ced_afiliado").on("keyup",function(){
		validarkeyup(/^[0-9]{7,8}$/,$(this),
		$("#m_ced_afiliado"),"El formato debe ser 9999999 ");
	});

	$("#ced_beneficiario").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});

	$("#ced_beneficiario").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$(this),$("#m_ced_beneficiario"),"Solo letras  entre 3 y 30 caracteres");
	});

	$("#detalle").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});

	$("#detalle").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$(this),$("#m_detalle"),"Solo letras  entre 3 y 30 caracteres");
	});
});

//Validación de todos los campos antes del envio
function validarEnvio(){
	if(validarkeyup(/^[0-9]{7,8}$/,$("#cedula"),
		$("#scedula"),"El formato debe ser 9999999")==0){
	    muestraMensaje("La cedula debe coincidir con el formato <br/>"+
						"99999999");
		return false;
	}
	else if(validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$("#apellido"),$("#sapellido"),"Solo letras  entre 3 y 30 caracteres")==0){
		muestraMensaje("Apellidos <br/>Solo letras  entre 3 y 30 caracteres");
		return false;
	}
	else if(validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$("#nombre"),$("#snombre"),"Solo letras  entre 3 y 30 caracteres")==0){
		muestraMensaje("Nombres <br/>Solo letras  entre 3 y 30 caracteres");
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
	$("#cod_cita").val("");
	$("#ced_afiliado").val("");
	$("#cod_especialidad_medico").val("");
  $("#ced_beneficiario").val("");
	$("#fecha").val("");
	$("#hora").val("");
	$("#detalle").val("");
	$("#vigente").val("");
}
