<?php
require_once('config/db.php');

class Historia extends DB{
  private $id;
  private $peso;
  private $sexo;
  private $estatura;
  private $tipo_sangre;
  private $cod_historia;
  private $fecha_nacimiento;

  public function __construct($cod_historia, $tipo_sangre, $sexo, $estatura, $peso, $fecha_nacimiento) {
    $this->cod_historia = $cod_historia;
    $this->tipo_sangre = $tipo_sangre;
    $this->sexo = $sexo;
    $this->estatura = $estatura;
    $this->peso = $peso;
    $this->fecha_nacimiento = $fecha_nacimiento;
  }

  function set_id($valor){
		$this->id = $valor;
	}
  function set_peso($valor){
    $this->peso = $valor;
  }
  function set_sexo($valor){
    $this->sexo = $valor;
  }
  function set_estatura($valor){
    $this->estatura = $valor;
  }
  function set_tipo_sangre($valor){
    $this->tipo_sangre = $valor;
  }
	function set_cod_historia($valor){
		$this->cod_historia = $valor;
	}
	function set_fecha_nacimiento($valor){
		$this->fecha_nacimiento = $valor;
	}

  public function incluir() {
    $r = array();
      try {
        $bd = $this->conecta();
        $query = $bd->prepare("
          INSERT INTO historias (
            cod_historia,
            tipo_sangre,
            sexo,
            estatura,
            peso
          ) VALUES (
            :cod_historia,
            :tipo_sangre,
            :sexo,
            :estatura,
            :peso
          )
        ");

        $query->execute([
          ':cod_historia' => $this->cod_historia,
          ':tipo_sangre' => $this->tipo_sangre,
          ':sexo' => $this->sexo,
          ':estatura' => $this->estatura,
          ':peso' => $this->peso,
        ]);

        $r['id'] = $bd->lastInsertId();
      } catch (PDOException $e) {
        $r['resultado'] = 'error';
        $r['mensaje'] = $e->getMessage();
      }
    return $r["id"];
  }


	function modificar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->cedula)){
			try {
					$co->query("UPDATE historias SET
              apellidosynombres = '$this->nombre_apellido',
              cedula = '$this->cedula',
              rif = '$this->rif',
              fechadenacimiento = '$this->fecha_nac',
              vivienda = '$this->vivienda',
              automovil = '$this->automovil',
              modelo = '$this->modelo',
              ano = '$this->ano',
              telefono = '$this->telefono',
              celular = '$this->celular',
              estadocivil = '$this->estado_civil',
              tipodesangre = '$this->tipo_sangre',
              talladecamisa = '$this->talla_camisa',
              talladezapato = '$this->talla_zapato',
              talladepantalon = '$this->talla_pantalon',
              correo = '$this->correo',
              cargo = '$this->cargo',
              estatus = '$this->estatus'
              WHERE
              cedula = '$this->cedula'
						");
						$r['resultado'] = 'modificar';
			      $r['mensaje'] =  'Registro Modificado';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'modificar';
			$r['mensaje'] =  'Cedula no registrada';
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
					$co->query("DELETE FROM historias
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
			$resultados = $co->query("SELECT * from historias");

			if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
					$historias['apellidosynombres'] = $resultado['apellidosynombres'];
          $historias['cedula'] = $resultado['cedula'];
          $historias['rif'] = $resultado['rif'];
          $historias['fechadenacimiento'] = $resultado['fechadenacimiento'];
          $historias['vivienda'] = $resultado['vivienda'];
          $historias['automovil'] = $resultado['automovil'];
          $historias['modelo'] = $resultado['modelo'];
          $historias['ano'] = $resultado['ano'];
          $historias['telefono'] = $resultado['telefono'];
          $historias['celular'] = $resultado['celular'];
          $historias['estadocivil'] = $resultado['estadocivil'];
          $historias['tipodesangre'] = $resultado['tipodesangre'];
          $historias['talladecamisa'] = $resultado['talladecamisa'];
          $historias['talladezapato'] = $resultado['talladezapato'];
          $historias['talladepantalon'] = $resultado['talladepantalon'];
          $historias['correo'] = $resultado['correo'];
          $historias['cargo'] = $resultado['cargo'];
          $historias['estatus'] = $resultado['estatus'];
          array_push($respuesta, $historias);
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
    $bd = $this->pdo->prepare("SELECT COUNT(*) FROM historias WHERE cedula = :cedula");
    $bd->execute(['cedula' => $cedula]);
    return $bd->fetchColumn() > 0;
  }
}?>
