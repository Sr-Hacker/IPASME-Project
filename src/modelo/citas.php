<?php
require_once('config/db.php');


class Cita extends DB{
  private $id;
  private $fecha;
  private $motivo;
  private $id_medico;
  private $id_beneficiario;
  private $id_familiar;

	function set_id($valor){
		$this->id = $valor;
	}
  function set_fecha($valor){
		$this->fecha = $valor;
	}
  function set_motivo($valor){
    $this->motivo = $valor;
	}
  function set_id_medico($valor){
    $this->id_medico = $valor;
  }
  function set_id_beneficiario($valor){
    $this->id_beneficiario = $valor;
  }
  function set_id_familiar($valor){
    $this->id_familiar = $valor;
  }

	function incluir(){
		$r = array();
			try {
        $bd = $this->conecta();
        $query = $bd->prepare("
          INSERT INTO citas (
            fecha,
            motivo
          ) VALUES (
            :fecha,
            :motivo
          )
        ");

        $query->execute([
          ':fecha' => $this->fecha,
          ':motivo' => $this->motivo,
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
      $co = $this->conecta();
      $co->query("UPDATE citas SET
          fecha = '$this->fecha',
          motivo = '$this->motivo'
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
      $co->query("DELETE FROM citas
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
			$resultados = $co->query("SELECT * from citas");
			if($resultados){

				$respuesta = [];
				foreach($resultados as $resultado){
					$citas['id'] = $resultado['id'];
          $citas['motivo'] = $resultado['motivo'];
          $citas['fecha'] = $resultado['fecha'];
          $citas['id_medico'] = $resultado['id_medico'];
          $citas['id_beneficiario'] = $resultado['id_beneficiario'];
          $citas['id_familiar'] = $resultado['id_familiar'];
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
		return $r['resultado'];
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
