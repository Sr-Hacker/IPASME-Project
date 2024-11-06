<?php

  if (!is_file("modelo/".$pagina.".php")){
    echo "Falta definir la clase ".$pagina;
    exit;
  }
  require_once("modelo/".$pagina.".php");

  if(is_file("vista/".$pagina.".php")){

	  if(!empty($_POST)){
		$consulta = new Consulta();

		  $accion = $_POST['accion'];

		  if($accion=='consultar'){
			 echo json_encode($consulta->consultar());
		  }
      elseif($accion=='buscar'){
			  $consulta->set_fecha($_POST['buscador']);
        echo json_encode($consulta->buscar());
      }
      elseif($accion=='consultar_medicos'){
        echo json_encode($consulta->consultar_medicos());
      }
      elseif($accion=='consultar_pacientes'){
        echo json_encode($consulta->consultar_pacientes());
      }
		  elseif($accion=='eliminar'){
			 $consulta->set_id($_POST['n_consulta']);
			 echo json_encode($consulta->eliminar());
		  }
		  else{
			  $consulta->set_n_consulta($_POST['n_consulta']);
        $consulta->set_cod_cita($_POST['cod_cita']);
        $consulta->set_n_historia($_POST['n_historia']);
        $consulta->set_motivo($_POST['motivo']);
        $consulta->set_detalle($_POST['detalle']);

			  if($accion=='incluir'){
				  echo json_encode($consulta->incluir());
			  }
			  elseif($accion=='modificar'){
				  echo json_encode($consulta->modificar());
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
