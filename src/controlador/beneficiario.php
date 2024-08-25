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
        $beneficiarios->set_n_historia($_POST['n_historia']);
        $beneficiarios->set_nombre($_POST['nombre']);
        $beneficiarios->set_apellido($_POST['apellido']);
        $beneficiarios->set_fecha_nacimiento($_POST['fecha_nacimiento']);
        $beneficiarios->set_codigo_postal($_POST['codigo_postal']);
        $beneficiarios->set_estado_provincia($_POST['estado_provincia']);
        $beneficiarios->set_ciudad($_POST['ciudad']);
        $beneficiarios->set_direccion($_POST['direccion']);
        $beneficiarios->set_numero_casa($_POST['numero_casa']);
        $beneficiarios->set_sexo($_POST['sexo']);
        $beneficiarios->set_telefono($_POST['telefono']);
        $beneficiarios->set_correo($_POST['correo']);
        $beneficiarios->set_tipo_sangre($_POST['tipo_sangre']);
        $beneficiarios->set_relacion($_POST['relacion']);

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
