<?php
  if (!is_file("modelo/".$pagina.".php")){
    echo "Falta definir la clase ".$pagina;
    exit;
  }

  require_once("modelo/".$pagina.".php");

  if(is_file("vista/".$pagina.".php")){

	  if(!empty($_POST)){
		  $instituciones = new Institucion();

		  $accion = $_POST['accion'];

		  if($accion=='consultar'){
			  echo  json_encode($instituciones->consultar());
		  }
      else if($accion=='buscar'){
			  $instituciones->set_rif_institucion($_POST['buscador']);
        echo json_encode($instituciones->buscar());
		  }
      elseif($accion=='eliminar'){
			  $instituciones->set_rif_institucion($_POST['rif_institucion']);
			  echo  json_encode($instituciones->eliminar());
		  }
		  else{
        $instituciones->set_rif_institucion($_POST['rif_institucion']);
        $instituciones->set_cod_estado($_POST['cod_estado']);
        $instituciones->set_nombre($_POST['nombre']);
        $instituciones->set_direccion($_POST['direccion']);
        $instituciones->set_codigo_postal($_POST['codigo_postal']);
        $instituciones->set_telefono($_POST['telefono']);
        $instituciones->set_correo($_POST['correo']);
        $instituciones->set_tipo_institucion($_POST['tipo_institucion']);

			  if($accion=='incluir'){
          echo  json_encode($instituciones->incluir());
			  }elseif($accion=='modificar'){
				  echo  json_encode($instituciones->modificar());
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
