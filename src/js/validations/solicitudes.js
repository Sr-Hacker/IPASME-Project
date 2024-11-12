$(document).ready(function(){
  //VALIDACION DE DATOS
    $("#cedula_afiliado").on("keypress",function(e){
      validarkeypress(/^[0-9-\b]*$/,e);
    });

    $("#cedula_afiliado").on("keyup",function(){
      validarkeyup(/^[0-9]{7,8}$/,$(this),
      $("#scedula"),"El formato debe ser 9999999 ");
    });

    $("#apellido").on("keypress",function(e){
      validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
    });

    $("#apellido").on("keyup",function(){
      validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
      $(this),$("#sapellidos"),"Solo letras  entre 3 y 30 caracteres");
    });

    $("#nombre").on("keypress",function(e){
      validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
    });

    $("#nombre").on("keyup",function(){
      validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
      $(this),$("#snombres"),"Solo letras  entre 3 y 30 caracteres");
    });
  });

  //Validación de todos los campos antes del envio
  function validarEnvio(){
    // if(validarkeyup(/^[0-9]{7,8}$/,$("#cedula"),
    // 	$("#scedula"),"El formato debe ser 9999999")==0){
    //     muestraMensaje("La cedula debe coincidir con el formato <br/>"+
    // 					"99999999");
    // 	return false;
    // }
    // else if(validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
    // 	$("#apellido"),$("#sapellido"),"Solo letras  entre 3 y 30 caracteres")==0){
    // 	muestraMensaje("Apellidos <br/>Solo letras  entre 3 y 30 caracteres");
    // 	return false;
    // }
    // else if(validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
    // 	$("#nombre"),$("#snombre"),"Solo letras  entre 3 y 30 caracteres")==0){
    // 	muestraMensaje("Nombres <br/>Solo letras  entre 3 y 30 caracteres");
    // 	return false;
    // }

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
    $("#n_solicitud").val("");
    $("#ced_afiliado").val("");
    $("#cod_tramite").val("");
    $("#estado_solicitud").val("");
    $("#fecha_emision").val("");
    $("#fecha_final").val("");
    $("#condicion_aceptado_denegado").val("");
  }
