$(document).ready(function(){
	_get();

//VALIDACION DE DATOS
	$("#nombre").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});

	$("#nombre").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$(this),$("#snombres"),"Solo letras  entre 3 y 30 caracteres");
	});
});

//Validación de todos los campos antes del envio
function validarenvio(){
	if(validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
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
	$("#nombre").val("");
	$("#codigo").val("");
}
