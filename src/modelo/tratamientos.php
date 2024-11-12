<?php
require_once('config/db.php');

class Tratamiento extends DB{
  private $n_tratamiento;
  private $cod_informe;
  private $tipo_tratamiento;
  private $instrucciones;
  private $motivo;
  private $tiempo_tratamiento;

	function set_n_tratamiento($valor){
		$this->n_tratamiento = $valor;
	}
	function set_cod_informe($valor){
		$this->cod_informe = $valor;
	}
	function set_tipo_tratamiento($valor){
		$this->tipo_tratamiento = $valor;
	}
	function set_instrucciones($valor){
		$this->instrucciones = $valor;
	}
  function set_motivo($valor){
		$this->motivo = $valor;
	}
  function set_tiempo_tratamiento($valor){
		$this->tiempo_tratamiento = $valor;
	}

	function incluir(){
		$r = array();
			try {
        $bd = $this->conecta();
        $query = $bd->prepare("INSERT INTO tratamientos (
            n_tratamiento,
            cod_informe,
            tipo_tratamiento,
            instrucciones,
            motivo,
            tiempo_tratamiento
          ) VALUES (
            :n_tratamiento,
            :cod_informe,
            :tipo_tratamiento,
            :instrucciones,
            :motivo,
            :tiempo_tratamiento
          )
        ");

        $query->execute([
          ':n_tratamiento' => $this->n_tratamiento,
          ':cod_informe' => $this->cod_informe,
          ':tipo_tratamiento' => $this->tipo_tratamiento,
          ':instrucciones' => $this->instrucciones,
          ':motivo' => $this->motivo,
          ':tiempo_tratamiento' => $this->tiempo_tratamiento
        ]);

        $r['resultado'] =  $this->consultar();
        $r['mensaje'] = 'Registro Incluido';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			  $r['mensaje'] =  $e->getMessage();
			}

		return $r;
	}

	function modificar(){
    $r = array();
    try {
        $co = $this->conecta();
        $co->query("UPDATE tratamientos SET
          n_tratamiento = '$this->n_tratamiento',
          cod_informe = '$this->cod_informe',
          tipo_tratamiento = '$this->tipo_tratamiento',
          instrucciones = '$this->instrucciones',
          motivo = '$this->motivo',
          tiempo_tratamiento = '$this->tiempo_tratamiento'
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
      $co->query("DELETE FROM tratamientos
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
      $db = $this->conecta();
			$resultados = $db->query("SELECT * from tratamientos");

			if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
					$tratamientos['n_tratamiento'] = $resultado['n_tratamiento'];
					$tratamientos['cod_informe'] = $resultado['cod_informe'];
					$tratamientos['tipo_tratamiento'] = $resultado['tipo_tratamiento'];
					$tratamientos['instrucciones'] = $resultado['instrucciones'];
					$tratamientos['motivo'] = $resultado['motivo'];
					$tratamientos['tiempo_tratamiento'] = $resultado['tiempo_tratamiento'];
          array_push($respuesta, $tratamientos);
				}
				$r['resultado'] =  $respuesta;
				$r['mensaje'] =  'consulta';
			}
			else{
				$r['resultado'] = 'consultar';
				$r['mensaje'] =  'sin resultados';
			}

		}catch(Exception $e){
			$r['resultado'] = 'error';
			$r['mensaje'] =  $e->getMessage();
		}
		return $r;
	}

  function buscar() {
    try {
      $co = $this->conecta();
      $stmt = $co->prepare("SELECT * FROM tratamientos WHERE cedula = :cedula");
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
