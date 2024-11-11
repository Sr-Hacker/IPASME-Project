<?php

  if (!is_file("modelo/".$pagina.".php")){
    echo "Falta definir la clase ".$pagina;
    exit;
  }

  require_once("modelo/".$pagina.".php");

  if(is_file("vista/".$pagina.".php")){

	  if(!empty($_POST)){
		  $solicitudes = new Solicitud();

		  $accion = $_POST['accion'];

		  if($accion=='consultar'){
			  echo json_encode($solicitudes->consultar());
		  }
		  else if($accion=='buscar'){
			  $solicitudes->set_cedula($_POST['buscador']);
        echo json_encode($solicitudes->buscar());
		  }
		  elseif($accion=='eliminar'){
			 $solicitudes->set_id($_POST['n_solicitud']);
			 echo json_encode($solicitudes->eliminar());
		  }
		  else{
        $solicitudes->set_rol($_POST['n_solicitud']);
        $solicitudes->set_name($_POST['ced_afiliado']);
        $solicitudes->set_apellido($_POST['cod_tramite']);
        $solicitudes->set_cedula($_POST['estado_solicitud']);
        $solicitudes->set_telefono($_POST['fecha_emision']);
        $solicitudes->set_contrasena($_POST['fecha_final']);
        $solicitudes->set_rol($_POST['condicion_aceptado_denegado']);

			  if($accion=='incluir'){
				  echo  json_encode($solicitudes->incluir());
			  }
			  elseif($accion=='modificar'){
				  echo  json_encode($solicitudes->modificar());
			  }
		  }
		  exit;
	  }

	  require_once("vista/".$pagina.".php");
  }
  else{
	  echo "pagina en construccion";
  }
?>
