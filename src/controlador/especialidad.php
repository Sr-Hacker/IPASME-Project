<?php

  if (!is_file("modelo/".$pagina.".php")){
    echo "Falta definir la clase ".$pagina;
    exit;
  }

  require_once("modelo/".$pagina.".php");

  if(is_file("vista/".$pagina.".php")){

	  if(!empty($_POST)){
		  $especialidad = new Especialidad();
		  $accion = $_POST['accion'];

		  if($accion=='consultar'){
			  echo json_encode($especialidad->consultar());
		  }
		  else if($accion=='buscar'){
			  $especialidad->set_cedula($_POST['buscador']);
        echo json_encode($especialidad->buscar());
		  }
		  elseif($accion=='eliminar'){
			 $especialidad->set_id($_POST['id']);
			 echo json_encode($especialidad->eliminar());
		  }
		  else{
			  $especialidad->set_id($_POST['id']);
			  $especialidad->set_name($_POST['nombre']);
        $especialidad->set_apellido($_POST['apellido']);
        $especialidad->set_cedula($_POST['cedula']);
        $especialidad->set_telefono($_POST['telefono']);
        $especialidad->set_contrasena($_POST['contrasena']);
        $especialidad->set_rol($_POST['rol']);

			  if($accion=='incluir'){
				  echo  json_encode($especialidad->incluir());
			  }
			  elseif($accion=='modificar'){
				  echo  json_encode($especialidad->modificar());
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
