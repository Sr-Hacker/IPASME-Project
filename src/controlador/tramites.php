<?php

  if (!is_file("modelo/".$pagina.".php")){
    echo "Falta definir la clase ".$pagina;
    exit;
  }

  require_once("modelo/".$pagina.".php");

  if(is_file("vista/".$pagina.".php")){

	  if(!empty($_POST)){
		$tramites = new Tramite();

		  $accion = $_POST['accion'];

		  if($accion=='consultar'){
			 echo  json_encode($tramites->consultar());
		  }
		  else if($accion=='obtienefecha'){
			 echo json_encode($tramites->obtienefecha());
		  }
		  elseif($accion=='eliminar'){
			 $tramites->set_cedula($_POST['cedula']);
			 echo  json_encode($tramites->eliminar());
		  }
		  else{
			  $tramites->set_nombre_apellido($_POST['nombre_apellido']);
        $tramites->set_cedula($_POST['cedula']);
        $tramites->set_rif($_POST['rif']);
        $tramites->set_fecha_nac($_POST['fecha_nac']);
        $tramites->set_vivienda($_POST['vivienda']);
        $tramites->set_automovil($_POST['automovil']);
        $tramites->set_modelo($_POST['modelo']);
        $tramites->set_ano($_POST['ano']);
        $tramites->set_telefono($_POST['telefono']);
        $tramites->set_celular($_POST['celular']);
        $tramites->set_estado_civil($_POST['estado_civil']);
        $tramites->set_tipo_sangre($_POST['tipo_sangre']);
        $tramites->set_talla_camisa($_POST['talla_camisa']);
        $tramites->set_talla_zapato($_POST['talla_zapato']);
        $tramites->set_talla_pantalon($_POST['talla_pantalon']);
        $tramites->set_correo($_POST['correo']);
        $tramites->set_cargo($_POST['cargo']);
        $tramites->set_estatus($_POST['estatus']);

			  if($accion=='incluir'){
				  echo  json_encode($tramites->incluir());
			  }
			  elseif($accion=='modificar'){
				  echo  json_encode($tramites->modificar());
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
