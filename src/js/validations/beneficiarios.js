$(document).ready(function(){
	_get();

//VALIDACION DE DATOS
	$("#ced_beneficiario").on("keypress",function(e){
		validarkeypress(/^[0-9-\b]*$/,e);
	});

	$("#ced_beneficiario").on("keyup",function(){
		validarkeyup(/^[0-9]{6,8}$/,$(this),
		$("#m_ced_beneficiario"),"El formato debe ser una cedula valida de 6 a 8 digitos");
	});

	$("#ced_afiliado").on("keypress",function(e){
		validarkeypress(/^[0-9-\b]*$/,e);
	});

	$("#ced_afiliado").on("keyup",function(){
		validarkeyup(/^[0-9]{6,8}$/,$(this),
    $("#m_ced_afiliado"),"El formato debe ser una cedula valida de 6 a 8 digitos");
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

  $("#fecha_nacimiento").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});

	$("#fecha_nacimiento").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$(this),$("#m_fecha_nacimiento"),"Solo letras  entre 3 y 30 caracteres");
	});

  $("#sexo").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});

	$("#sexo").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$(this),$("#m_sexo"),"Solo letras  entre 3 y 30 caracteres");
	});

  $("#parentesco").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});

	$("#parentesco").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$(this),$("#m_parentesco"),"Solo letras  entre 3 y 30 caracteres");
	});

  $("#estado_civil").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});

	$("#estado_civil").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$(this),$("#m_estado_civil"),"Solo letras  entre 3 y 30 caracteres");
	});

	$("#direccion").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$(this),$("#m_direccion"),"Solo letras  entre 3 y 30 caracteres");
	});

  $("#telefono_celular").on("keypress",function(e){
		validarkeypress(/^[0-9-\b]*$/,e);
	});

	$("#telefono_celular").on("keyup",function(){
		validarkeyup(/^0[0-9]{10}$/,
		$(this),$("#m_telefono_celular"),"El formato no es valido");
	});
});

//Validación de todos los campos antes del envio
function validarEnvio(){
	if(validarkeyup(/^[0-9]{7,8}$/,$("#ced_beneficiario"),
		$("#m_ced_beneficiario"),"El formato debe ser 9999999")==0){
	    muestraMensaje("La cedula debe coincidir con el formato <br/>"+
						"99999999");
		return false;
	}
  else if(validarkeyup(/^[0-9]{7,8}$/,$("#ced_afiliado"),
    $("#m_ced_afiliado"),"El formato debe ser 9999999")==0){
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
		$("#telefono_celular"),$("#m_telefono_celular"),"Solo letras  entre 3 y 30 caracteres")==0){
		muestraMensaje("Nombres <br/>el formato no es valido");
		return false;
	}
  else if($("#estado_civil").val() === null || $("#estado_civil").val() === "") {
    $("#m_estado_civil").text("Debe seleccionar un estado civil");
    return false;
  }
  else if($("#sexo").val() === null || $("#sexo").val() === "") {
    $("#m_sexo").text("Debe seleccionar un sexo");
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
	$("#ced_beneficiario").val("");
	$("#ced_afiliado").val("");
	$("#nombres").val("");
	$("#apellidos").val("");
	$("#fecha_nacimiento").val("");
	$("#sexo").val("");
	$("#parentesco").val("");
	$("#estado_civil").val("");
	$("#direccion").val("");
	$("#telefono_celular").val("");
}
