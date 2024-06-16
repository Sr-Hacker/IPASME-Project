$(document).ready(function(){
	_get();

//VALIDACION DE DATOS
	$("#codigo").on("keypress",function(e){
		validarkeypress(/^[0-9-\b]*$/,e);
	});

	$("#codigo").on("keyup",function(){
		validarkeyup(/^[0-9]{7,8}$/,$(this),
		$("#scodigo"),"El formato debe ser 9999999 ");
	});


	$("#precio").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});

	$("#precio").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$(this),$("#sprecio"),"Solo letras  entre 3 y 30 caracteres");
	});

	$("#nombre").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});

	$("#nombre").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$(this),$("#snombre"),"Solo letras  entre 3 y 30 caracteres");
	});
});

//Validación de todos los campos antes del envio
function validarenvio(){
	if(validarkeyup(/^[0-9]{7,8}$/,$("#cedula"),
		$("#scedula"),"El formato debe ser 9999999")==0){
	    muestraMensaje("La cedula debe coincidir con el formato <br/>"+
						"99999999");
		return false;
	}
	else if(validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$("#apellidos"),$("#sapellidos"),"Solo letras  entre 3 y 30 caracteres")==0){
		muestraMensaje("Apellidos <br/>Solo letras  entre 3 y 30 caracteres");
		return false;
	}
	else if(validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$("#nombres"),$("#snombres"),"Solo letras  entre 3 y 30 caracteres")==0){
		muestraMensaje("Nombres <br/>Solo letras  entre 3 y 30 caracteres");
		return false;
	}
	else if(validarkeyup(/^(?:(?:1[6-9]|[2-9]\d)?\d{2})(?:(?:(\/|-|\.)(?:0?[13578]|1[02])\1(?:31))|(?:(\/|-|\.)(?:0?[13-9]|1[0-2])\2(?:29|30)))$|^(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00)))(\/|-|\.)0?2\3(?:29)$|^(?:(?:1[6-9]|[2-9]\d)?\d{2})(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:0?[1-9]|1\d|2[0-8])$/,
		$("#fechadenacimiento"),$("#sfechadenacimiento"),"Ingrese una fecha valida")==0){
		muestraMensaje("Fecha de Nacimiento <br/>Ingrese una fecha valida");
		return false;
	}
	else if(!$("#masculino").is(":checked") && !$("#femenino").is(":checked")) {
		muestraMensaje("Sexo <br/>Debe seleccionar el sexo");
		return false;
	}
	else {
		var f1 = new Date(1950,0o1,0o1);
		var f2 = new Date($("#fechadenacimiento").val());

		if(f2 < f1){
			muestraMensaje("Fecha de Nacimiento <br/>La fecha debe ser mayor o igual a 01/01/1950");
			return false;
		}

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
	if($("#masculino").is(":checked")){
		$("#masculino").prop("checked",false);
	}
	else{
	  $("#femenino").prop("checked",false);
	}

	$("#cedula").val("");
	$("#apellidos").val("");
	$("#nombres").val("");
	$("#gradodeinstruccion").prop("selectedIndex",0);
}
