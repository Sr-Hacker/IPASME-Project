<?php

  if (!is_file("modelo/".$pagina.".php")){
    echo "Falta definir la clase ".$pagina;
    exit;
  }

  require_once("modelo/".$pagina.".php");

  if(is_file("vista/".$pagina.".php")){

	  if(!empty($_POST)){
		$medicos = new Medico();

		  $accion = $_POST['accion'];

		  if($accion=='consultar'){
			 echo  json_encode($medicos->consultar());
		  }
		  else if($accion=='obtienefecha'){
			 echo json_encode($medicos->obtienefecha());
		  }
		  elseif($accion=='eliminar'){
			 $medicos->set_cedula($_POST['cedula']);
			 echo  json_encode($medicos->eliminar());
		  }
		  else{
			  $medicos->set_nombre_apellido($_POST['nombre_apellido']);
        $medicos->set_cedula($_POST['cedula']);
        $medicos->set_rif($_POST['rif']);
        $medicos->set_fecha_nac($_POST['fecha_nac']);
        $medicos->set_vivienda($_POST['vivienda']);
        $medicos->set_automovil($_POST['automovil']);
        $medicos->set_modelo($_POST['modelo']);
        $medicos->set_ano($_POST['ano']);
        $medicos->set_telefono($_POST['telefono']);
        $medicos->set_celular($_POST['celular']);
        $medicos->set_estado_civil($_POST['estado_civil']);
        $medicos->set_tipo_sangre($_POST['tipo_sangre']);
        $medicos->set_talla_camisa($_POST['talla_camisa']);
        $medicos->set_talla_zapato($_POST['talla_zapato']);
        $medicos->set_talla_pantalon($_POST['talla_pantalon']);
        $medicos->set_correo($_POST['correo']);
        $medicos->set_cargo($_POST['cargo']);
        $medicos->set_estatus($_POST['estatus']);

			  if($accion=='incluir'){
				  echo  json_encode($medicos->incluir());
			  }
			  elseif($accion=='modificar'){
				  echo  json_encode($medicos->modificar());
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
