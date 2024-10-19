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
        $empleado->set_fecha_nacimiento($_POST['fecha_nacimiento']);
        $empleado->set_nombre($_POST['nombre']);
        $empleado->set_apellido($_POST['apellido']);
        $empleado->set_telefono($_POST['telefono']);
        $empleado->set_contrasena($_POST['contrasena']);
        $empleado->set_rol($_POST['rol']);
        $empleado->set_estado_provincia($_POST['estado_provincia']);
        $empleado->set_ciudad($_POST['ciudad']);
        $empleado->set_direccion($_POST['direccion']);
        $empleado->set_codigo_postal($_POST['codigo_postal']);
        $empleado->set_numero_casa($_POST['numero_casa']);
        $empleado->set_correo($_POST['correo']);

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
