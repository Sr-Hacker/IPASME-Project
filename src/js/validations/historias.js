$(document).ready(function(){
  //VALIDACION DE DATOS
    $("#rif").on("keypress",function(e){
      validarkeypress(/^[0-9-\b]*$/,e);
    });

    $("#rif").on("keyup",function(){
      validarkeyup(/^[0-9]{7,8}$/,$(this),
      $("#m_rif"),"El formato no coincide con un rif");
    });

    $("#nombre").on("keypress",function(e){
      validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
    });

    $("#nombre").on("keyup",function(){
      validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
      $(this),$("#m_nombre"),"Solo letras  entre 3 y 30 caracteres");
    });

    $("#correo").on("keypress",function(e){
      validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
    });

    $("#correo").on("keyup",function(){
      validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
      $(this),$("#m_correo"),"correo electronico no valido");
    });

    $("#telefono").on("keypress",function(e){
      validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
    });

    $("#telefono").on("keyup",function(){
      validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
      $(this),$("#m_telefono"),"Formato de numero telefonoco invalido");
    });
  });

  //Validación de todos los campos antes del envio
  function validarEnvio(){
    // if(validarkeyup(/^[0-9]{7,8}$/,$("#rif"),
    //   $("#m_rif"),"El formato no coincide con un rifz")==0){
    //   return false;
    // }
    // else if(validarkeyup(/^\+?(\d{1,3})?[-.\s]?(\(?\d{1,4}\)?)?[-.\s]?\d{1,4}[-.\s]?\d{1,4}[-.\s]?\d{1,9}$/,
    //   $("#telefono"),$("#m_telefono"),"Solo numeros")==0){

    //   return false;
    // }
    // else if(validarkeyup(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
    //   $("#correo"),$("#m_correo"),"correo electronico no valido")==0){
    //   return false;
    // }
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
    $("#n_historia").val("");
    $("#fecha_registro").val("");
    $("#partida_de_nacimiento").val("");
    $("#acta_de_matrimonio").val("");
    $("#constancia_Trabajo").val("");
  }
