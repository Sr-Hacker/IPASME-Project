<?php
require_once('config/db.php');

class Institucion extends DB{
  private $rif_institucion;
  private $cod_estado;
  private $nombre;
  private $direccion;
  private $codigo_postal;
  private $telefono;
  private $correo;
  private $tipo_institucion;

  function set_rif_institucion($valor){
		$this->rif_institucion = $valor;
	}
	function set_cod_estado($valor){
		$this->cod_estado = $valor;
	}
	function set_nombre($valor){
		$this->nombre = $valor;
	}
  function set_direccion($valor){
		$this->direccion = $valor;
	}
	function set_codigo_postal($valor){
		$this->codigo_postal = $valor;
	}
	function set_telefono($valor){
		$this->telefono = $valor;
	}
	function set_correo($valor){
		$this->correo = $valor;
	}
  function set_tipo_institucion($valor){
		$this->tipo_institucion = $valor;
	}

	function incluir(){
		$r = array();
			try {
        $bd = $this->conecta();
        $query = $bd->prepare("
          INSERT INTO instituciones (
            rif_institucion,
            cod_estado,
            nombre,
            direccion,
            codigo_postal,
            telefono,
            correo,
            tipo_institucion
          ) VALUES (
            :rif_institucion,
            :cod_estado,
            :nombre,
            :direccion,
            :codigo_postal,
            :telefono,
            :correo,
            :tipo_institucion
          )
        ");

        $query->execute([
          ':rif_institucion' => $this->rif_institucion,
          ':cod_estado' => $this->cod_estado,
          ':nombre' => $this->nombre,
          ':direccion' => $this->direccion,
          ':codigo_postal' => $this->codigo_postal,
          ':telefono' => $this->telefono,
          ':correo' => $this->correo,
          ':tipo_institucion' => $this->tipo_institucion
        ]);

        $consulta = $this->consultar();
        $r['resultado'] =  $consulta['resultado'];
        $r['mensaje'] =  'Registro Inluido';
			} catch(Exception $e) {
        $consulta = $this->consultar();
        $r['resultado'] =  $consulta['resultado'];
			  $r['mensaje'] = $e->getMessage();
			}
		return $r;
	}

	function modificar(){
    $r = array();
    try {
      $bd = $this->conecta();
			$query = $bd->prepare("UPDATE instituciones SET
        rif_institucion = :rif_institucion,
        cod_estado = :cod_estado,
        nombre = :nombre,
        direccion = :direccion,
        codigo_postal = :codigo_postal,
        telefono = :telefono,
        correo = :correo,
        tipo_institucion = :tipo_institucion
        WHERE
        rif = :rif
      ");

      $query->execute([
        ':rif_institucion' => $this->rif_institucion,
        ':cod_estado' => $this->cod_estado,
        ':nombre' => $this->nombre,
        ':direccion' => $this->direccion,
        ':codigo_postal' => $this->codigo_postal,
        ':telefono' => $this->telefono,
        ':correo' => $this->correo,
        ':tipo_institucion' => $this->tipo_institucion
      ]);

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
      $bd = $this->conecta();
      $query = $bd->prepare("DELETE FROM instituciones WHERE rif_institucion = :rif_institucion");
      $query->bindParam(':rif_institucion', $this->rif_institucion, PDO::PARAM_STR);
      $query->execute();

      $consulta = $this->consultar();
      $r['resultado'] =  $consulta['resultado'];
      $r['mensaje'] =  'Registro Eliminado';
    } catch(Exception $e) {
      $consulta = $this->consultar();
      $r['resultado'] =  $consulta['resultado'];
      $r['mensaje'] =  $e->getMessage();
    }
		return $r;
	}

	function consultar(){
    $r = array();
		try{
      $bd = $this->conecta();
			$resultados = $bd->query("SELECT * FROM instituciones");

			if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
          $institucion['rif_institucion'] = $resultado['rif_institucion'];
          $institucion['cod_estado'] = $resultado['cod_estado'];
          $institucion['nombre'] = $resultado['nombre'];
          $institucion['direccion'] = $resultado['direccion'];
          $institucion['codigo_postal'] = $resultado['codigo_postal'];
          $institucion['telefono'] = $resultado['telefono'];
          $institucion['correo'] = $resultado['correo'];
          $institucion['tipo_institucion'] = $resultado['tipo_institucion'];
          array_push($respuesta, $institucion);
				}
				$r['resultado'] =  $respuesta;
				$r['mensaje'] =  "consulta";
			}
			else{
				$r['resultado'] = [];
				$r['mensaje'] =  'sin resultados';
			}
		}catch(Exception $e){
			$r['resultado'] = [];
			$r['mensaje'] =  $e->getMessage();
		}
		return $r;
	}

  function consultar_estados(){
    $r = array();
		try{
      $bd = $this->conecta();
			$resultados = $bd->query("SELECT * FROM estados");

			if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
          $institucion['nombre_estado'] = $resultado['nombre_estado'];
          array_push($respuesta, $institucion);
				}
				$r['resultado'] =  $respuesta;
				$r['mensaje'] =  "consulta";
			}
			else{
				$r['resultado'] = [];
				$r['mensaje'] =  'sin resultados';
			}
		}catch(Exception $e){
			$r['resultado'] = [];
			$r['mensaje'] =  $e->getMessage();
		}
		return $r;
  }

  function consultar_ciudades($cod_estado){
    $r = array();
		try{
      $bd = $this->conecta();
			$resultados = $bd->query("SELECT * FROM ciudades WHERE cod_estado = $cod_estado");

			if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
          $institucion['nombre_ciudad'] = $resultado['nombre_ciudad'];
          array_push($respuesta, $institucion);
				}
				$r['resultado'] =  $respuesta;
				$r['mensaje'] =  "consulta";
			}
			else{
				$r['resultado'] = [];
				$r['mensaje'] =  'sin resultados';
			}
		}catch(Exception $e){
			$r['resultado'] = [];
			$r['mensaje'] =  $e->getMessage();
		}
		return $r;
  }

  function buscar() {
    try {
      $bd = $this->conecta();
      $query = $bd->prepare("SELECT * FROM instituciones WHERE rif = :rif");
      $query->bindParam(':rif_institucion', $this->rif_institucion, PDO::PARAM_STR);
      $query->execute();
      $fila = $query->fetchAll(PDO::FETCH_BOTH);
      return $fila;
    } catch (Exception $e) {
      return false;
    }
  }
}
?>
