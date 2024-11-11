<?php
require_once('config/db.php');

class Empleado extends DB{
  private $ced_empleado;
  private $nombres;
  private $apellidos;
  private $telefono_celular;
  private $contrasena;
  private $rol;

	function set_ced_empleado($valor){
		$this->ced_empleado = $valor;
	}
	function set_nombres($valor){
		$this->nombre = $valor;
	}
	function set_apellidos($valor){
		$this->apellido = $valor;
	}
	function set_telefono_celular($valor){
		$this->fecha_nacimiento = $valor;
	}
  function set_contrasena($valor){
		$this->telefono = $valor;
	}
  function set_rol($valor){
		$this->contrasena = $valor;
	}

	function incluir(){
		$r = array();
    try {
      $bd = $this->conecta();
      $query = $bd->prepare("
        INSERT INTO empleados (
          ced_empleado,
          nombres,
          apellidos,
          telefono_celular,
          contrasena,
          rol
        ) VALUES (
          :ced_empleado,
          :nombres,
          :apellidos,
          :telefono_celular,
          :contrasena,
          :rol
        )
      ");

      $query->execute([
        ':ced_empleado' => $this->ced_empleado,
        ':nombres' => $this->nombres,
        ':apellidos' => $this->apellidos,
        ':telefono_celular' => $this->telefono_celular,
        ':contrasena' => $this->contrasena,
        ':rol' => $this->rol
      ]);

      $consulta = $this->consultar();
      $r['resultado'] =  $consulta['resultado'];
      $r['mensaje'] = 'Registro Incluido';
    } catch(Exception $e) {
      $consulta = $this->consultar();
      $r['resultado'] =  $consulta['resultado'];
      $r['mensaje'] =  $e->getMessage();
    }
		return $r;
	}

	function modificar(){
    $r = array();
    try {
      $bd = $this->conecta();
			$query = $bd->prepare("UPDATE empleados SET
        ced_empleado = :ced_empleado,
        nombres = :nombres,
        apellidos = :apellidos,
        telefono_celular = :telefono_celular,
        contrasena = :contrasena,
        rol = :rol
        WHERE
        ced_empleado = :ced_empleado
      ");

      $query->execute([
        ':ced_empleado' => $this->ced_empleado,
        ':nombres' => $this->nombres,
        ':apellidos' => $this->apellidos,
        ':telefono_celular' => $this->telefono_celular,
        ':contrasena' => $this->contrasena,
        ':rol' => $this->rol
      ]);

      $consulta = $this->consultar();
      $r['resultado'] =  $consulta['resultado'];
      $r['mensaje'] =  'Registro Modificado';
    } catch(Exception $e) {
      $consulta = $this->consultar();
      $r['resultado'] =  $consulta['resultado'];
      $r['mensaje'] =  $e->getMessage();
    }
		return $r;
	}

	function eliminar(){
    $r = array();
    try {
      $bd = $this->conecta();
      $bd->query("DELETE FROM empleados
        WHERE
        ced_empleado = '$this->ced_empleado'
      ");
      $consulta = $this->consultar();
      $r['resultado'] =  $consulta['resultado'];
      $r['mensaje'] =  'Registro Eliminado';
    } catch(Exception $e) {
      $consulta = $this->consultar();
      $r['resultado'] =  $consulta['resultado'];
      $r['mensaje'] =  $e->getMessage();
    }
		return $r;
	}

	function consultar(){
    $r = array();
		try{
      $co = $this->conecta();
			$resultados = $co->query("SELECT * from empleados");

			if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
					$trabajador['ced_empleado'] = $resultado['ced_empleado'];
					$trabajador['nombres'] = $resultado['nombres'];
					$trabajador['apellidos'] = $resultado['apellidos'];
					$trabajador['telefono_celular'] = $resultado['telefono_celular'];
					$trabajador['contrasena'] = $resultado['contrasena'];
					$trabajador['rol'] = $resultado['rol'];
          array_push($respuesta, $trabajador);
				}
				$r['resultado'] =  $respuesta;
        $r['mensaje'] =  'consulta';
			}
			else{
				$r['resultado'] = [];
				$r['mensaje'] =  '';
			}

		}catch(Exception $e){
			$r['resultado'] = [];
			$r['mensaje'] =  $e->getMessage();
		}
		return $r;
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
