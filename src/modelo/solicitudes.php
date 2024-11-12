<?php
require_once('config/db.php');

class Solicitud extends DB{
  private $n_solicitud;
  private $ced_afiliado;
  private $cod_tramite;
  private $estado_solicitud;
  private $fecha_emision;
  private $fecha_final;
  private $condicion_aceptado_denegado;

	function set_n_solicitud($valor){
		$this->n_solicitud = $valor;
	}
	function set_ced_afiliado($valor){
		$this->ced_afiliado = $valor;
	}
	function set_cod_tramite($valor){
		$this->cod_tramite = $valor;
	}
	function set_estado_solicitud($valor){
		$this->estado_solicitud = $valor;
	}
  function set_fecha_emision($valor){
		$this->fecha_emision = $valor;
	}
  function set_fecha_final($valor){
		$this->fecha_final = $valor;
	}
  function set_condicion_aceptado_denegado($valor){
		$this->condicion_aceptado_denegado = $valor;
	}

	function incluir(){
		$r = array();
		if(!$this->existe($this->cedula)){
			try {
        $bd = $this->conecta();
        $query = $bd->prepare("
          INSERT INTO reposos (
            n_solicitud,
            ced_afiliado,
            cod_tramite,
            estado_solicitud,
            fecha_emision,
            fecha_final,
            condicion_aceptado_denegado
          ) VALUES (
            :n_solicitud,
            :ced_afiliado,
            :cod_tramite,
            :estado_solicitud,
            :fecha_emision,
            :fecha_final,
            :condicion_aceptado_denegado
          )
        ");

        $query->execute([
          ':n_solicitud' => $this->n_solicitud,
          ':ced_afiliado' => $this->ced_afiliado,
          ':cod_tramite' => $this->cod_tramite,
          ':estado_solicitud' => $this->estado_solicitud,
          ':fecha_emision' => $this->fecha_emision,
          ':fecha_final' => $this->fecha_final,
          ':condicion_aceptado_denegado' => $this->condicion_aceptado_denegado
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
          n_solicitud = '$this->n_solicitud',
          ced_afiliado = '$this->ced_afiliado',
          cod_tramite = '$this->cod_tramite',
          estado_solicitud = '$this->estado_solicitud',
          fecha_emision = '$this->fecha_emision',
          fecha_final = '$this->fecha_final',
          condicion_aceptado_denegado = '$this->condicion_aceptado_denegado'
          WHERE
          n_solicitud = '$this->n_solicitud'
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
        n_solicitud = '$this->n_solicitud'
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
					$trabajador['n_solicitud'] = $resultado['n_solicitud'];
					$trabajador['ced_afiliado'] = $resultado['ced_afiliado'];
					$trabajador['cod_tramite'] = $resultado['cod_tramite'];
					$trabajador['estado_solicitud'] = $resultado['estado_solicitud'];
					$trabajador['fecha_emision'] = $resultado['fecha_emision'];
					$trabajador['fecha_final'] = $resultado['fecha_final'];
					$trabajador['condicion_aceptado_denegado'] = $resultado['condicion_aceptado_denegado'];
          array_push($respuesta, $trabajador);
				}
				$r['resultado'] =  $respuesta;
				$r['mensaje'] =  'consultar solicitudes';
			}
			else{
				$r['resultado'] = [];
				$r['mensaje'] =  'no hay solicitudes';
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
