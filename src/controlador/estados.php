<?php

  if (!is_file("modelo/".$pagina.".php")){
    echo "Falta definir la clase ".$pagina;
    exit;
  }

  require_once("modelo/".$pagina.".php");

  if(is_file("vista/".$pagina.".php")){

	  if(!empty($_POST)){
		  $estados = new Estado();
		  $accion = $_POST['accion'];

		  if($accion=='consultar'){
			  echo json_encode($estados->consultar());
		  }
		  else if($accion=='buscar'){
			  $estados->set_cod_espe($_POST['buscador']);
        echo json_encode($estados->buscar());
		  }
		  elseif($accion=='eliminar'){
			 $estados->set_cod_estado($_POST['cod_estado']);
			 echo json_encode($estados->eliminar());
		  }
		  else{
        $estados->set_cod_estado($_POST['cod_estado']);
        $estados->set_cnombre_estado($_POST['nombre_estado']);

			  if($accion=='incluir'){
          echo  json_encode($estados->incluir());
			  }
			  elseif($accion=='modificar'){
				  echo  json_encode($estados->modificar());
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
