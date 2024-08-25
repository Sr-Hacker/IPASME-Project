<?php
require_once('config/db.php');

class Afiliado extends DB{
  private $ced_afiliado;
  private $nombre;
  private $apellido;
  private $fecha_nacimiento;
  private $sexo;
  private $estado_provincia;
  private $ciudad;
  private $direccion;
  private $numero_casa;
  private $codigo_postal;
  private $telefono;
  private $correo;
  private $tipo_sangre;
  private $n_historia;
  private $rif_institucion;

  function set_ced_afiliado($valor){
    $this->ced_afiliado = $valor;
  }
	function set_nombre($valor){
		$this->nombre = $valor;
	}
	function set_apellido($valor){
		$this->apellido = $valor;
	}
  function set_fecha_nacimiento($valor){
    $this->fecha_nacimiento = $valor;
  }
  function set_sexo($valor){
    $this->sexo = $valor;
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
  function set_numero_casa($valor){
    $this->numero_casa = $valor;
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
  function set_tipo_sangre($valor){
		$this->tipo_sangre = $valor;
	}
  function set_n_historia($valor){
		$this->n_historia = $valor;
	}
  function set_rif_institucion($valor){
		$this->rif_institucion = $valor;
	}

	function incluir(){
		$r = array();
    try {
      $bd = $this->conecta();
      $query = $bd->prepare("
        INSERT INTO afiliados (
          ced_afiliado,
          nombre,
          apellido,
          fecha_nacimiento,
          sexo,
          estado_provincia,
          ciudad,
          direccion,
          numero_casa,
          codigo_postal,
          telefono,
          correo,
          tipo_sangre,
          n_historia,
          rif_institucion
        ) VALUES (
          :ced_afiliado,
          :nombre,
          :apellido,
          :fecha_nacimiento,
          :sexo,
          :estado_provincia,
          :ciudad,
          :direccion,
          :numero_casa,
          :codigo_postal,
          :telefono,
          :correo,
          :tipo_sangre,
          :n_historia,
          :rif_institucion
        )
      ");

      $query->execute([
        ':ced_afiliado' => $this->ced_afiliado,
        ':nombre' => $this->nombre,
        ':apellido' => $this->apellido,
        ':fecha_nacimiento' => $this->fecha_nacimiento,
        ':sexo' => $this->sexo,
        ':estado_provincia' => $this->estado_provincia,
        ':ciudad' => $this->ciudad,
        ':direccion' => $this->direccion,
        ':numero_casa' => $this->numero_casa,
        ':codigo_postal' => $this->codigo_postal,
        ':telefono' => $this->telefono,
        ':correo' => $this->correo,
        ':tipo_sangre' => $this->tipo_sangre,
        ':n_historia' => $this->n_historia,
        ':rif_institucion' => $this->rif_institucion
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
			$query = $bd->prepare("UPDATE afiliados SET
        ced_afiliado = :ced_afiliado,
        nombre = :nombre,
        apellido = :apellido,
        fecha_nacimiento = :fecha_nacimiento,
        sexo = :sexo,
        estado_provincia = :estado_provincia,
        ciudad = :ciudad,
        direccion = :direccion,
        numero_casa = :numero_casa,
        codigo_postal = :codigo_postal,
        telefono = :telefono,
        correo = :correo,
        tipo_sangre = :tipo_sangre,
        n_historia = :n_historia,
        rif_institucion = :rif_institucion
        WHERE
        ced_afiliado = :ced_afiliado
      ");

      $query->execute([
        ':ced_afiliado' => $this->ced_afiliado,
        ':nombre' => $this->nombre,
        ':apellido' => $this->apellido,
        ':fecha_nacimiento' => $this->fecha_nacimiento,
        ':sexo' => $this->sexo,
        ':estado_provincia' => $this->estado_provincia,
        ':ciudad' => $this->ciudad,
        ':direccion' => $this->direccion,
        ':numero_casa' => $this->numero_casa,
        ':codigo_postal' => $this->codigo_postal,
        ':telefono' => $this->telefono,
        ':correo' => $this->correo,
        ':tipo_sangre' => $this->tipo_sangre,
        ':n_historia' => $this->n_historia,
        ':rif_institucion' => $this->rif_institucion,
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
      $bd->query("DELETE FROM afiliados
        WHERE
        ced_afiliado = '$this->ced_afiliado'
      ");
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
			$resultados = $bd->query("SELECT * FROM afiliados");

			if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
					$afiliado['ced_afiliado'] = $resultado['ced_afiliado'];
          $afiliado['nombre'] = $resultado['nombre'];
          $afiliado['apellido'] = $resultado['apellido'];
          $afiliado['fecha_nacimiento'] = $resultado['fecha_nacimiento'];
          $afiliado['sexo'] = $resultado['sexo'];
          $afiliado['estado_provincia'] = $resultado['estado_provincia'];
          $afiliado['ciudad'] = $resultado['ciudad'];
          $afiliado['direccion'] = $resultado['direccion'];
          $afiliado['numero_casa'] = $resultado['numero_casa'];
          $afiliado['codigo_postal'] = $resultado['codigo_postal'];
          $afiliado['telefono'] = $resultado['telefono'];
          $afiliado['correo'] = $resultado['correo'];
          $afiliado['tipo_sangre'] = $resultado['tipo_sangre'];
          $afiliado['n_historia'] = $resultado['n_historia'];
          $afiliado['rif_institucion'] = $resultado['rif_institucion'];
          array_push($respuesta, $afiliado);
				}
				$r['resultado'] =  $respuesta;
				$r['mensaje'] =  'consulta';
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
      $query = $bd->prepare("SELECT
        a.*,
          h1.cod_historia AS cod_historia,
          h1.tipo_sangre AS tipo_sangre,
          h1.sexo AS sexo,
          h1.peso AS peso,
          h1.estatura AS estatura,
          h1.fecha_nacimiento AS fecha_nacimiento,

          d2.direccion AS direccion,
          d2.zona AS zona,
          d2.descripcion AS descripcion,
          d2.postal AS postal,

          i3.nombre AS nombre_institucion,
          i3.rif AS rif_institucion,
          i3.id_direccion AS id_direccion_institucion,

          d4.direccion AS direccion_institucion,
          d4.zona AS zona_institucion,
          d4.descripcion AS descripcion_institucion,
          d4.postal AS postal_institucion
        FROM
          afiliados a
        JOIN
          historias h1 ON a.id_historia = h1.id
        JOIN
          direcciones d2 ON a.id_direccion = d2.id
        JOIN
          instituciones i3 ON a.id_institucion = i3.id
        JOIN
          direcciones d4 ON i3.id_direccion = d4.id
        WHERE cedula = :cedula");
      $query->bindParam(':cedula', $this->cedula, PDO::PARAM_STR);
      $query->execute();
      $fila = $query->fetchAll(PDO::FETCH_BOTH);
      return $fila;
    } catch (Exception $e) {
      return false;
    }
  }

  function consultar_instituciones(){
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
				$r['mensaje'] =  'consulta de instituciones';
			}
			else{
				$r['resultado'] = [];
				$r['mensaje'] =  'consultar';
			}

		}catch(Exception $e){
			$r['resultado'] = [];
			$r['mensaje'] =  $e->getMessage();
		}
		return $r;
  }
}
?>
