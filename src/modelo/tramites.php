<?php
require_once('config/db.php');

class Tramite extends DB{
  private $cod_tramite;
  private $ced_empleado;
  private $nombre;
  private $descripcion;

	function set_cod_tramite($valor){
		$this->cod_tramite = $valor;
	}
	function set_ced_empleado($valor){
		$this->ced_empleado = $valor;
	}
  function set_nombre($valor){
		$this->nombre = $valor;
	}
	function set_descripcion($valor){
		$this->descripcion = $valor;
	}

	function incluir(){
		$r = array();
		if(!$this->existe($this->cedula)){
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			try {
        $co->query("INSERT INTO tramite(
          cod_tramite,
          ced_empleado,
          nombre,
          descripcion
          )
          VALUES(
            '$this->cod_tramite',
            '$this->ced_empleado',
            '$this->nombre',
            '$this->descripcion'
          )");
        $r['resultado'] = 'incluir';
        $r['mensaje'] =  'Registro Inluido';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			  $r['mensaje'] = $e->getMessage();
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
        $co->query("UPDATE tramite SET
          cod_tramite = '$this->cod_tramite',
          ced_empleado = '$this->ced_empleado',
          nombre = '$this->nombre',
          descripcion = '$this->descripcion'
          WHERE
          cod_tramite = '$this->cod_tramite'
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
					$co->query("DELETE FROM tramite
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
		$r = array();
		try{
      $db = $this->conecta();
			$resultados = $db->query("SELECT * from tramite");

			if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
					$tramite['cod_tramite'] = $resultado['cod_tramite'];
          $tramite['ced_empleado'] = $resultado['ced_empleado'];
          $tramite['nombre'] = $resultado['nombre'];
          $tramite['descripcion'] = $resultado['descripcion'];
          array_push($respuesta, $tramite);
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
		return $r;
	}


	private function existe($cedula){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			$resultado = $co->query("SELECT * FROM tramite WHERE cedula='$cedula'");

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
