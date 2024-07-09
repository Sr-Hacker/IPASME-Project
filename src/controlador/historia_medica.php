<?php
  if (!is_file("modelo/".$pagina.".php")){
    echo "Falta definir la clase ".$pagina;
    exit;
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
			  $empleado->set_cedula($_POST['buscador']);
        echo json_encode($historia->buscar());
		  }
		  elseif($accion=='eliminar'){
			 $historia->set_cedula($_POST['cedula']);
			 echo  json_encode($historia->eliminar());
		  }
		  else{
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
