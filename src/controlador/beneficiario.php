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
			  $beneficiarios->set_cedula($_POST['buscador']);
        echo json_encode($beneficiarios->buscar());
		  }
      elseif($accion=='eliminar'){
			  $beneficiarios->set_id($_POST['id']);
			  echo  json_encode($beneficiarios->eliminar());
		  }
		  else{
        $beneficiarios->set_parentesco($_POST['parentesco']);
        $beneficiarios->set_nombres($_POST['nombres']);
        $beneficiarios->set_telefono($_POST['telefono']);
        $beneficiarios->set_edad($_POST['edad']);
        $beneficiarios->set_cedula($_POST['cedula']);

        $beneficiarios->set_cod_historia($_POST['cod_historia']);
        $beneficiarios->set_tipo_sangre($_POST['tipo_sangre']);
        $beneficiarios->set_sexo($_POST['sexo']);
        $beneficiarios->set_estatura($_POST['estatura']);
        $beneficiarios->set_peso($_POST['peso']);
        $beneficiarios->set_fecha_nacimiento($_POST['fecha_nacimiento']);

        $beneficiarios->set_direccion($_POST['direccion']);
        $beneficiarios->set_zona($_POST['zona']);
        $beneficiarios->set_descripcion($_POST['descripcion']);
        $beneficiarios->set_postal($_POST['postal']);

			  if($accion=='incluir'){
          echo  json_encode($beneficiarios->incluir());
			  }elseif($accion=='modificar'){
          $beneficiarios->set_id($_POST['id']);
          $beneficiarios->set_id_historia($_POST['id_historia']);
          $beneficiarios->set_id_direccion($_POST['id_direccion']);
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
