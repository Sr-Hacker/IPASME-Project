<?php
  if (!is_file("modelo/".$pagina.".php")){
    echo "Falta definir la clase ".$pagina;
    exit;
  }

  require_once("modelo/".$pagina.".php");

  if(is_file("vista/".$pagina.".php")){

	  if(!empty($_POST)){
		$beneficiarios = new Beneficario();

		  $accion = $_POST['accion'];

		  if($accion=='consultar'){
			 echo  json_encode($beneficiarios->consultar());
		  }
		  else if($accion=='obtienefecha'){
			 echo json_encode($beneficiarios->obtienefecha());
		  }
		  elseif($accion=='eliminar'){
			 $beneficiarios->set_cedula($_POST['cedula']);
			 echo  json_encode($beneficiarios->eliminar());
		  }
		  else{
			  $beneficiarios->set_nombre_apellido($_POST['nombre_apellido']);
        $beneficiarios->set_cedula($_POST['cedula']);
        $beneficiarios->set_rif($_POST['rif']);
        $beneficiarios->set_fecha_nac($_POST['fecha_nac']);
        $beneficiarios->set_vivienda($_POST['vivienda']);
        $beneficiarios->set_automovil($_POST['automovil']);
        $beneficiarios->set_modelo($_POST['modelo']);
        $beneficiarios->set_ano($_POST['ano']);
        $beneficiarios->set_telefono($_POST['telefono']);
        $beneficiarios->set_celular($_POST['celular']);
        $beneficiarios->set_estado_civil($_POST['estado_civil']);
        $beneficiarios->set_tipo_sangre($_POST['tipo_sangre']);
        $beneficiarios->set_talla_camisa($_POST['talla_camisa']);
        $beneficiarios->set_talla_zapato($_POST['talla_zapato']);
        $beneficiarios->set_talla_pantalon($_POST['talla_pantalon']);
        $beneficiarios->set_correo($_POST['correo']);
        $beneficiarios->set_cargo($_POST['cargo']);
        $beneficiarios->set_estatus($_POST['estatus']);

			  if($accion=='incluir'){
				  echo  json_encode($beneficiarios->incluir());
			  }
			  elseif($accion=='modificar'){
				  echo  json_encode($beneficiarios->modificar());
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
