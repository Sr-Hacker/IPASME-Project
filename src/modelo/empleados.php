<?php
require_once('config/db.php');

class Empleado extends DB{
  private $ced_empleado;
  private $nombre;
  private $apellido;
  private $fecha_nacimiento;
  private $telefono;
  private $contrasena;
  private $rol;
  private $sexo;
  private $estado_provincia;
  private $ciudad;
  private $direccion;
  private $numero_casa;
  private $codigo_postal;
  private $correo;

	function set_ced_empleado($valor){
		$this->ced_empleado = $valor;
	}
	function set_nombre($valor){
		$this->nombre = $valor;
	}
	function set_apellido($valor){
		$this->apellido = $valor;
	}
	function set_fecha_nacimiento($valor){
		$this->fecha_nacimiento = $valor;
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
  function set_sexo($valor){
		$this->sexo = $valor;
	}
  function set_estado_provincia($valor){
		$this->estado_provincia = $valor;
	}
  function set_ciudad($valor){
		$this->ciudad = $valor;
	}
  function set_direccion($valor){
		$this->direccion = $valor;
	}
  function set_numero_casa($valor){
		$this->numero_casa = $valor;
	}
  function set_codigo_postal($valor){
		$this->codigo_postal = $valor;
	}
  function set_correo($valor){
		$this->correo = $valor;
	}

	function incluir(){
		$r = array();
    try {
      $bd = $this->conecta();
      $query = $bd->prepare("
        INSERT INTO empleados (
          ced_empleado,
          nombre,
          apellido,
          fecha_nacimiento,
          telefono,
          contrasena,
          rol,
          sexo,
          estado_provincia,
          ciudad,
          direccion,
          numero_casa,
          codigo_postal,
          correo
        ) VALUES (
          :ced_empleado,
          :nombre,
          :apellido,
          :fecha_nacimiento,
          :telefono,
          :contrasena,
          :rol,
          :sexo,
          :estado_provincia,
          :ciudad,
          :direccion,
          :numero_casa,
          :codigo_postal,
          :correo
        )
      ");

      $query->execute([
        ':ced_empleado' => $this->ced_empleado,
        ':nombre' => $this->nombre,
        ':apellido' => $this->apellido,
        ':fecha_nacimiento' => $this->fecha_nacimiento,
        ':telefono' => $this->telefono,
        ':contrasena' => $this->contrasena,
        ':rol' => $this->rol,
        ':sexo' => $this->sexo,
        ':estado_provincia' => $this->estado_provincia,
        ':ciudad' => $this->ciudad,
        ':direccion' => $this->direccion,
        ':numero_casa' => $this->numero_casa,
        ':codigo_postal' => $this->codigo_postal,
        ':correo' => $this->correo
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
        nombre = :nombre,
        apellido = :apellido,
        fecha_nacimiento = :fecha_nacimiento,
        telefono = :telefono,
        contrasena = :contrasena,
        rol = :rol,
        sexo = :sexo,
        estado_provincia = :estado_provincia,
        ciudad = :ciudad,
        direccion = :direccion,
        numero_casa = :numero_casa,
        codigo_postal = :codigo_postal,
        correo = :correo
        WHERE
        ced_empleado = :ced_empleado
      ");

      $query->execute([
        ':ced_empleado' => $this->ced_empleado,
        ':nombre' => $this->nombre,
        ':apellido' => $this->apellido,
        ':fecha_nacimiento' => $this->fecha_nacimiento,
        ':telefono' => $this->telefono,
        ':contrasena' => $this->contrasena,
        ':rol' => $this->rol,
        ':sexo' => $this->sexo,
        ':estado_provincia' => $this->estado_provincia,
        ':ciudad' => $this->ciudad,
        ':direccion' => $this->direccion,
        ':numero_casa' => $this->numero_casa,
        ':codigo_postal' => $this->codigo_postal,
        ':correo' => $this->correo
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
					$trabajador['nombre'] = $resultado['nombre'];
					$trabajador['apellido'] = $resultado['apellido'];
					$trabajador['fecha_nacimiento'] = $resultado['fecha_nacimiento'];
					$trabajador['telefono'] = $resultado['telefono'];
					$trabajador['contrasena'] = $resultado['contrasena'];
					$trabajador['rol'] = $resultado['rol'];
					$trabajador['sexo'] = $resultado['sexo'];
					$trabajador['estado_provincia'] = $resultado['estado_provincia'];
					$trabajador['ciudad'] = $resultado['ciudad'];
					$trabajador['direccion'] = $resultado['direccion'];
					$trabajador['numero_casa'] = $resultado['numero_casa'];
					$trabajador['codigo_postal'] = $resultado['codigo_postal'];
					$trabajador['correo'] = $resultado['correo'];
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
