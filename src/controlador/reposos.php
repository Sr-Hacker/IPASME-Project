<?php

  if (!is_file("modelo/".$pagina.".php")){
    echo "Falta definir la clase ".$pagina;
    exit;
  }

  require_once("modelo/".$pagina.".php");

  if(is_file("vista/".$pagina.".php")){

	  if(!empty($_POST)){
		  $reposos = new Reposo();

		  $accion = $_POST['accion'];

		  if($accion=='consultar'){
			  echo json_encode($reposos->consultar());
		  }
		  else if($accion=='buscar'){
			  $reposos->set_cedula($_POST['buscador']);
        echo json_encode($reposos->buscar());
		  }
		  elseif($accion=='eliminar'){
        $reposos->set_n_reposo($_POST['n_reposo']);
			  echo json_encode($reposos->eliminar());
		  }
		  else{
        $reposos->set_n_reposo($_POST['n_reposo']);
        $reposos->set_n_consulta($_POST['n_consulta']);
        $reposos->set_motivo($_POST['motivo']);
        $reposos->set_instrucciones($_POST['instrucciones']);
        $reposos->set_fecha_inicio($_POST['fecha_inicio']);
        $reposos->set_fecha_final($_POST['fecha_final']);

			  if($accion=='incluir'){
				  echo  json_encode($reposos->incluir());
			  }
			  elseif($accion=='modificar'){
				  echo  json_encode($reposos->modificar());
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
