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
			 echo  json_encode($citas->consultar());
		  }
      elseif($accion=='consultar_medicos'){
        echo  json_encode($citas->consultar_medicos());
      }
		  elseif($accion=='eliminar'){
			 $citas->set_id($_POST['id']);
			 echo  json_encode($citas->eliminar());
		  }
		  else{
			  $citas->set_fecha($_POST['fecha']);
        $citas->set_motivo($_POST['motivo']);

			  if($accion=='incluir'){
				  echo  json_encode($citas->incluir());
			  }
			  elseif($accion=='modificar'){
			    $citas->set_id($_POST['id']);
          $citas->set_id_medico($_POST['id_medico']);
          $citas->set_id_beneficiario($_POST['id_beneficiario']);
          $citas->set_id_afiliado($_POST['id_afiliado']);
				  echo  json_encode($citas->modificar());
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
