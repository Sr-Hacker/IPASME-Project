<?php

  if (!is_file("modelo/".$pagina.".php")){
    echo "Falta definir la clase ".$pagina;
    exit;
  }

  require_once("modelo/".$pagina.".php");

  if(is_file("vista/".$pagina.".php")){

	  if(!empty($_POST)){
		$citas = new Cita();

		  $accion = $_POST['accion'];

		  if($accion=='consultar'){
			 echo  json_encode($citas->consultar());
		  }
		  else if($accion=='obtienefecha'){
			 echo json_encode($citas->obtienefecha());
		  }
		  elseif($accion=='eliminar'){
			 $citas->set_cedula($_POST['cedula']);
			 echo  json_encode($citas->eliminar());
		  }
		  else{
			  $citas->set_nombre_apellido($_POST['nombre_apellido']);
        $citas->set_cedula($_POST['cedula']);
        $citas->set_rif($_POST['rif']);
        $citas->set_fecha_nac($_POST['fecha_nac']);
        $citas->set_vivienda($_POST['vivienda']);
        $citas->set_automovil($_POST['automovil']);
        $citas->set_modelo($_POST['modelo']);
        $citas->set_ano($_POST['ano']);
        $citas->set_telefono($_POST['telefono']);
        $citas->set_celular($_POST['celular']);
        $citas->set_estado_civil($_POST['estado_civil']);
        $citas->set_tipo_sangre($_POST['tipo_sangre']);
        $citas->set_talla_camisa($_POST['talla_camisa']);
        $citas->set_talla_zapato($_POST['talla_zapato']);
        $citas->set_talla_pantalon($_POST['talla_pantalon']);
        $citas->set_correo($_POST['correo']);
        $citas->set_cargo($_POST['cargo']);
        $citas->set_estatus($_POST['estatus']);

			  if($accion=='incluir'){
				  echo  json_encode($citas->incluir());
			  }
			  elseif($accion=='modificar'){
				  echo  json_encode($citas->modificar());
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
