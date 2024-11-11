<?php

  if (!is_file("modelo/".$pagina.".php")){
    echo "Falta definir la clase ".$pagina;
    exit;
  }

  require_once("modelo/".$pagina.".php");

  if(is_file("vista/".$pagina.".php")){

	  if(!empty($_POST)){
		  $requisitos = new Requisito();

		  $accion = $_POST['accion'];

		  if($accion=='consultar'){
			  echo json_encode($requisitos->consultar());
		  }
		  else if($accion=='buscar'){
			  $requisitos->set_cedula($_POST['buscador']);
        echo json_encode($requisitos->buscar());
		  }
		  elseif($accion=='eliminar'){
			 $requisitos->set_id($_POST['cod_requisito']);
			 echo json_encode($requisitos->eliminar());
		  }
		  else{
        $requisitos->set_cod_requisito($_POST['cod_requisito']);
        $requisitos->set_nombre($_POST['nombre']);

			  if($accion=='incluir'){
				  echo  json_encode($requisitos->incluir());
			  }
			  elseif($accion=='modificar'){
				  echo  json_encode($requisitos->modificar());
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
