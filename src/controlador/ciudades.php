<?php

  if (!is_file("modelo/".$pagina.".php")){
    echo "Falta definir la clase ".$pagina;
    exit;
  }

  require_once("modelo/".$pagina.".php");

  if(is_file("vista/".$pagina.".php")){

	  if(!empty($_POST)){
		  $ciudades = new Ciudad();
		  $accion = $_POST['accion'];

		  if($accion=='consultar'){
			  echo json_encode($ciudades->consultar());
		  }
		  else if($accion=='buscar'){
			  $ciudades->set_cod_espe($_POST['buscador']);
        echo json_encode($ciudades->buscar());
		  }
		  elseif($accion=='eliminar'){
			 $ciudades->set_cod_ciudad($_POST['cod_ciudad']);
			 echo json_encode($ciudades->eliminar());
		  }
		  else{
        $ciudades->set_cod_ciudad($_POST['cod_ciudad']);
        $ciudades->set_cod_estado($_POST['cod_estado']);
        $ciudades->set_nombre_ciudad($_POST['nombre_ciudad']);

			  if($accion=='incluir'){
          echo  json_encode($ciudades->incluir());
			  }
			  elseif($accion=='modificar'){
				  echo  json_encode($ciudades->modificar());
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
