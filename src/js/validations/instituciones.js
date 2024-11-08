$(document).ready(function(){
//VALIDACION DE DATOS
	$("#rif_institucion").on("keyup",function(){
		validarkeyup(/^[JGVEP]-\d{8}-\d$/,$(this),
		$("#m_rif_institucion"),"El formato no coincide con un rif");
	});

	$("#cod_estado").on("keypress",function(e){
		validarkeypress(/^[0-9-\b]*$/,e);
	});

	$("#cod_estado").on("keyup",function(){
		validarkeyup(/^[0-9]{4,8}$/,
		$(this),$("#m_cod_estado"),"El formato debe llevar un minimo de 4 digitos");
	});

  $("#nombre").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});

	$("#nombre").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$(this),$("#m_nombre"),"nombre no valido");
	});

  $("#codigo_postal").on("keypress",function(e){
    validarkeypress(/^[0-9-\b]*$/,e);
  });

	$("#codigo_postal").on("keyup",function(){
		validarkeyup(/^\d{4}$/,
		$(this),$("#m_codigo_postal"),"codigo postal no valido");
	});

	$("#correo").on("keyup",function(){
		validarkeyup(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
		$(this),$("#m_correo"),"correo electronico no valido");
	});

	$("#telefono").on("keypress",function(e){
		validarkeypress(/^[0-9-\b]*$/,e);
	});

	$("#telefono").on("keyup",function(){
		validarkeyup(/^0[0-9]{10}$/,
		$(this),$("#m_telefono"),"Formato de numero telefonoco invalido");
	});
});

//Validación de todos los campos antes del envio
function validarEnvio(){
	if(validarkeyup(/^[JGVEP]-\d{8}-\d$/,$("#rif_institucion"),
		$("#m_rif_institucion"),"El formato no coincide con un rif")==0){
		return false;
	}
	else if(validarkeyup(/^0[0-9]{10}$/,
		$("#telefono"),$("#m_telefono"),"formato invalido")==0){
		return false;
	}
	else if(validarkeyup(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
		$("#correo"),$("#m_correo"),"correo electronico no valido")==0){
		return false;
	}
  else if(validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$("#nombre"),$("#m_nombre"),"nombre no valido")==0){
		return false;
	}
  else if(validarkeyup(/^\d{4}$/,
		$("#codigo_postal"),$("#m_codigo_postal"),"codigo postal no valido")==0){
		return false;
	}
	return true;
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
	$("#rif_institucion").val("");
	$("#cod_estado").val("");
	$("#nombre").val("");
	$("#direccion").val("");
	$("#codigo_postal").val("");
	$("#telefono").val("");
	$("#correo").val("");
	$("#tipo_institucion").val("");
}
