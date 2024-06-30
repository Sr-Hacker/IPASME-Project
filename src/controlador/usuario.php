<?php
  if (!is_file("modelo/".$pagina.".php")){
    echo "Falta definir la clase ".$pagina;
    exit;
  }

  require_once("modelo/".$pagina.".php");

  if(is_file("vista/".$pagina.".php")){

	  if(!empty($_POST)){
		$usuario = new Usuario();

		  $accion = $_POST['accion'];

		  if($accion=='iniciar'){
			 $usuario->set_cedula($_POST['cedula']);
			 $usuario->set_contrasena($_POST['contrasena']);
			 echo  json_encode($usuario->iniciar());
		  }
		  exit;
	  }
	  require_once("vista/".$pagina.".php");
  }
  else{
	  echo "pagina en construccion";
  }
?>
