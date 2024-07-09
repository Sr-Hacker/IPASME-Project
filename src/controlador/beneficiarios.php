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
			  $beneficiarios->set_cedula($_POST['cedula']);
			  echo  json_encode($beneficiarios->eliminar());
		  }
		  else{
        $beneficiarios->set_edad($_POST['edad']);
        $beneficiarios->set_cargo($_POST['cargo']);
        $beneficiarios->set_cedula($_POST['cedula']);
        $beneficiarios->set_nombre($_POST['nombre']);
        $beneficiarios->set_apellido($_POST['apellido']);
        $beneficiarios->set_telefono($_POST['telefono']);

			  if($accion=='incluir'){
          echo  json_encode($beneficiarios->incluir());
			  }elseif($accion=='modificar'){
          $beneficiarios->set_id($_POST['id']);
          $beneficiarios->set_id_historia($_POST['id_historia']);
          $beneficiarios->set_id_direccion($_POST['id_direccion']);
          $beneficiarios->set_id_institucion($_POST['id_institucion']);
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
