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
			  $afiliados->set_id($_POST['cedula_afiliado']);
			  echo  json_encode($afiliados->eliminar());
		  }
		  else{
        $afiliados->set_nombre($_POST['cedula_afiliado']);
        $afiliados->set_apellido($_POST['n_historia']);
        $afiliados->set_telefono($_POST['nombre']);
        $afiliados->set_edad($_POST['apellido']);
        $afiliados->set_cedula($_POST['sexo']);
        $afiliados->set_cargo($_POST['fecha_nacimiento']);
        $afiliados->set_postal_institucion($_POST['estado_provincia']);
        $afiliados->set_postal_institucion($_POST['direccion']);
        $afiliados->set_postal_institucion($_POST['numero_casa']);
        $afiliados->set_postal_institucion($_POST['codigo_postal']);
        $afiliados->set_postal_institucion($_POST['telefono']);
        $afiliados->set_postal_institucion($_POST['correo']);

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
