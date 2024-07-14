<?php
require_once('config/db.php');

class Direccion extends DB{
  private $id;
  private $direccion;
  private $zona;
  private $descripcion;
  private $postal;

  public function __construct($direccion, $zona, $descripcion, $postal) {
    $this->direccion = $direccion;
    $this->zona = $zona;
    $this->descripcion = $descripcion;
    $this->postal = $postal;
  }

  function set_id($valor){
		$this->id = $valor;
	}
	function set_direccion($valor){
		$this->cod_historia = $valor;
	}
	function set_zona($valor){
		$this->tipo_sangre = $valor;
	}
  function set_descripcion($valor){
		$this->sexo = $valor;
	}
	function set_postal($valor){
		$this->estatura = $valor;
	}

  public function incluir() {
    $r = array();
      try {
        $bd = $this->conecta();
        $query = $bd->prepare("
          INSERT INTO direcciones (
            direccion,
            zona,
            descripcion,
            postal
          ) VALUES (
            :direccion,
            :zona,
            :descripcion,
            :postal
          )
        ");

        $query->execute([
          ':direccion' => $this->direccion,
          ':zona' => $this->zona,
          ':descripcion' => $this->descripcion,
          ':postal' => $this->postal,
        ]);
        $r['id'] = $bd->lastInsertId();
      } catch (PDOException $e) {
        $r['resultado'] = 'error';
        $r['mensaje'] = $e->getMessage();
      }
    return $r["id"];
  }


	function modificar(){
    $r = array();
		try{
      $bd = $this->conecta();
      $bd->query("UPDATE direcciones SET
        direccion = '$this->direccion',
        zona = '$this->zona',
        descripcion = '$this->descripcion',
        postal = '$this->postal'
        WHERE
        id = '$this->id'
      ");
      $r['resultado'] = 'modificar';
      $r['mensaje'] =  'Registro Modificado';
    } catch(Exception $e) {
      $r['resultado'] = 'error';
      $r['mensaje'] =  $e->getMessage();
    }
		return $r;
	}

	function eliminar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->cedula)){
			try {
					$co->query("DELETE FROM direcciones
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
			$resultados = $co->query("SELECT * from direcciones");

			if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
					$trabajador['apellidosynombres'] = $resultado['apellidosynombres'];
          $trabajador['cedula'] = $resultado['cedula'];
          $trabajador['rif'] = $resultado['rif'];
          $trabajador['fechadenacimiento'] = $resultado['fechadenacimiento'];
          $trabajador['vivienda'] = $resultado['vivienda'];
          $trabajador['automovil'] = $resultado['automovil'];
          $trabajador['modelo'] = $resultado['modelo'];
          $trabajador['ano'] = $resultado['ano'];
          $trabajador['telefono'] = $resultado['telefono'];
          $trabajador['celular'] = $resultado['celular'];
          $trabajador['estadocivil'] = $resultado['estadocivil'];
          $trabajador['tipodesangre'] = $resultado['tipodesangre'];
          $trabajador['talladecamisa'] = $resultado['talladecamisa'];
          $trabajador['talladezapato'] = $resultado['talladezapato'];
          $trabajador['talladepantalon'] = $resultado['talladepantalon'];
          $trabajador['correo'] = $resultado['correo'];
          $trabajador['cargo'] = $resultado['cargo'];
          $trabajador['estatus'] = $resultado['estatus'];
          array_push($respuesta, $trabajador);
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

  private function existe($cedula) {
    $bd = $this->pdo->prepare("SELECT COUNT(*) FROM direcciones WHERE cedula = :cedula");
    $bd->execute(['cedula' => $cedula]);
    return $bd->fetchColumn() > 0;
  }
}?>
