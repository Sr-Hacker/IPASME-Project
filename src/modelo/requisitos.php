<?php
require_once('config/db.php');

class Requisito extends DB{
  private $cod_requisito;
  private $nombre;

	function set_cod_requisito($valor){
		$this->cod_requisito = $valor;
	}
	function set_nombre($valor){
		$this->nombre = $valor;
	}

	function incluir(){
		$r = array();
		if(!$this->existe($this->cedula)){
			try {
        $bd = $this->conecta();
        $query = $bd->prepare("
          INSERT INTO reposos (
            cod_requisito,
            nombre
          ) VALUES (
            :cod_requisito,
            :nombre
          )
        ");

        $query->execute([
          ':cod_requisito' => $this->cod_requisito,
          ':nombre' => $this->nombre
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
          cod_requisito = '$this->cod_requisito',
          nombre = '$this->nombre'
          WHERE
          cod_requisito = '$this->cod_requisito'
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
        cod_requisito = '$this->cod_requisito'
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
					$trabajador['cod_requisito'] = $resultado['cod_requisito'];
					$trabajador['nombre'] = $resultado['nombre'];
          array_push($respuesta, $trabajador);
				}
				$r['resultado'] =  $respuesta;
				$r['mensaje'] =  'Consulta exitosa';
			}
			else{
				$r['resultado'] = [];
				$r['mensaje'] =  'no hay requisitos';
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
