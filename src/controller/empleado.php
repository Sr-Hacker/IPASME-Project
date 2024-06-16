<?php

  if (!is_file("model/".$page.".php")){
    echo "Falta definir la clase ".$page;
    exit;
  }

  require_once("model/".$page.".php");

  if(is_file("view/".$page.".php")){

	  if(!empty($_POST)){
		$empleado = new Empleado();

		  $accion = $_POST['accion'];

		  if($accion=='consultar'){
			 echo  json_encode($empleado->consultar());
		  }
		  else if($accion=='obtienefecha'){
			 echo json_encode($empleado->obtienefecha());
		  }
		  elseif($accion=='eliminar'){
			 $empleado->set_cedula($_POST['cedula']);
			 echo  json_encode($empleado->eliminar());
		  }
		  else{
			  $empleado->set_nombre_apellido($_POST['nombre_apellido']);
        $empleado->set_cedula($_POST['cedula']);
        $empleado->set_rif($_POST['rif']);
        $empleado->set_fecha_nac($_POST['fecha_nac']);
        $empleado->set_vivienda($_POST['vivienda']);
        $empleado->set_automovil($_POST['automovil']);
        $empleado->set_modelo($_POST['modelo']);
        $empleado->set_ano($_POST['ano']);
        $empleado->set_telefono($_POST['telefono']);
        $empleado->set_celular($_POST['celular']);
        $empleado->set_estado_civil($_POST['estado_civil']);
        $empleado->set_tipo_sangre($_POST['tipo_sangre']);
        $empleado->set_talla_camisa($_POST['talla_camisa']);
        $empleado->set_talla_zapato($_POST['talla_zapato']);
        $empleado->set_talla_pantalon($_POST['talla_pantalon']);
        $empleado->set_correo($_POST['correo']);
        $empleado->set_cargo($_POST['cargo']);
        $empleado->set_estatus($_POST['estatus']);

			  if($accion=='incluir'){
				  echo  json_encode($empleado->incluir());
			  }
			  elseif($accion=='modificar'){
				  echo  json_encode($empleado->modificar());
			  }
		  }
		  exit;
	  }


	  require_once("view/".$page.".php");
  }
  else{
	  echo "pagina en construccion";
  }
?>
