<?php
require_once('config/db.php');
require_once('modelo/medicos.php');
require_once('modelo/afiliados.php');
require_once('modelo/beneficiario.php');


class Cita extends DB{
  private $id;
  private $fecha;
  private $motivo;
  private $id_medico = 0;
  private $id_beneficiario = 0;
  private $id_afiliado = 0;

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
    if($valor){
      $this->id_beneficiario = $valor;
    }
  }
  function set_id_afiliado($valor){
    if($valor){
      $this->id_afiliado = $valor;
    }
  }

	function incluir(){
		$r = array();
    try {
      $bd = $this->conecta();
      $query = $bd->prepare("
        INSERT INTO citas (
          fecha,
          motivo,
          id_medico,
          id_afiliado
        ) VALUES (
          :fecha,
          :motivo,
          :id_medico,
          :id_afiliado
        )
      ");

      $query->execute([
        ':fecha' => $this->fecha,
        ':motivo' => $this->motivo,
        ':id_medico' => $this->id_medico,
        ':id_afiliado' => $this->id_afiliado
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
      $bd->query("UPDATE citas SET
          fecha = '$this->fecha',
          motivo = '$this->motivo',
          id_medico = '$this->id_medico',
          id_afiliado = '$this->id_afiliado'
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
      $bd = $this->conecta();
      $bd->query("DELETE FROM citas
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
      $bd = $this->conecta();
			$resultados = $bd->query("SELECT
        c.*,
          m1.nombres AS nombres_medico,
          m1.apellidos AS apellidos_medico,
          m1.cedula AS cedula_medico,

          a2.nombre AS nombre_afiliado,
          a2.apellido AS apellido_afiliado,
          a2.cedula AS cedula_afiliado
        FROM
          citas c
        JOIN
          medicos m1 ON c.id_medico = m1.id
        JOIN
          afiliados a2 ON c.id_afiliado = a2.id;
      ");
			if($resultados){

				$respuesta = [];
				foreach($resultados as $resultado){
					$citas['id'] = $resultado['id'];
          $citas['motivo'] = $resultado['motivo'];
          $citas['fecha'] = $resultado['fecha'];
          $citas['id_medico'] = $resultado['id_medico'];
          $citas['id_beneficiario'] = $resultado['id_beneficiario'];
          $citas['id_afiliado'] = $resultado['id_afiliado'];

          $citas['nombres_medico'] = $resultado['nombres_medico'];
          $citas['nombre_afiliado'] = $resultado['nombre_afiliado'];
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

  function consultar_medicos() {
    $medico = new Medico();
    return $medico->consultar();
  }

  function consultar_pacientes() {
    $r1 = [];
    try{
      $bd = $this->conecta();
			$resultados = $bd->query("SELECT * from afiliados");
			if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
					$afiliado['id'] = $resultado['id'];
          $afiliado['nombre'] = $resultado['nombre'];
          $afiliado['apellido'] = $resultado['apellido'];
          $afiliado['cedula'] = $resultado['cedula'];
          $afiliado['tipo'] = 'afiliado';
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
