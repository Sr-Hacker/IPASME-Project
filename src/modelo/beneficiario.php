<?php
require_once('config/db.php');

class Beneficiario extends DB{
  private $ced_beneficiario;
  private $ced_afiliado;
  private $nombres;
  private $apellidos;
  private $fecha_nacimiento;
  private $sexo;
  private $parentesco;
  private $estado_civil;
  private $direccion;
  private $telefono_celular;

  function set_ced_beneficiario($valor){
		$this->ced_beneficiario = $valor;
	}
  function set_ced_afiliado($valor){
		$this->ced_afiliado = $valor;
	}
	function set_nombres($valor){
		$this->nombres = $valor;
	}
  function set_apellidos($valor){
		$this->apellidos = $valor;
	}
	function set_fecha_nacimiento($valor){
		$this->fecha_nacimiento = $valor;
	}
  function set_sexo($valor){
		$this->sexo = $valor;
	}
	function set_parentesco($valor){
		$this->parentesco = $valor;
	}
	function set_estado_civil($valor){
		$this->estado_civil = $valor;
	}
  function set_direccion($valor){
		$this->direccion = $valor;
	}
  function set_telefono_celular($valor){
		$this->telefono_celular = $valor;
	}

	function incluir(){
		$r = array();
    try {
      $bd = $this->conecta();
      $query = $bd->prepare("
        INSERT INTO beneficiarios (
          ced_beneficiario,
          ced_afiliado,
          nombres,
          apellidos,
          fecha_nacimiento,
          sexo,
          parentesco,
          estado_civil,
          direccion,
          telefono_celular
        ) VALUES (
          :ced_beneficiario,
          :ced_afiliado,
          :nombres,
          :apellidos,
          :fecha_nacimiento,
          :sexo,
          :parentesco,
          :estado_civil,
          :direccion,
          :telefono_celular
        )
      ");

      $query->execute([
        ':ced_beneficiario' => $this->ced_beneficiario,
        ':ced_afiliado' => $this->ced_afiliado,
        ':nombres' => $this->nombres,
        ':apellidos' => $this->apellidos,
        ':fecha_nacimiento' => $this->fecha_nacimiento,
        ':sexo' => $this->sexo,
        ':parentesco' => $this->parentesco,
        ':estado_civil' => $this->estado_civil,
        ':direccion' => $this->direccion,
        ':telefono_celular' => $this->telefono_celular
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
        nombres = :nombres,
        apellidos = :apellidos,
        fecha_nacimiento = :fecha_nacimiento,
        sexo = :sexo,
        parentesco = :parentesco,
        estado_civil = :estado_civil,
        direccion = :direccion,
        telefono_celular = :telefono_celular
        WHERE
        ced_beneficiario = :ced_beneficiario
      ");

      $query->execute([
        ':ced_beneficiario' => $this->ced_beneficiario,
        ':ced_afiliado' => $this->ced_afiliado,
        ':nombres' => $this->nombres,
        ':apellidos' => $this->apellidos,
        ':fecha_nacimiento' => $this->fecha_nacimiento,
        ':sexo' => $this->sexo,
        ':parentesco' => $this->parentesco,
        ':estado_civil' => $this->estado_civil,
        ':direccion' => $this->direccion,
        ':telefono_celular' => $this->telefono_celular
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

			if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
					$beneficiario['ced_beneficiario'] = $resultado['ced_beneficiario'];
          $beneficiario['ced_afiliado'] = $resultado['ced_afiliado'];
          $beneficiario['nombres'] = $resultado['nombres'];
          $beneficiario['apellidos'] = $resultado['apellidos'];
          $beneficiario['fecha_nacimiento'] = $resultado['fecha_nacimiento'];
          $beneficiario['sexo'] = $resultado['sexo'];
          $beneficiario['parentesco'] = $resultado['parentesco'];
          $beneficiario['estado_civil'] = $resultado['estado_civil'];
          $beneficiario['direccion'] = $resultado['direccion'];
          $beneficiario['telefono_celular'] = $resultado['telefono_celular'];
          array_push($respuesta, $beneficiario);
				}
				$r['resultado'] =  $respuesta;
				$r['mensaje'] =  'consulta';
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
}
?>
