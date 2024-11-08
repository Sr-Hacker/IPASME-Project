<?php
require_once('config/db.php');

class Empleado extends DB{

  private $n_reposo;
  private $n_consulta;
  private $motivo;
  private $instrucciones;
  private $fecha_inicio;
  private $fecha_final;

	function set_n_reposo($valor){
		$this->n_reposo = $valor;
	}
	function set_n_consulta($valor){
		$this->n_consulta = $valor;
	}
	function set_motivo($valor){
		$this->motivo = $valor;
	}
	function set_instrucciones($valor){
		$this->instrucciones = $valor;
	}
  function set_fecha_inicio($valor){
		$this->fecha_inicio = $valor;
	}
  function set_fecha_final($valor){
		$this->fecha_final = $valor;
	}

	function incluir(){
		$r = array();
    try {
      $bd = $this->conecta();
      $query = $bd->prepare("
        INSERT INTO reposos (
          n_reposo,
          n_consulta,
          motivo,
          instrucciones,
          fecha_inicio,
          fecha_final
        ) VALUES (
          :n_reposo,
          :n_consulta,
          :motivo,
          :instrucciones,
          :fecha_inicio,
          :fecha_final
        )
      ");

      $query->execute([
        ':n_reposo' => $this->n_reposo,
        ':n_consulta' => $this->n_consulta,
        ':motivo' => $this->motivo,
        ':instrucciones' => $this->instrucciones,
        ':fecha_inicio' => $this->fecha_inicio,
        ':fecha_final' => $this->fecha_final
      ]);

      $consulta = $this->consultar();
      $r['resultado'] =  $consulta['resultado'];
      $r['mensaje'] = 'Registro Incluido';
    } catch(Exception $e) {
      $consulta = $this->consultar();
      $r['resultado'] =  $consulta['resultado'];
      $r['mensaje'] =  $e->getMessage();
    }
		return $r;
	}

	function modificar(){
    $r = array();
    try {
      $co = $this->conecta();
      $co->query("UPDATE reposos SET
        n_reposo = '$this->n_reposo',
        n_consulta = '$this->n_consulta',
        motivo = '$this->motivo',
        instrucciones = '$this->instrucciones',
        fecha_inicio = '$this->fecha_inicio',
        fecha_final = '$this->fecha_final'
        WHERE
        n_reposo = '$this->n_reposo'
      ");
      $consulta = $this->consultar();
      $r['resultado'] =  $consulta['resultado'];
      $r['mensaje'] =  'Registro Modificado';
    } catch(Exception $e) {
      $consulta = $this->consultar();
      $r['resultado'] =  $consulta['resultado'];
      $r['mensaje'] =  $e->getMessage();
    }
		return $r;
	}

	function eliminar(){
    $r = array();
    try {
      $co = $this->conecta();
      $co->query("DELETE FROM reposos
        WHERE
        n_reposo = '$this->n_reposo'
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
					$trabajador['n_reposo'] = $resultado['n_reposo'];
					$trabajador['n_consulta'] = $resultado['n_consulta'];
					$trabajador['motivo'] = $resultado['motivo'];
					$trabajador['instrucciones'] = $resultado['instrucciones'];
					$trabajador['fecha_inicio'] = $resultado['fecha_inicio'];
					$trabajador['fecha_final'] = $resultado['fecha_final'];
          array_push($respuesta, $trabajador);
				}
        $consulta = $this->consultar();
        $r['resultado'] =  $consulta['resultado'];
				$r['mensaje'] =  'consulta';
			}
			else{
        $consulta = $this->consultar();
        $r['resultado'] =  $consulta['resultado'];
				$r['mensaje'] =  '';
			}
		}catch(Exception $e){
      $consulta = $this->consultar();
      $r['resultado'] =  $consulta['resultado'];
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
