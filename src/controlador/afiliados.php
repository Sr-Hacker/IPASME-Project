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
			  $afiliados->set_cedula($_POST['cedula']);
			  echo  json_encode($afiliados->eliminar());
		  }
		  else{
        $afiliados->set_edad($_POST['edad']);
        $afiliados->set_cargo($_POST['cargo']);
        $afiliados->set_cedula($_POST['cedula']);
        $afiliados->set_nombre($_POST['nombre']);
        $afiliados->set_apellido($_POST['apellido']);
        $afiliados->set_telefono($_POST['telefono']);

			  if($accion=='incluir'){
          echo  json_encode($afiliados->incluir());
			  }elseif($accion=='modificar'){
          $afiliados->set_id($_POST['id']);
          $afiliados->set_id_historia($_POST['id_historia']);
          $afiliados->set_id_direccion($_POST['id_direccion']);
          $afiliados->set_id_institucion($_POST['id_institucion']);
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
