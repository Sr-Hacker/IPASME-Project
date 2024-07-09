<?php
require_once('config/db.php');

class Especialidad extends DB{
  private $id;
  private $nombre;
  private $codigo;

	function set_id($valor){
		$this->id = $valor;
	}
	function set_nombre($valor){
		$this->nombre = $valor;
	}
	function set_codigo($valor){
		$this->codigo = $valor;
	}

	function incluir(){
		$r = array();
		if(!$this->existe($this->codigo)){
			try {
        $bd = $this->conecta();
        $query = $bd->prepare("
          INSERT INTO especialidades (
            nombre,
            codigo
          ) VALUES (
            :nombre,
            :codigo
          )
        ");

        $query->execute([
          ':nombre' => $this->nombre,
          ':codigo' => $this->codigo,
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

	function modificar(){
    $r = array();
    try {
        $co = $this->conecta();
        $co->query("UPDATE especialidades SET
          nombre = '$this->nombre',
          codigo = '$this->codigo'
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
      $co->query("DELETE FROM especialidades
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
			$resultados = $co->query("SELECT * from especialidades");

			if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
					$especialidad['id'] = $resultado['id'];
					$especialidad['nombre'] = $resultado['nombre'];
					$especialidad['codigo'] = $resultado['codigo'];
          array_push($respuesta, $especialidad);
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

  function buscar() {
    try {
      $co = $this->conecta();
      $stmt = $co->prepare("SELECT * FROM especialidades WHERE codigo = :codigo");
      $stmt->bindParam(':codigo', $this->codigo, PDO::PARAM_STR);
      $stmt->execute();
      $fila = $stmt->fetchAll(PDO::FETCH_BOTH);
      return $fila;
    } catch (Exception $e) {
      return false;
    }
  }

  private function existe($codigo){
    try{
      $co = $this->conecta();
			$resultado = $co->query("SELECT * FROM especialidades WHERE codigo='$codigo'");

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
