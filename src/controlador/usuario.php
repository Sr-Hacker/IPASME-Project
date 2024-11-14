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
			//  $usuario->set_cedula($_POST['usuario']);
			//  $usuario->set_contrasena($_POST['password']);
			//  echo  json_encode($usuario->iniciar());
      session_start();
      $_SESSION['user'] = true;
      header("location:historia_medica");
		  }
		  exit;
	  }
	  require_once("vista/".$pagina.".php");
  }
  else{
	  echo "pagina en construccion";
  }
?>
