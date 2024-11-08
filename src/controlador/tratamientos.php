<?php

  if (!is_file("modelo/".$pagina.".php")){
    echo "Falta definir la clase ".$pagina;
    exit;
  }

  require_once("modelo/".$pagina.".php");

  if(is_file("vista/".$pagina.".php")){

	  if(!empty($_POST)){
		  $tratamientos = new Tratamiento();

		  $accion = $_POST['accion'];

		  if($accion=='consultar'){
			  echo json_encode($tratamientos->consultar());
		  }
		  else if($accion=='buscar'){
			  $tratamientos->set_cedula($_POST['buscador']);
        echo json_encode($tratamientos->buscar());
		  }
		  elseif($accion=='eliminar'){
			 $tratamientos->set_id($_POST['n_tratamiento']);
			 echo json_encode($tratamientos->eliminar());
		  }
		  else{
        $tratamientos->set_n_tratamiento($_POST['n_tratamiento']);
        $tratamientos->set_cod_informe($_POST['cod_informe']);
        $tratamientos->set_tipo_tratamiento($_POST['tipo_tratamiento']);
        $tratamientos->set_instrucciones($_POST['instrucciones']);
        $tratamientos->set_motivo($_POST['motivo']);
        $tratamientos->set_tiempo_tratamiento($_POST['tiempo_tratamiento']);

			  if($accion=='incluir'){
				  echo  json_encode($tratamientos->incluir());
			  }
			  elseif($accion=='modificar'){
				  echo  json_encode($tratamientos->modificar());
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
