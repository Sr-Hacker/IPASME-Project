<?php
require_once('config/db.php');

class Beneficiario extends DB{
  private $ced_beneficiario;
  private $ced_afiliado;
  private $n_historia;
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
  private $relacion;

  function set_ced_beneficiario($valor){
		$this->ced_beneficiario = $valor;
	}
  function set_ced_afiliado($valor){
		$this->ced_afiliado = $valor;
	}
	function set_n_historia($valor){
		$this->n_historia = $valor;
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
  function set_relacion($valor){
		$this->relacion = $valor;
	}

	function incluir(){
		$r = array();
    try {
      $bd = $this->conecta();
      $query = $bd->prepare("
        INSERT INTO beneficiarios (
          ced_beneficiario,
          ced_afiliado,
          n_historia,
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
          relacion
        ) VALUES (
          :ced_beneficiario,
          :ced_afiliado,
          :n_historia,
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
          :relacion
        )
      ");

      $query->execute([
        ':ced_beneficiario' => $this->ced_beneficiario,
        ':ced_afiliado' => $this->ced_afiliado,
        ':n_historia' => $this->n_historia,
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
        ':relacion' => $this->relacion
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
			$query = $bd->prepare("UPDATE beneficiarios SET
        ced_beneficiario = :ced_beneficiario,
        ced_afiliado = :ced_afiliado,
        n_historia = :n_historia,
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
        relacion = :relacion
        WHERE
        ced_beneficiario = :ced_beneficiario
      ");

      $query->execute([
        ':ced_beneficiario' => $this->ced_beneficiario,
        ':ced_afiliado' => $this->ced_afiliado,
        ':n_historia' => $this->n_historia,
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
        ':relacion' => $this->relacion
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
      $bd->query("DELETE FROM beneficiarios
        WHERE
        ced_beneficiario = '$this->ced_beneficiario'
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
			$resultados = $bd->query("SELECT * FROM beneficiarios");

			// $resultados = $bd->query("SELECT
      //   b.*,
      //     h1.cod_historia AS cod_historia,
      //     h1.tipo_sangre AS tipo_sangre,
      //     h1.sexo AS sexo,
      //     h1.peso AS peso,
      //     h1.estatura AS estatura,
      //     h1.fecha_nacimiento AS fecha_nacimiento,

      //     d2.direccion AS direccion,
      //     d2.zona AS zona,
      //     d2.descripcion AS descripcion,
      //     d2.postal AS postal,

      //     a3.nombre AS nombre_afiliado,
      //     a3.apellido AS apellido_afiliado,
      //     a3.cedula AS cedula_afiliado
      //   FROM
      //     beneficiarios b
      //   JOIN
      //     historias h1 ON b.id_historia = h1.id
      //   JOIN
      //     direcciones d2 ON b.id_direccion = d2.id
      //   JOIN
      //     afiliados a3 ON b.id_afiliado = a3.id;
      // ");
			if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
					$beneficiario['ced_beneficiario'] = $resultado['ced_beneficiario'];
          $beneficiario['ced_afiliado'] = $resultado['ced_afiliado'];
          $beneficiario['n_historia'] = $resultado['n_historia'];
          $beneficiario['nombre'] = $resultado['nombre'];
          $beneficiario['apellido'] = $resultado['apellido'];
          $beneficiario['fecha_nacimiento'] = $resultado['fecha_nacimiento'];
          $beneficiario['sexo'] = $resultado['sexo'];
          $beneficiario['estado_provincia'] = $resultado['estado_provincia'];
          $beneficiario['ciudad'] = $resultado['ciudad'];
          $beneficiario['direccion'] = $resultado['direccion'];

          $beneficiario['numero_casa'] = $resultado['numero_casa'];
          $beneficiario['codigo_postal'] = $resultado['codigo_postal'];
          $beneficiario['telefono'] = $resultado['telefono'];
          $beneficiario['correo'] = $resultado['correo'];
          $beneficiario['tipo_sangre'] = $resultado['tipo_sangre'];
          $beneficiario['relacion'] = $resultado['relacion'];
          array_push($respuesta, $beneficiario);
				}
				$r['resultado'] =  $respuesta;
			}
			else{
				$r['resultado'] = [];
				$r['mensaje'] =  '';
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
      $query = $bd->prepare("SELECT * FROM beneficiarios WHERE cedula = :cedula");
      $query->bindParam(':cedula', $this->cedula, PDO::PARAM_STR);
      $query->execute();
      $fila = $query->fetchAll(PDO::FETCH_BOTH);
      return $fila;
    } catch (Exception $e) {
      return false;
    }
  }

	private function existe($cedula){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
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
}
?>
