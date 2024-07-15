<?php
require_once('config/db.php');
require_once('modelo/especialidad.php');

class Medico extends DB{
  private $id;
  private $nombres;
  private $apellidos;
  private $externo;
  private $cedula;
  private $telefono;
  private $id_especialidad;
  private $id_medico;

	function set_id($valor){
		$this->id = $valor;
	}
  function set_nombres($valor){
		$this->nombres = $valor;
	}
  function set_apellidos($valor){
		$this->apellidos = $valor;
	}
  function set_externo($valor){
		$this->externo = $valor;
	}
  function set_cedula($valor){
		$this->cedula = $valor;
	}
  function set_telefono($valor){
		$this->telefono = $valor;
	}
  function set_id_especialidad($valor){
		$this->id_especialidad = $valor;
	}
  function set_id_medico($valor){
		$this->id_medico = $valor;
	}

	function incluir(){
		$r = array();
    $r2 = array();
		if(!$this->existe($this->cedula)){
			try {
        $bd = $this->conecta();
        $query = $bd->prepare("
          INSERT INTO medicos (
            nombres,
            apellidos,
            externo,
            cedula,
            telefono
          ) VALUES (
            :nombres,
            :apellidos,
            :externo,
            :cedula,
            :telefono
          )
        ");

        $query->execute([
          ':nombres' => $this->nombres,
          ':apellidos' => $this->apellidos,
          ':externo' => $this->externo,
          ':cedula' => $this->cedula,
          ':telefono' => $this->telefono,
        ]);
        $r['id'] = $bd->lastInsertId();
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			  $r['mensaje'] =  $e->getMessage();
			}
		} else {
			$r['resultado'] = 'incluir';
			$r['mensaje'] =  'Esta especialidad ya existe';
		}
    $this->set_id_medico($r["id"]);

    try {
      $bd = $this->conecta();
      $query = $bd->prepare("
        INSERT INTO medico_especialidad (
          id_medico,
          id_especialidad
        ) VALUES (
          :id_medico,
          :id_especialidad
        )
      ");

      $query->execute([
        ':id_medico' => $this->id_medico,
        ':id_especialidad' => $this->id_especialidad
      ]);
      $r2['id'] = $bd->lastInsertId();
    } catch(Exception $e) {
      $r2['resultado'] = 'error';
      $r2['mensaje'] =  $e->getMessage();
    }

    $result = $this->consultar();
		return $result;
	}

	public function modificar(){
    $r = array();
    try {
      $co = $this->conecta();
			$co->query("UPDATE medicos SET
        nombres = '$this->nombres',
        apellidos = '$this->apellidos',
        externo = '$this->externo',
        cedula = '$this->cedula',
        telefono = '$this->telefono'
        WHERE
        id = '$this->id_medico'
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
      $co->query("DELETE FROM medico_especialidad
        WHERE
        id = '$this->id'
        ");
        $r['resultado'] = 'eliminar';
        $r['mensaje'] =  'Registro Eliminado';
    } catch(Exception $e) {
      $r['resultado'] = 'error';
      $r['mensaje'] =  $e->getMessage();
    }

    try {
      $co = $this->conecta();
      $co->query("DELETE FROM medicos
        WHERE
        id = '$this->id_medico'
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
        m_e.*,
          m1.nombres AS nombres_medico,
          m1.apellidos AS apellidos_medico,
          m1.externo AS externo_medico,
          m1.cedula AS cedula_medico,
          m1.telefono AS telefono_medico,

          e2.nombre AS nombre_especialidad,
          e2.codigo AS codigo_especialidad
        FROM
          medico_especialidad m_e
        JOIN
          medicos m1 ON m_e.id_medico = m1.id
        JOIN
          especialidades e2 ON m_e.id_especialidad = e2.id;
      ");

      if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
					$medicos['id'] = $resultado['id'];
					$medicos['id_medico'] = $resultado['id_medico'];
					$medicos['id_especialidad'] = $resultado['id_especialidad'];

					$medicos['nombres_medico'] = $resultado['nombres_medico'];
          $medicos['apellidos_medico'] = $resultado['apellidos_medico'];
          $medicos['externo_medico'] = $resultado['externo_medico'];
          $medicos['cedula_medico'] = $resultado['cedula_medico'];
          $medicos['telefono_medico'] = $resultado['telefono_medico'];

          $medicos['nombre_especialidad'] = $resultado['nombre_especialidad'];
          $medicos['codigo_especialidad'] = $resultado['codigo_especialidad'];
          array_push($respuesta, $medicos);
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

  function consultar_especialidades(){
    $especialidad = new Especialidad();
    return $especialidad->consultar();
	}

	private function existe($cedula){
    try{
      $bd = $this->conecta();
			$resultado = $bd->query("SELECT * FROM medicos WHERE cedula='$cedula'");

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
