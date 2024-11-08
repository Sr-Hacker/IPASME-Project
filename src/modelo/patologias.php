<?php
require_once('config/db.php');

class Patologia extends DB{
  private $cod_patologia;
  private $nombre;
  private $descripcion;

	function set_cod_patologia($valor){
		$this->cod_patologia = $valor;
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
			try {
        $bd = $this->conecta();
        $query = $bd->prepare("
          INSERT INTO reposos (
            cod_patologia,
            nombre,
            descripcion
          ) VALUES (
            :cod_patologia,
            :nombre,
            :descripcion
          )
        ");

        $query->execute([
          ':cod_patologia' => $this->cod_patologia,
          ':nombre' => $this->nombre,
          ':descripcion' => $this->descripcion
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
        $co->query("UPDATE reposos SET
          cod_patologia = '$this->cod_patologia',
          nombre = '$this->nombre',
          descripcion = '$this->descripcion'
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
      $co->query("DELETE FROM reposos
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
			$resultados = $co->query("SELECT * from reposos");

			if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
					$trabajador['cod_patologia'] = $resultado['cod_patologia'];
					$trabajador['nombre'] = $resultado['nombre'];
					$trabajador['descripcion'] = $resultado['descripcion'];
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
      $stmt = $co->prepare("SELECT * FROM reposos WHERE cedula = :cedula");
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
			$resultado = $co->query("SELECT * FROM beneficiarios WHERE cedula='$cedula'");

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
