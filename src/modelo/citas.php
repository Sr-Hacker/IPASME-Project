<?php
require_once('config/db.php');
require_once('modelo/medicos.php');
require_once('modelo/afiliados.php');
require_once('modelo/beneficiario.php');


class Cita extends DB{
  private $cod_cita;
  private $ced_afiliado;
  private $cod_especialidad_medico;
  private $ced_beneficiario;
  private $fecha;
  private $hora;
  private $detalle;
  private $vigente;

	function set_cod_cita($valor){
		$this->cod_cita = $valor;
	}
  function set_ced_afiliado($valor){
		$this->ced_afiliado = $valor;
	}
  function set_cod_especialidad_medico($valor){
    $this->cod_especialidad_medico = $valor;
	}
  function set_ced_beneficiario($valor){
    $this->ced_beneficiario = $valor;
  }
  function set_fecha($valor){
    $this->fecha = $valor;
  }
  function set_hora($valor){
    $this->hora = $valor;
  }
  function set_detalle($valor){
    $this->detalle = $valor;
  }
  function set_vigente($valor){
    $this->vigente = $valor;
  }

	function incluir(){
		$r = array();
    try {
      $bd = $this->conecta();
      $query = $bd->prepare("
        INSERT INTO citas (
          cod_cita,
          ced_afiliado,
          cod_especialidad_medico,
          ced_beneficiario,
          fecha,
          hora,
          detalle,
          vigente
        ) VALUES (
          :cod_cita,
          :ced_afiliado,
          :cod_especialidad_medico,
          :ced_beneficiario,
          :fecha,
          :hora,
          :detalle,
          :vigente
        )
      ");

      $query->execute([
        ':cod_cita' => $this->cod_cita,
        ':ced_afiliado' => $this->ced_afiliado,
        ':cod_especialidad_medico' => $this->cod_especialidad_medico,
        ':ced_beneficiario' => $this->ced_beneficiario,
        ':fecha' => $this->fecha,
        ':hora' => $this->hora,
        ':detalle' => $this->detalle,
        ':vigente' => $this->vigente
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
          cod_cita = '$this->cod_cita',
          ced_afiliado = '$this->ced_afiliado',
          cod_especialidad_medico = '$this->cod_especialidad_medico',
          ced_beneficiario = '$this->ced_beneficiario',
          fecha = '$this->fecha',
          hora = '$this->hora',
          detalle = '$this->detalle',
          vigente = '$this->vigente'
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
			$resultados = $bd->query("SELECT * FROM citas");
			if($resultados){

				$respuesta = [];
				foreach($resultados as $resultado){
					$citas['cod_cita'] = $resultado['cod_cita'];
          $citas['ced_afiliado'] = $resultado['ced_afiliado'];
          $citas['cod_especialidad_medico'] = $resultado['cod_especialidad_medico'];
          $citas['ced_beneficiario'] = $resultado['ced_beneficiario'];
          $citas['fecha'] = $resultado['fecha'];
          $citas['hora'] = $resultado['hora'];
          $citas['detalle'] = $resultado['detalle'];
          $citas['vigente'] = $resultado['vigente'];
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
			$resultados = $bd->query("SELECT * from medicos");
			if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
					$medico['id'] = $resultado['id'];
          $medico['nombres'] = $resultado['nombres'];
          $medico['apellidos'] = $resultado['apellidos'];
          $medico['cedula'] = $resultado['cedula'];
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
