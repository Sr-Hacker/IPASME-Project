<?php
require_once('config/db.php');

class Institucion extends DB{
  private $rif;
  private $nombre;
  private $estado_provincia;
  private $ciudad;
  private $direccion;
  private $zona_postal;
  private $telefono;
  private $correo;

  function set_rif($valor){
		$this->rif = $valor;
	}
	function set_nombre($valor){
		$this->nombre = $valor;
	}
	function set_estado_provincia($valor){
		$this->estado_provincia = $valor;
	}
  function set_ciudad($valor){
		$this->ciudad = $valor;
	}
	function set_direccion($valor){
		$this->direccion = $valor;
	}
	function set_zona_postal($valor){
		$this->zona_postal = $valor;
	}
	function set_telefono($valor){
		$this->telefono = $valor;
	}
  function set_correo($valor){
		$this->correo = $valor;
	}

	function incluir(){
		$r = array();
			try {
        $bd = $this->conecta();
        $query = $bd->prepare("
          INSERT INTO instituciones (
            rif,
            nombre,
            estado_provincia,
            ciudad,
            direccion,
            zona_postal,
            telefono,
            correo
          ) VALUES (
            :rif,
            :nombre,
            :estado_provincia,
            :ciudad,
            :direccion,
            :zona_postal,
            :telefono,
            :correo
          )
        ");

        $query->execute([
          ':rif' => $this->rif,
          ':nombre' => $this->nombre,
          ':estado_provincia' => $this->estado_provincia,
          ':ciudad' => $this->ciudad,
          ':direccion' => $this->direccion,
          ':zona_postal' => $this->zona_postal,
          ':telefono' => $this->telefono,
          ':correo' => $this->correo
        ]);

        $r['resultado'] = 'incluir';
        $r['mensaje'] =  'Registro Inluido';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			  $r['mensaje'] = $e->getMessage();
			}
    $result = $this->consultar();
		return $result;
	}

	function modificar(){
    $r = array();
    try {
      $bd = $this->conecta();
			$query = $bd->prepare("UPDATE instituciones SET
        nombre = :nombre,
        estado_provincia = :estado_provincia,
        ciudad = :ciudad,
        direccion = :direccion,
        zona_postal = :zona_postal,
        telefono = :telefono,
        correo = :correo
        WHERE
        rif = :rif
      ");

      $query->execute([
        ':rif' => $this->rif,
        ':nombre' => $this->nombre,
        ':estado_provincia' => $this->estado_provincia,
        ':ciudad' => $this->ciudad,
        ':direccion' => $this->direccion,
        ':zona_postal' => $this->zona_postal,
        ':telefono' => $this->telefono,
        ':correo' => $this->correo
      ]);

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
      $query = $bd->prepare("DELETE FROM instituciones WHERE rif = :rif");
      $query->bindParam(':rif', $this->rif, PDO::PARAM_STR);
      $query->execute();

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
			$resultados = $bd->query("SELECT * FROM instituciones");

			if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
          $institucion['rif'] = $resultado['rif'];
          $institucion['nombre'] = $resultado['nombre'];
          $institucion['estado_provincia'] = $resultado['estado_provincia'];
          $institucion['ciudad'] = $resultado['ciudad'];
          $institucion['direccion'] = $resultado['direccion'];
          $institucion['zona_postal'] = $resultado['zona_postal'];
          $institucion['telefono'] = $resultado['telefono'];
          $institucion['correo'] = $resultado['correo'];
          array_push($respuesta, $institucion);
				}
				$r['resultado'] =  $respuesta;
			}
			else{
				$r['resultado'] = 'consultar';
				$r['mensaje'] =  '';
			}

		}catch(Exception $e){
			$r['resultado'] = $e->getMessage();
			$r['mensaje'] =  $e->getMessage();
		}
		return $r['resultado'];
	}

  function buscar() {
    try {
      $bd = $this->conecta();
      $query = $bd->prepare("SELECT * FROM instituciones WHERE rif = :rif");
      $query->bindParam(':rif', $this->rif, PDO::PARAM_STR);
      $query->execute();
      $fila = $query->fetchAll(PDO::FETCH_BOTH);
      return $fila;
    } catch (Exception $e) {
      return false;
    }
  }

	private function existe($rif){
		try{
      $bd = $this->conecta();
			$resultado = $bd->query("SELECT * FROM instituciones WHERE rif = :rif");
      $query->bindParam(':rif', $this->rif, PDO::PARAM_STR);
      $query->execute();
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
