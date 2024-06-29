<?php
require_once('modelo/db.php');

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
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			try {
					$co->query("INSERT INTO empleados(
            apellido,
            nombre,
            telefono,
            contrasena,
            cedula,
            rol
						)
						VALUES(
              '$this->apellido',
              '$this->nombre',
              '$this->telefono',
              '$this->contrasena',
              '$this->cedula',
              '$this->rol'
						)");
						$r['resultado'] = 'incluir';
			      $r['mensaje'] =  'Registro Inluido';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			  $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'incluir';
			$r['mensaje'] =  'Ya existe la cedula';
		}

    $result = $this->consultar();
		return $result;
	}

	function modificar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->cedula)){
			try {
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
		}
		else{
			$r['resultado'] = 'modificar';
			$r['mensaje'] =  'Cedula no registrada';
		}
    $result = $this->consultar();
		return $result;
	}

	function eliminar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->cedula)){
			try {
					$co->query("DELETE FROM empleados
						WHERE
						cedula = '$this->cedula'
						");
						$r['resultado'] = 'eliminar';
			      $r['mensaje'] =  'Registro Eliminado';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'eliminar';
			$r['mensaje'] =  'No existe la cedula';
		}
    $result = $this->consultar();
		return $result;
	}

	function consultar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
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

	private function existe($cedula){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
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
}
?>
