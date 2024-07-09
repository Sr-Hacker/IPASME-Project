<?php
  if (!is_file("modelo/".$pagina.".php")){
    echo "Falta definir la clase ".$pagina;
    exit;
  }

  require_once("modelo/".$pagina.".php");

  if(is_file("vista/".$pagina.".php")){

	  if(!empty($_POST)){
		  $afiliados = new Afiliado();

		  $accion = $_POST['accion'];

		  if($accion=='consultar'){
			  echo  json_encode($afiliados->consultar());
		  }
      else if($accion=='buscar'){
			  $afiliados->set_cedula($_POST['buscador']);
        echo json_encode($afiliados->buscar());
		  }
      elseif($accion=='eliminar'){
			  $afiliados->set_id($_POST['id']);
			  echo  json_encode($afiliados->eliminar());
		  }
		  else{
        $afiliados->set_nombre($_POST['nombre']);
        $afiliados->set_apellido($_POST['apellido']);
        $afiliados->set_telefono($_POST['telefono']);
        $afiliados->set_edad($_POST['edad']);
        $afiliados->set_cargo($_POST['cargo']);
        $afiliados->set_cedula($_POST['cedula']);

        $afiliados->set_cod_historia($_POST['cod_historia']);
        $afiliados->set_tipo_sangre($_POST['tipo_sangre']);
        $afiliados->set_sexo($_POST['sexo']);
        $afiliados->set_estatura($_POST['estatura']);
        $afiliados->set_peso($_POST['peso']);
        $afiliados->set_fecha_nacimiento($_POST['fecha_nacimiento']);

        $afiliados->set_direccion($_POST['direccion']);
        $afiliados->set_zona($_POST['zona']);
        $afiliados->set_descripcion($_POST['descripcion']);
        $afiliados->set_postal($_POST['postal']);

        $afiliados->set_nombre_institucion($_POST['nombre_institucion']);
        $afiliados->set_rif_institucion($_POST['rif_institucion']);
        $afiliados->set_direccion_institucion($_POST['direccion_institucion']);
        $afiliados->set_zona_institucion($_POST['zona_institucion']);
        $afiliados->set_descripcion_institucion($_POST['descripcion_institucion']);
        $afiliados->set_postal_institucion($_POST['postal_institucion']);

			  if($accion=='incluir'){
          echo  json_encode($afiliados->incluir());
			  }elseif($accion=='modificar'){
          $afiliados->set_id($_POST['id']);
          $afiliados->set_id_historia($_POST['id_historia']);
          $afiliados->set_id_direccion($_POST['id_direccion']);
          $afiliados->set_id_institucion($_POST['id_institucion']);
          $afiliados->set_id_direccion_institucion($_POST['id_direccion_institucion']);
				  echo  json_encode($afiliados->modificar());
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
