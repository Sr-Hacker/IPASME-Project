<?php

  if (!is_file("modelo/".$pagina.".php")){
    echo "Falta definir la clase ".$pagina;
    exit;
  }

  require_once("modelo/".$pagina.".php");

  if(is_file("vista/".$pagina.".php")){

	  if(!empty($_POST)){
		  $informes = new Informe();

		  $accion = $_POST['accion'];

		  if($accion=='consultar'){
			  echo json_encode($informes->consultar());
		  }
		  else if($accion=='buscar'){
			  $informes->set_cedula($_POST['buscador']);
        echo json_encode($informes->buscar());
		  }
		  elseif($accion=='eliminar'){
			 $informes->set_id($_POST['cod_informe']);
			 echo json_encode($informes->eliminar());
		  }
		  else{
        $informes->set_name($_POST['cod_informe']);
        $informes->set_apellido($_POST['n_consulta']);
        $informes->set_cedula($_POST['descripcion']);
        $informes->set_telefono($_POST['diagnostico']);

			  if($accion=='incluir'){
				  echo  json_encode($informes->incluir());
			  }
			  elseif($accion=='modificar'){
				  echo  json_encode($informes->modificar());
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
