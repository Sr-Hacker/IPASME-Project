<?php
require_once('config/db.php');

class Especialidad extends DB{
  private $cod_espe;
  private $nombre;

	function set_cod_espe($valor){
		$this->cod_espe = $valor;
	}
	function set_nombre($valor){
		$this->nombre = $valor;
	}


	function incluir(){
		$r = array();
			try {
        $bd = $this->conecta();
        $query = $bd->prepare("
          INSERT INTO especialidades (
            cod_espe,
            nombre
          ) VALUES (
            :cod_espe,
            :nombre
          )
        ");

        $query->execute([
          ':cod_espe' => $this->cod_espe,
          ':nombre' => $this->nombre
        ]);

      $consulta = $this->consultar();
      $r['resultado'] =  $consulta['resultado'];
      $r['mensaje'] =  'Registro incluido';
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
        $co->query("UPDATE especialidades SET
          nombre = '$this->nombre'
          WHERE
          cod_espe = '$this->cod_espe'
        ");

        $consulta = $this->consultar();
        $r['resultado'] = $consulta['resultado'];
        $r['mensaje'] =  'Registro Modificado';
      } catch(Exception $e) {
        $consulta = $this->consultar();
        $r['resultado'] = $consulta['resultado'];
        $r['mensaje'] =  $e->getMessage();
      }
		return $r;
	}

	function eliminar(){
    $r = array();
    try {
      $co = $this->conecta();
      $co->query("DELETE FROM especialidades
        WHERE
        cod_espe = '$this->cod_espe'
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
					$especialidad['cod_espe'] = $resultado['cod_espe'];
					$especialidad['nombre'] = $resultado['nombre'];
          array_push($respuesta, $especialidad);
				}
				$r['resultado'] =  $respuesta;
				$r['mensaje'] =  "consulta";
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
}
?>
