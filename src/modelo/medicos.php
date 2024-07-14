<?php
require_once('config/db.php');

class Medico extends DB{
  private $id;
  private $nombres;
  private $apellidos;
  private $externo;
  private $cedula;
  private $telefono;

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

	function incluir(){
		$r = array();
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

        $r['resultado'] = 'incluir';
        $r['mensaje'] = 'Registro Incluido';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			  $r['mensaje'] =  $e->getMessage();
			}
		} else {
			$r['resultado'] = 'incluir';
			$r['mensaje'] =  'Esta especialidad ya existe';
		}
    $result = $this->consultar();
		return $result;
	}

	public function modificar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
			try {
					$co->query("UPDATE medicos SET
              nombres = '$this->nombres',
              apellidos = '$this->apellidos',
              externo = '$this->externo',
              cedula = '$this->cedula',
              telefono = '$this->telefono'
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
      $co->query("DELETE FROM medicos
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
			$resultados = $co->query("SELECT * from medicos");

      if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
					$medicos['id'] = $resultado['id'];
					$medicos['nombres'] = $resultado['nombres'];
          $medicos['apellidos'] = $resultado['apellidos'];
          $medicos['externo'] = $resultado['externo'];
          $medicos['cedula'] = $resultado['cedula'];
          $medicos['telefono'] = $resultado['telefono'];
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

	private function existe($cedula){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			$resultado = $co->query("SELECT * FROM medicos WHERE cedula='$cedula'");

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
