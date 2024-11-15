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
      else if($accion=='consultar_estados'){
        echo  json_encode($afiliados->consultar_estados());
      }
      else if($accion=='consultar_ciudades'){
			  $cod_estado = $_POST['cod_estado'];
        echo json_encode($afiliados->consultar_ciudades($cod_estado));
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
        $afiliados->set_rif_institucion($_POST['rif_institucion']);
        $afiliados->set_primer_nombre($_POST['primer_nombre']);
        $afiliados->set_segundo_nombre($_POST['segundo_nombre']);
        $afiliados->set_primer_apellido($_POST['primer_apellido']);
        $afiliados->set_segundo_apellido($_POST['segundo_apellido']);
        $afiliados->set_sexo($_POST['sexo']);
        $afiliados->set_fecha_nacimiento($_POST['fecha_nacimiento']);
        $afiliados->set_estado_civil($_POST['estado_civil']);
        $afiliados->set_direccion_habitacion($_POST['direccion_habitacion']);
        $afiliados->set_estado($_POST['estado']);
        $afiliados->set_ciudad($_POST['ciudad']);
        $afiliados->set_municipio($_POST['municipio']);
        $afiliados->set_parroquia($_POST['parroquia']);
        $afiliados->set_correo_electronico($_POST['correo_electronico']);
        $afiliados->set_telefono_celular($_POST['telefono_celular']);
        $afiliados->set_telefono_habitacion($_POST['telefono_habitacion']);
        $afiliados->set_telefono_trabajo($_POST['telefono_trabajo']);
        $afiliados->set_fecha_ingreso($_POST['fecha_ingreso']);
        $afiliados->set_cargo($_POST['cargo']);
        $afiliados->set_situacion_laboral($_POST['situacion_laboral']);

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
