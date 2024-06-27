<?php
  if (!is_file("modelo/".$pagina.".php")){
    echo "Falta definir la clase ".$pagina;
    exit;
  }

  require_once("modelo/".$pagina.".php");

  if(is_file("vista/".$pagina.".php")){

	  if(!empty($_POST)){
		$seguridad = new Seguridad();

		  $accion = $_POST['accion'];

		  if($accion=='consultar'){
			 echo  json_encode($seguridad->consultar());
		  }
		  else if($accion=='obtienefecha'){
			 echo json_encode($seguridad->obtienefecha());
		  }
		  elseif($accion=='eliminar'){
			 $seguridad->set_cedula($_POST['cedula']);
			 echo  json_encode($seguridad->eliminar());
		  }
		  else{
			  $seguridad->set_nombre_apellido($_POST['nombre_apellido']);
        $seguridad->set_cedula($_POST['cedula']);
        $seguridad->set_rif($_POST['rif']);
        $seguridad->set_fecha_nac($_POST['fecha_nac']);
        $seguridad->set_vivienda($_POST['vivienda']);
        $seguridad->set_automovil($_POST['automovil']);
        $seguridad->set_modelo($_POST['modelo']);
        $seguridad->set_ano($_POST['ano']);
        $seguridad->set_telefono($_POST['telefono']);
        $seguridad->set_celular($_POST['celular']);
        $seguridad->set_estado_civil($_POST['estado_civil']);
        $seguridad->set_tipo_sangre($_POST['tipo_sangre']);
        $seguridad->set_talla_camisa($_POST['talla_camisa']);
        $seguridad->set_talla_zapato($_POST['talla_zapato']);
        $seguridad->set_talla_pantalon($_POST['talla_pantalon']);
        $seguridad->set_correo($_POST['correo']);
        $seguridad->set_cargo($_POST['cargo']);
        $seguridad->set_estatus($_POST['estatus']);

			  if($accion=='incluir'){
				  echo  json_encode($seguridad->incluir());
			  }
			  elseif($accion=='modificar'){
				  echo  json_encode($seguridad->modificar());
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
