<?php

  if (!is_file("modelo/".$pagina.".php")){
    echo "Falta definir la clase ".$pagina;
    exit;
  }

  require_once("modelo/".$pagina.".php");

  if(is_file("vista/".$pagina.".php")){

	  if(!empty($_POST)){
		  $reposos = new Reposo();

		  $accion = $_POST['accion'];

		  if($accion=='consultar'){
			  echo json_encode($reposos->consultar());
		  }
		  else if($accion=='buscar'){
			  $reposos->set_cedula($_POST['buscador']);
        echo json_encode($reposos->buscar());
		  }
		  elseif($accion=='eliminar'){
			 $reposos->set_id($_POST['id']);
			 echo json_encode($reposos->eliminar());
		  }
		  else{
        $reposos->set_name($_POST['nombre']);
        $reposos->set_apellido($_POST['apellido']);
        $reposos->set_cedula($_POST['cedula']);
        $reposos->set_telefono($_POST['telefono']);
        $reposos->set_contrasena($_POST['contrasena']);
        $reposos->set_rol($_POST['rol']);

			  if($accion=='incluir'){
				  echo  json_encode($reposos->incluir());
			  }
			  elseif($accion=='modificar'){
          $reposos->set_id($_POST['id']);
				  echo  json_encode($reposos->modificar());
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
