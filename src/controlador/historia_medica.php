<?php
  if (!is_file("modelo/".$pagina.".php")){
    echo "Falta definir la clase ".$pagina;
    exit;
  }

  session_start();
  if(isset($_SESSION['user2'])){
    header("location:usuario.php");
  }

  require_once("modelo/".$pagina.".php");

  if(is_file("vista/".$pagina.".php")){

	  if(!empty($_POST)){
		  $historia = new Historia();
		  $accion = $_POST['accion'];

		  if($accion=='consultar'){
			 echo  json_encode($historia->consultar());
		  }
		  else if($accion=='buscar'){
			  $historia->set_cedula($_POST['buscador']);
        echo json_encode($historia->buscar());
		  }
		  elseif($accion=='eliminar'){
        $historia->set_n_historia($_POST['n_historia']);
			  echo  json_encode($historia->eliminar());
		  }
		  else{
        $historia->set_n_historia($_POST['n_historia']);
        $historia->set_Fecha_de_registro($_POST['Fecha_de_registro']);
        $historia->set_partida_de_nacimiento($_POST['partida_de_nacimiento']);
        $historia->set_acta_de_matrimonio($_POST['acta_de_matrimonio']);
        $historia->set_constancia_trabajo($_POST['constancia_trabajo']);
        $historia->set_tipo_sangre($_POST['tipo_sangre']);

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
