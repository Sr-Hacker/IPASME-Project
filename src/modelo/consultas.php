<?php
require_once('config/db.php');
require_once('modelo/medicos.php');
require_once('modelo/afiliados.php');
require_once('modelo/beneficiario.php');


class Consulta extends DB{
  private $n_consulta;
  private $cod_cita;
  private $n_historia;
  private $motivo;
  private $detalle;

	function set_n_consulta($valor){
		$this->n_consulta = $valor;
	}
  function set_cod_cita($valor){
		$this->cod_cita = $valor;
	}
  function set_n_historia($valor){
    $this->n_historia = $valor;
	}
  function set_motivo($valor){
    $this->motivo = $valor;
  }
  function set_detalle($valor){
    $this->detalle = $valor;
  }

	function incluir(){
		$r = array();
    try {
      $bd = $this->conecta();
      $query = $bd->prepare("
        INSERT INTO consulta (
          n_consulta,
          cod_cita,
          n_historia,
          motivo,
          detalle
        ) VALUES (
          :n_consulta,
          :cod_cita,
          :n_historia,
          :motivo,
          :detalle
        )
      ");

      $query->execute([
        ':n_consulta' => $this->n_consulta,
        ':cod_cita' => $this->cod_cita,
        ':n_historia' => $this->n_historia,
        ':motivo' => $this->motivo,
        ':detalle' => $this->detalle
      ]);

      $r['resultado'] = 'incluir';
      $r['mensaje'] = 'Registro Incluido';
    } catch(Exception $e) {
      $r['resultado'] = 'error';
      $r['mensaje'] =  $e->getMessage();
    }
    $result = $this->consultar();
		return $result;
	}

	function modificar(){
    $r = array();
    try {
      $bd = $this->conecta();
      $bd->query("UPDATE consulta SET
        n_consulta = '$this->n_consulta',
        cod_cita = '$this->cod_cita',
        n_historia = '$this->n_historia',
        motivo = '$this->motivo',
        detalle = '$this->detalle'
        WHERE
        n_consulta = '$this->n_consulta'
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
      $bd = $this->conecta();
      $bd->query("DELETE FROM consulta
        WHERE
        n_consulta = '$this->n_consulta'
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
      $bd = $this->conecta();
			$resultados = $bd->query("SELECT * FROM consulta");
			if($resultados){

				$respuesta = [];
				foreach($resultados as $resultado){
					$citas['n_consulta'] = $resultado['n_consulta'];
          $citas['cod_cita'] = $resultado['cod_cita'];
          $citas['n_historia'] = $resultado['n_historia'];
          $citas['motivo'] = $resultado['motivo'];
          $citas['detalle'] = $resultado['detalle'];
          array_push($respuesta, $citas);
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

  function consultar_medicos() {
    $r1 = [];
    try{
      $bd = $this->conecta();
			$resultados = $bd->query("SELECT * from consulta");
			if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
					$medico['n_consulta'] = $resultado['n_consulta'];
          $medico['cod_cita'] = $resultado['cod_cita'];
          $medico['n_historia'] = $resultado['n_historia'];
          $medico['motivo'] = $resultado['motivo'];
          $medico['detalle'] = $resultado['detalle'];
          array_push($respuesta, $medico);
				}
				$r1 =  $respuesta;
			}
			else{
				$r1['resultado'] = 'consultar';
				$r1['mensaje'] =  '';
			}
		}catch(Exception $e){
			$r1['resultado'] = 'error';
			$r1['mensaje'] =  $e->getMessage();
		}
    return $r1;
  }

  function consultar_pacientes() {
    $r1 = [];
    try{
      $bd = $this->conecta();
			$resultados = $bd->query("SELECT * from consulta");
			if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
					$afiliado['n_consulta'] = $resultado['n_consulta'];
          $afiliado['cod_cita'] = $resultado['cod_cita'];
          $afiliado['n_historia'] = $resultado['n_historia'];
          $afiliado['motivo'] = $resultado['motivo'];
          $afiliado['detalle'] = 'detalle';
          array_push($respuesta, $afiliado);
				}
				$r1 =  $respuesta;
			}
			else{
				$r1['resultado'] = 'consultar';
				$r1['mensaje'] =  '';
			}
		}catch(Exception $e){
			$r1['resultado'] = 'error';
			$r1['mensaje'] =  $e->getMessage();
		}

    return $r1;
  }

  function buscar() {
    try {
      $bd = $this->conecta();
      $query = $bd->prepare("SELECT * FROM citas WHERE fecha = :fecha");
      $query->bindParam(':fecha', $this->fecha, PDO::PARAM_STR);
      $query->execute();
      $fila = $query->fetchAll(PDO::FETCH_BOTH);
      return $fila;
    } catch (Exception $e) {
      return false;
    }
  }

	private function existe($cedula){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			$resultado = $co->query("SELECT * FROM citas WHERE cedula='$cedula'");

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
