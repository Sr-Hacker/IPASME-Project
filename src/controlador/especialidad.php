<?php

  if (!is_file("modelo/".$pagina.".php")){
    echo "Falta definir la clase ".$pagina;
    exit;
  }

  require_once("modelo/".$pagina.".php");

  if(is_file("vista/".$pagina.".php")){

	  if(!empty($_POST)){
		  $especialidad = new Especialidad();
		  $accion = $_POST['accion'];

		  if($accion=='consultar'){
			  echo json_encode($especialidad->consultar());
		  }
		  else if($accion=='buscar'){
			  $especialidad->set_cod_espe($_POST['buscador']);
        echo json_encode($especialidad->buscar());
		  }
		  elseif($accion=='eliminar'){
			 $especialidad->set_cod_espe($_POST['cod_espe']);
			 echo json_encode($especialidad->eliminar());
		  }
		  else{
        $especialidad->set_cod_espe($_POST['cod_espe']);
        $especialidad->set_nombre($_POST['nombre']);

			  if($accion=='incluir'){
          echo  json_encode($especialidad->incluir());
			  }
			  elseif($accion=='modificar'){
          $especialidad->set_code_espe($_POST['code_espe']);
				  echo  json_encode($especialidad->modificar());
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
