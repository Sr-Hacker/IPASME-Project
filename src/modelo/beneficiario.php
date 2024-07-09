<?php
require_once('config/db.php');
require_once('modelo/direccion.php');
require_once('modelo/institucion.php');
require_once('modelo/historia_medica.php');

class Beneficiario extends DB{
  private $id = 0;
  private $nombres;
  private $parentesco;
  private $telefono;
  private $edad;
  private $cedula;

  private $id_historia = 0;
  private $cod_historia;
  private $tipo_sangre;
  private $sexo;
  private $estatura;
  private $peso;
  private $fecha_nacimiento;

  private $id_direccion = 0;
  private $direccion;
  private $zona;
  private $descripcion;
  private $postal;

  function set_id($valor){
		$this->id = $valor;
	}
	function set_nombres($valor){
		$this->nombres = $valor;
	}
	function set_parentesco($valor){
		$this->parentesco = $valor;
	}
  function set_telefono($valor){
		$this->telefono = $valor;
	}
	function set_edad($valor){
		$this->edad = $valor;
	}
	function set_cedula($valor){
		$this->cedula = $valor;
	}

  function set_id_historia($valor){
		$this->id_historia = $valor;
	}
  function set_cod_historia($valor){
		$this->cod_historia = $valor;
	}
  function set_tipo_sangre($valor){
		$this->tipo_sangre = $valor;
	}
  function set_sexo($valor){
		$this->sexo = $valor;
	}
  function set_estatura($valor){
		$this->estatura = $valor;
	}
  function set_peso($valor){
		$this->peso = $valor;
	}
  function set_fecha_nacimiento($valor){
		$this->fecha_nacimiento = $valor;
	}

  function set_id_direccion($valor){
		$this->id_direccion = $valor;
	}
  function set_direccion($valor){
		$this->direccion = $valor;
	}
  function set_zona($valor){
		$this->zona = $valor;
	}
  function set_descripcion($valor){
		$this->descripcion = $valor;
	}
  function set_postal($valor){
		$this->postal = $valor;
	}


	function incluir(){
		$r = array();
		if(!$this->existe($this->cedula)){
		  $historia = new Historia(
        $this->cod_historia,
        $this->tipo_sangre,
        $this->sexo,
        $this->estatura,
        $this->peso,
        $this->fecha_nacimiento
      );
		  $direccion = new Direccion(
        $this->direccion,
        $this->zona,
        $this->descripcion,
        $this->postal
      );
      $this->set_id_historia($historia->incluir());
      $this->set_id_direccion($direccion->incluir());

			try {
        $bd = $this->conecta();
        $query = $bd->prepare("
          INSERT INTO beneficiarios (
            nombres,
            parentesco,
            telefono,
            edad,
            cedula,
            id_historia
          ) VALUES (
            :nombres,
            :parentesco,
            :telefono,
            :edad,
            :cedula,
            :id_historia
          )
        ");

        $query->execute([
          ':nombres' => $this->nombres,
          ':parentesco' => $this->parentesco,
          ':telefono' => $this->telefono,
          ':edad' => $this->edad,
          ':cedula' => $this->cedula,
          ':id_historia' => $this->id_historia
        ]);

        $r['resultado'] = 'incluir';
        $r['mensaje'] =  'Registro Inluido';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			  $r['mensaje'] = $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'incluir';
			$r['mensaje'] =  'Ya existe la cedula';
		}
    $result = $this->consultar();
		return $result;
	}

	function modificar(){
    $r = array();
    try {
      $co = $this->conecta();
			$co->query("UPDATE beneficiarios SET
        nombres = '$this->nombres',
        parentesco = '$this->parentesco',
        telefono = '$this->telefono',
        edad = '$this->edad',
        cedula = '$this->cedula'
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
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->cedula)){
			try {
					$co->query("DELETE FROM beneficiarios
						WHERE
						cedula = '$this->cedula'
						");
						$r['resultado'] = 'eliminar';
			            $r['mensaje'] =  'Registro Eliminado';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'eliminar';
			$r['mensaje'] =  'No existe la cedula';
		}
    $result = $this->consultar();
		return $result;
	}

	function consultar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
			$resultados = $co->query("SELECT * FROM beneficiarios");

			if($resultados){

				$respuesta = [];
				foreach($resultados as $resultado){
					$beneficiario['id'] = $resultado['id'];
          $beneficiario['nombres'] = $resultado['nombres'];
          $beneficiario['parentesco'] = $resultado['parentesco'];
          $beneficiario['telefono'] = $resultado['telefono'];
          $beneficiario['edad'] = $resultado['edad'];
          $beneficiario['cedula'] = $resultado['cedula'];
          $beneficiario['id_historia'] = $resultado['id_historia'];
          array_push($respuesta, $beneficiario);
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
