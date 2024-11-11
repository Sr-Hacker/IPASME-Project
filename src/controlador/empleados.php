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
		  else if($accion=='buscar'){
			  $empleado->set_ced_empleado($_POST['buscador']);
        echo json_encode($empleado->buscar());
		  }
		  elseif($accion=='eliminar'){
			 $empleado->set_ced_empleado($_POST['ced_empleado']);
			 echo json_encode($empleado->eliminar());
		  }
		  else{
        $empleado->set_ced_empleado($_POST['ced_empleado']);
        $empleado->set_fecha_nacimiento($_POST['nombres']);
        $empleado->set_nombre($_POST['apellidos']);
        $empleado->set_apellido($_POST['telefono_celular']);
        $empleado->set_telefono($_POST['contrasena']);
        $empleado->set_contrasena($_POST['rol']);

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
