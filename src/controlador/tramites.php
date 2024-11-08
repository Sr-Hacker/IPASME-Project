<?php

  if (!is_file("modelo/".$pagina.".php")){
    echo "Falta definir la clase ".$pagina;
    exit;
  }

  require_once("modelo/".$pagina.".php");

  if(is_file("vista/".$pagina.".php")){

	  if(!empty($_POST)){
		$tramites = new Tramite();

		  $accion = $_POST['accion'];

		  if($accion=='consultar'){
			 echo  json_encode($tramites->consultar());
		  }
		  else if($accion=='obtienefecha'){
			 echo json_encode($tramites->obtienefecha());
		  }
		  elseif($accion=='eliminar'){
			 $tramites->set_cod_tramite($_POST['cod_tramite']);
			 echo  json_encode($tramites->eliminar());
		  }
		  else{
			  $tramites->set_cod_tramite($_POST['cod_tramite']);
        $tramites->set_ced_empleado($_POST['ced_empleado']);
        $tramites->set_nombre($_POST['nombre']);
        $tramites->set_descripcion($_POST['descripcion']);

			  if($accion=='incluir'){
				  echo  json_encode($tramites->incluir());
			  }
			  elseif($accion=='modificar'){
				  echo  json_encode($tramites->modificar());
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
