<?php
  if (!is_file("modelo/".$pagina.".php")){
    echo "Falta definir la clase ".$pagina;
    exit;
  }

  require_once("modelo/".$pagina.".php");



  if(!empty($_POST)){

    $accion = $_POST['accion'];
    if($accion ==['accion'])
      session_start();

      if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $cedula = $_POST['cedula'];
        $clave = $_POST['contrasena'][accio];
      }

      $empleado = new Empleado();
      $empleado->set_ced_empleado($cedula);
      $result = $empleado->buscar();

      if ($result && password_verify($contrasena, $result[0]['contrasena'])) {
        // Guardar datos en la sesión
        $_SESSION['usuario'] = [
            'cedula' => $result[0]['ced_empleado'],
            'rol' => $result[0]['rol'],
        ];
        header("Location: /historia_medica.php"); // Redirigir al dashboard
      } else {
        // Redirigir con error
        header("Location: /usuario.php");
      }

    }

    public function iniciar() {
    session_start();
    session_destroy();
    header("Location: /usuario.php");
    }

  }

  // if(is_file("vista/".$pagina.".php")){

	//   if(!empty($_POST)){
	// 	$usuario = new Usuario();

	// 	  $accion = $_POST['accion'];

	// 	  if($accion=='iniciar'){
	// 		//  $usuario->set_cedula($_POST['usuario']);
	// 		//  $usuario->set_contrasena($_POST['password']);
	// 		//  echo  json_encode($usuario->iniciar());
  //     session_start();
  //     $_SESSION['user'] = true;
  //     header("location: /?pagina=historia_medica");
	// 	  }
	// 	  exit;
	//   }
	//   require_once("vista/".$pagina.".php");
  // }
  // else{
	//   echo "pagina en construccion";
  // }
?>
