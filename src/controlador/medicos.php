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
        $medicos->set_id($_POST['id']);
        echo  json_encode($medicos->eliminar());
		  }
		  else{
			  $medicos->set_nombres($_POST['nombres']);
			  $medicos->set_apellidos($_POST['apellidos']);
			  $medicos->set_externo($_POST['externo']);
			  $medicos->set_cedula($_POST['cedula']);
			  $medicos->set_telefono($_POST['telefono']);

			  if($accion=='incluir'){
				  echo  json_encode($medicos->incluir());
			  }
			  elseif($accion=='modificar'){
			    $medicos->set_id($_POST['id']);
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
