<?php
require_once('config/db.php');

class Informe extends DB{
  private $cod_informe;
  private $n_consulta;
  private $descripcion;
  private $diagnostico;

	function set_id($valor){
		$this->cod_informe = $valor;
	}
	function set_name($valor){
		$this->n_consulta = $valor;
	}
	function set_apellido($valor){
		$this->descripcion = $valor;
	}
	function set_cedula($valor){
		$this->diagnostico = $valor;
	}

	function incluir(){
		$r = array();
		if(!$this->existe($this->cedula)){
			try {
        $bd = $this->conecta();
        $query = $bd->prepare("
          INSERT INTO informe_medico (
            cod_informe,
            n_consulta,
            descripcion,
            diagnostico
          ) VALUES (
            :cod_informe,
            :n_consulta,
            :descripcion,
            :diagnostico
          )
        ");

        $query->execute([
          ':cod_informe' => $this->cod_informe,
          ':n_consulta' => $this->n_consulta,
          ':descripcion' => $this->descripcion,
          ':diagnostico' => $this->diagnostico
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
        $co->query("UPDATE informe_medico SET
          cod_informe = '$this->cod_informe',
          n_consulta = '$this->n_consulta',
          descripcion = '$this->descripcion',
          diagnostico = '$this->diagnostico'
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
      $co->query("DELETE FROM informe_medico
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
			$resultados = $co->query("SELECT * from informe_medico");

			if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
					$trabajador['cod_informe'] = $resultado['cod_informe'];
					$trabajador['n_consulta'] = $resultado['n_consulta'];
					$trabajador['descripcion'] = $resultado['descripcion'];
					$trabajador['diagnostico'] = $resultado['diagnostico'];
          array_push($respuesta, $trabajador);
				}
				$r['resultado'] =  $respuesta;
				$r['mensaje'] =  "consultar informes";
			}
			else{
				$r['resultado'] = [];
				$r['mensaje'] =  'no hay infomres';
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
      $stmt = $co->prepare("SELECT * FROM informe_medico WHERE cedula = :cedula");
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
			$resultado = $co->query("SELECT * FROM informe_medico WHERE cedula='$cedula'");

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
