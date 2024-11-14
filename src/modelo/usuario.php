<?php
require_once('config/db.php');

class Usuario extends DB{
  private $cedula;
  private $contrasena;

	function set_cedula($valor){
    $this->cedula = $valor;
	}
  function set_contrasena($valor){
    $this->nombre_apellido = $valor;
  }

	function iniciar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
			$resultados = $co->query("SELECT * from empleados where ced_empleado = '$this->usuario'");
			if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
          $trabajador['ced_empleado'] = $resultado['ced_empleado'];
					$trabajador['contrasena'] = $resultado['contrasena'];
          array_push($respuesta, $trabajador);
				}
        if($trabajador['ced_empleado'] = $this->usuario && $trabajador['contrasena'] = $this->password){
          session_start();
        }

				$r['resultado'] =  $respuesta;
			}
			else{
				$r['resultado'] = 'consultar';
				$r['mensaje'] =  '';
			}
		}catch(Exception $e){
			$r['resultado'] = 'error';
			$r['mensaje'] =  $e->getMessage();
		}
		return $r['resultado'];
	}
}
?>
