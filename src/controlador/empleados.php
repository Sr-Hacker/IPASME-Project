<?php

  if (!is_file("modelo/".$pagina.".php")){
    echo "Falta definir la clase ".$pagina;
    exit;
  }

  require_once("modelo/".$pagina.".php");

  if(is_file("vista/".$pagina.".php")){

	  if(!empty($_POST)){
		$empleado = new Empleado();

		  $accion = $_POST['accion'];

		  if($accion=='consultar'){
			 echo json_encode($empleado->consultar());
		  }
		  else if($accion=='obtienefecha'){
			 echo json_encode($empleado->obtienefecha());
		  }
		  elseif($accion=='eliminar'){
			 $empleado->set_cedula($_POST['cedula']);
			 echo json_encode($empleado->eliminar());
		  }
		  else{
			  $empleado->set_name($_POST['nombre']);
        $empleado->set_apellido($_POST['apellido']);
        $empleado->set_cedula($_POST['cedula']);
        $empleado->set_telefono($_POST['telefono']);
        $empleado->set_contrasena($_POST['contrasena']);
        $empleado->set_rol($_POST['rol']);

			  if($accion=='incluir'){
				  echo  json_encode($empleado->incluir());
			  }
			  elseif($accion=='modificar'){
				  echo  json_encode($empleado->modificar());
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
