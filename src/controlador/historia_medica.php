<?php
  if (!is_file("modelo/".$pagina.".php")){
    echo "Falta definir la clase ".$pagina;
    exit;
  }

  require_once("modelo/".$pagina.".php");

  if(is_file("vista/".$pagina.".php")){

	  if(!empty($_POST)){
		  $historia = new Historia();
		  $accion = $_POST['accion'];

		  if($accion=='consultar'){
			 echo  json_encode($historia->consultar());
		  }
		  else if($accion=='obtienefecha'){
			 echo json_encode($historia->obtienefecha());
		  }
		  elseif($accion=='eliminar'){
			 $historia->set_cedula($_POST['cedula']);
			 echo  json_encode($historia->eliminar());
		  }
		  else{
			  $historia->set_nombre_apellido($_POST['nombre_apellido']);
        $historia->set_cedula($_POST['cedula']);
        $historia->set_rif($_POST['rif']);
        $historia->set_fecha_nac($_POST['fecha_nac']);
        $historia->set_vivienda($_POST['vivienda']);
        $historia->set_automovil($_POST['automovil']);
        $historia->set_modelo($_POST['modelo']);
        $historia->set_ano($_POST['ano']);
        $historia->set_telefono($_POST['telefono']);
        $historia->set_celular($_POST['celular']);
        $historia->set_estado_civil($_POST['estado_civil']);
        $historia->set_tipo_sangre($_POST['tipo_sangre']);
        $historia->set_talla_camisa($_POST['talla_camisa']);
        $historia->set_talla_zapato($_POST['talla_zapato']);
        $historia->set_talla_pantalon($_POST['talla_pantalon']);
        $historia->set_correo($_POST['correo']);
        $historia->set_cargo($_POST['cargo']);
        $historia->set_estatus($_POST['estatus']);

			  if($accion=='incluir'){
				  echo  json_encode($historia->incluir());
			  }
			  elseif($accion=='modificar'){
				  echo  json_encode($historia->modificar());
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
