<?php
require_once('config/db.php');

class Empleado extends DB{
  private $id;
  private $nombre;
  private $apellido;
  private $cedula;
  private $telefono;
  private $contrasena;
  private $rol;

	function set_id($valor){
		$this->id = $valor;
	}
	function set_name($valor){
		$this->nombre = $valor;
	}
	function set_apellido($valor){
		$this->apellido = $valor;
	}
	function set_cedula($valor){
		$this->cedula = $valor;
	}
  function set_telefono($valor){
		$this->telefono = $valor;
	}
  function set_contrasena($valor){
		$this->contrasena = $valor;
	}
  function set_rol($valor){
		$this->rol = $valor;
	}

	function incluir(){
		$r = array();
		if(!$this->existe($this->cedula)){
			try {
        $bd = $this->conecta();
        $query = $bd->prepare("
          INSERT INTO empleados (
            apellido,
            nombre,
            telefono,
            contrasena,
            cedula,
            rol
          ) VALUES (
            :apellido,
            :nombre,
            :telefono,
            :contrasena,
            :cedula,
            :rol
          )
        ");

        $query->execute([
          ':apellido' => $this->apellido,
          ':nombre' => $this->nombre,
          ':telefono' => $this->telefono,
          ':contrasena' => $this->contrasena,
          ':cedula' => $this->cedula,
          ':rol' => $this->rol
        ]);

        $r['resultado'] = 'incluir';
        $r['mensaje'] = 'Registro Incluido';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			  $r['mensaje'] =  $e->getMessage();
			}
		} else {
			$r['resultado'] = 'incluir';
			$r['mensaje'] =  'Ya existe la cedula';
		}
    $result = $this->consultar();
		return $result;
	}

	function modificar(){
    $r = array();
    try {
        $co = $this->conecta();
        $co->query("UPDATE empleados SET
          apellido = '$this->apellido',
          nombre = '$this->nombre',
          telefono = '$this->telefono',
          contrasena = '$this->contrasena',
          cedula = '$this->cedula',
          rol = '$this->rol'
          WHERE
          id = '$this->id'
        ");
        $r['resultado'] = 'modificar';
        $r['mensaje'] =  'Registro Modificado';
      } catch(Exception $e) {
        $r['resultado'] = 'error';
        $r['mensaje'] =  $e->getMessage();
      }
    $result = $this->consultar();
		return $result;
	}

	function eliminar(){
    $r = array();
    try {
      $co = $this->conecta();
      $co->query("DELETE FROM empleados
        WHERE
        id = '$this->id'
        ");
        $r['resultado'] = 'eliminar';
        $r['mensaje'] =  'Registro Eliminado';
    } catch(Exception $e) {
      $r['resultado'] = 'error';
      $r['mensaje'] =  $e->getMessage();
    }
    $result = $this->consultar();
		return $result;
	}

	function consultar(){
    $r = array();
		try{
      $co = $this->conecta();
			$resultados = $co->query("SELECT * from empleados");

			if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
					$trabajador['id'] = $resultado['id'];
					$trabajador['nombre'] = $resultado['nombre'];
					$trabajador['apellido'] = $resultado['apellido'];
					$trabajador['telefono'] = $resultado['telefono'];
					$trabajador['cedula'] = $resultado['cedula'];
					$trabajador['contrasena'] = $resultado['contrasena'];
					$trabajador['rol'] = $resultado['rol'];
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

  function buscar() {
    try {
      $co = $this->conecta();
      $stmt = $co->prepare("SELECT * FROM empleados WHERE cedula = :cedula");
      $stmt->bindParam(':cedula', $this->cedula, PDO::PARAM_STR);
      $stmt->execute();
      $fila = $stmt->fetchAll(PDO::FETCH_BOTH);
      return $fila;
    } catch (Exception $e) {
      return false;
    }
  }

  private function existe($cedula){
    try{
      $co = $this->conecta();
			$resultado = $co->query("SELECT * FROM empleados WHERE cedula='$cedula'");

			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			if($fila){
				return true;
			}
			else{
				return false;;
			}
		}catch(Exception $e){
			return false;
		}
	}
}?>
