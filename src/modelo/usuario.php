<?php
require_once('config/db.php');

class Usuario extends DB{
  private $ced_empleado;
  private $contrasena;
  private $rol;

	function set_ced_empleado($ced_empleado){
    $this->set_ced_empleado = $ced_empleado;
	}
  public function set_contrasena($contrasena) {
    $this->contrasena = $contrasena; // Hashear la contraseña
}
  function set_rol($rol){
    $this->rol = $rol;
  }

  // Buscar usuario por cédula
  function buscar() {
    try {
      $co = $this->conecta();
      $stmt = $co->prepare("SELECT * FROM empleados WHERE ced_empleado = :ced_empleado");
      $stmt->bindParam(':ced_empleado', $this->ced_empleado, PDO::PARAM_STR);
      $stmt->execute();
      $fila = $stmt->fetchAll(PDO::FETCH_BOTH);
      return $fila;
    } catch (Exception $e) {
      return false;
    }
  }

  public function create_default_admin() {
    $default_cedula = 99999999; // Cédula por defecto
    $default_contrasena = 'ipasme';
    $default_rol = 'admin';

    $existing_user = $this->buscar($default_cedula);

    if (!$existing_user) {
        $this->set_ced_empleado($default_cedula);
        $this->set_contrasena($default_contrasena);
        $this->set_rol($default_rol);

        return $this->create_user();
    }

    return false; // El administrador ya existe
  }

	// function iniciar(){
	// 	$co = $this->conecta();
	// 	$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// 	$r = array();
	// 	try{
	// 		$resultados = $co->query("SELECT * from empleados where ced_empleado = '$this->ced_empleado'");
	// 		if($resultados){
	// 			$respuesta = [];
	// 			foreach($resultados as $resultado){
  //         $trabajador['ced_empleado'] = $resultado['ced_empleado'];
	// 				$trabajador['contrasena'] = $resultado['contrasena'];
  //         array_push($respuesta, $trabajador);
	// 			}
  //       if($trabajador['ced_empleado'] = $this->usuario && $trabajador['contrasena'] = $this->password){
  //         session_start();
  //       }

	// 			$r['resultado'] =  $respuesta;
	// 		}
	// 		else{
	// 			$r['resultado'] = 'consultar';
	// 			$r['mensaje'] =  '';
	// 		}
	// 	}catch(Exception $e){
	// 		$r['resultado'] = 'error';
	// 		$r['mensaje'] =  $e->getMessage();
	// 	}
	// 	return $r['resultado'];
	// }
}
?>
