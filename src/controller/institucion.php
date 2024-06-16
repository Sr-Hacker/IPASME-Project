<?php
  if (!is_file("model/".$page.".php")){
    echo "Falta definir la clase ".$page;
    exit;
  }

  require_once("model/".$page.".php");

  if(is_file("view/".$page.".php")){

	  if(!empty($_POST)){
		$institucion = new Institucion();

		  $accion = $_POST['accion'];

		  if($accion=='consultar'){
			 echo  json_encode($institucion->consultar());
		  }
		  else if($accion=='obtienefecha'){
			 echo json_encode($institucion->obtienefecha());
		  }
		  elseif($accion=='eliminar'){
			 $institucion->set_rif($_POST['rif']);
			 echo  json_encode($institucion->eliminar());
		  }
		  else{
			  $institucion->set_direccion($_POST['direccion']);
        $institucion->set_nombre($_POST['nombre']);
        $institucion->set_rif($_POST['rif']);

			  if($accion=='incluir'){
				  echo  json_encode($institucion->incluir());
			  }
			  elseif($accion=='modificar'){
				  echo  json_encode($institucion->modificar());
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
