<?php
require_once('modelo/db.php');

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
			$resultados = $co->query("SELECT * from empleados where cadula = '$this->cedula'");
			if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
          $trabajador['cedula'] = $resultado['cedula'];
					$trabajador['apellidosynombres'] = $resultado['apellidosynombres'];
          array_push($respuesta, $trabajador);
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
