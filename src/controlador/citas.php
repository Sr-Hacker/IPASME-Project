<?php

  if (!is_file("modelo/".$pagina.".php")){
    echo "Falta definir la clase ".$pagina;
    exit;
  }
  require_once("modelo/".$pagina.".php");

  if(is_file("vista/".$pagina.".php")){

	  if(!empty($_POST)){
		$citas = new Cita();

		  $accion = $_POST['accion'];

		  if($accion=='consultar'){
			 echo json_encode($citas->consultar());
		  }
      elseif($accion=='buscar'){
			  $citas->set_fecha($_POST['buscador']);
        echo json_encode($citas->buscar());
      }
      elseif($accion=='consultar_medicos'){
        echo json_encode($citas->consultar_medicos());
      }
      elseif($accion=='consultar_pacientes'){
        echo json_encode($citas->consultar_pacientes());
      }
		  elseif($accion=='eliminar'){
			 $citas->set_id($_POST['cod_cita']);
			 echo json_encode($citas->eliminar());
		  }
		  else{
			  $citas->set_cod_cita($_POST['cod_cita']);
        $citas->set_ced_afiliado($_POST['ced_afiliado']);
        $citas->set_cod_especialidad_medico($_POST['cod_especialidad_medico']);
        $citas->set_ced_beneficiario($_POST['ced_beneficiario']);
        $citas->set_fecha($_POST['fecha']);
        $citas->set_hora($_POST['hora']);
        $citas->set_detalle($_POST['detalle']);
        $citas->set_vigente($_POST['vigente']);

			  if($accion=='incluir'){
				  echo json_encode($citas->incluir());
			  }
			  elseif($accion=='modificar'){
				  echo json_encode($citas->modificar());
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
