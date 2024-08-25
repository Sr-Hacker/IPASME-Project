<?php

  if (!is_file("modelo/".$pagina.".php")){
    echo "Falta definir la clase ".$pagina;
    exit;
  }

  require_once("modelo/".$pagina.".php");

  if(is_file("vista/".$pagina.".php")){

	  if(!empty($_POST)){
		  $medicos = new Medico();
		  $accion = $_POST['accion'];

		  if($accion=='consultar'){
			 echo  json_encode($medicos->consultar());
		  }
      elseif($accion=='consultar_especialidades'){
        echo  json_encode($medicos->consultar_especialidades());
      }
		  elseif($accion=='eliminar'){
        $medicos->set_ced_medico($_POST['ced_medico']);
        echo  json_encode($medicos->eliminar());
		  }
		  else{
			  $medicos->set_ced_medico($_POST['ced_medico']);
			  $medicos->set_nombre($_POST['nombre']);
			  $medicos->set_apellido($_POST['apellido']);
			  $medicos->set_estado($_POST['estado']);

			  if($accion=='incluir'){
				  echo  json_encode($medicos->incluir());
			  }
			  elseif($accion=='modificar'){
				  echo  json_encode($medicos->modificar());
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
