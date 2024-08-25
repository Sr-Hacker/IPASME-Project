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
      elseif($accion=='consultar_instituciones'){
        echo json_encode($afiliados->consultar_instituciones());
      }
      elseif($accion=='eliminar'){
			  $afiliados->set_ced_afiliado($_POST['ced_afiliado']);
			  echo  json_encode($afiliados->eliminar());
		  }
		  else{
        $afiliados->set_ced_afiliado($_POST['ced_afiliado']);
        $afiliados->set_nombre($_POST['nombre']);
        $afiliados->set_apellido($_POST['apellido']);
        $afiliados->set_fecha_nacimiento($_POST['fecha_nacimiento']);
        $afiliados->set_sexo($_POST['sexo']);
        $afiliados->set_estado_provincia($_POST['estado_provincia']);
        $afiliados->set_ciudad($_POST['ciudad']);
        $afiliados->set_direccion($_POST['direccion']);
        $afiliados->set_numero_casa($_POST['numero_casa']);
        $afiliados->set_codigo_postal($_POST['codigo_postal']);
        $afiliados->set_telefono($_POST['telefono']);
        $afiliados->set_correo($_POST['correo']);
        $afiliados->set_tipo_sangre($_POST['tipo_sangre']);
        $afiliados->set_n_historia($_POST['n_historia']);
        $afiliados->set_rif_institucion($_POST['rif_institucion']);

			  if($accion=='incluir'){
          echo  json_encode($afiliados->incluir());
			  }elseif($accion=='modificar'){
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
