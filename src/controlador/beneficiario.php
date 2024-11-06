<?php
  if (!is_file("modelo/".$pagina.".php")){
    echo "Falta definir la clase ".$pagina;
    exit;
  }

  require_once("modelo/".$pagina.".php");

  if(is_file("vista/".$pagina.".php")){

	  if(!empty($_POST)){
		  $beneficiarios = new Beneficiario();

		  $accion = $_POST['accion'];

		  if($accion=='consultar'){
			  echo  json_encode($beneficiarios->consultar());
		  }
      else if($accion=='buscar'){
			  $beneficiarios->set_ced_beneficiario($_POST['buscador']);
        echo json_encode($beneficiarios->buscar());
		  }
      elseif($accion=='eliminar'){
			  $beneficiarios->set_ced_beneficiario($_POST['ced_beneficiario']);
			  echo  json_encode($beneficiarios->eliminar());
		  }
		  else{
        $beneficiarios->set_ced_beneficiario($_POST['ced_beneficiario']);
        $beneficiarios->set_ced_afiliado($_POST['ced_afiliado']);
        $beneficiarios->set_nombres($_POST['nombres']);
        $beneficiarios->set_apellidos($_POST['apellidos']);
        $beneficiarios->set_fecha_nacimiento($_POST['fecha_nacimiento']);
        $beneficiarios->set_sexo($_POST['sexo']);
        $beneficiarios->set_parentesco($_POST['parentesco']);
        $beneficiarios->set_estado_civil($_POST['estado_civil']);
        $beneficiarios->set_direccion($_POST['direccion']);
        $beneficiarios->set_telefono_celular($_POST['telefono_celular']);

			  if($accion=='incluir'){
          echo  json_encode($beneficiarios->incluir());
			  }elseif($accion=='modificar'){
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
