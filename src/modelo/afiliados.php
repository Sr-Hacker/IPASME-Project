<?php
require_once('config/db.php');
require_once('modelo/direccion.php');
require_once('modelo/institucion.php');
require_once('modelo/historia_medica.php');

class Afiliado extends DB{
  private $id = 0;
  private $nombre;
  private $apellido;
  private $telefono;
  private $edad;
  private $cargo;
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

  private $id_institucion = 0;
  private $nombre_institucion;
  private $rif_institucion;
  private $id_direccion_institucion;
  private $direccion_institucion;
  private $zona_institucion;
  private $descripcion_institucion;
  private $postal_institucion;

  function set_id($valor){
		$this->nombre = $valor;
	}
	function set_nombre($valor){
		$this->nombre = $valor;
	}
	function set_apellido($valor){
		$this->apellido = $valor;
	}
  function set_telefono($valor){
		$this->telefono = $valor;
	}
	function set_edad($valor){
		$this->edad = $valor;
	}
	function set_cargo($valor){
		$this->cargo = $valor;
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

  function set_id_institucion($valor){
		$this->id_institucion = $valor;
	}
  function set_nombre_institucion($valor){
		$this->nombre_institucion = $valor;
	}
  function set_rif_institucion($valor){
		$this->rif_institucion = $valor;
	}
  function set_id_direccion_institucion($valor){
		$this->id_direccion_institucion = $valor;
	}
  function set_direccion_institucion($valor){
		$this->direccion_institucion = $valor;
	}
  function set_zona_institucion($valor){
		$this->zona_institucion = $valor;
	}
  function set_descripcion_institucion($valor){
		$this->descripcion_institucion = $valor;
	}
  function set_postal_institucion($valor){
		$this->postal_institucion = $valor;
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
      $institucion = new institucion(
        $this->nombre_institucion,
        $this->rif_institucion,
        $this->direccion_institucion,
        $this->zona_institucion,
        $this->descripcion_institucion,
        $this->postal_institucion
      );

      $this->set_id_historia($historia->incluir());
      $this->set_id_direccion($direccion->incluir());
      $this->set_id_institucion($institucion->incluir());

			try {
        $bd = $this->conecta();
        $query = $bd->prepare("
          INSERT INTO beneficiarios (
            nombre,
            apellido,
            telefono,
            edad,
            cargo,
            cedula,
            id_historia,
            id_direccion,
            id_institucion
          ) VALUES (
            :nombre,
            :apellido,
            :telefono,
            :edad,
            :cargo,
            :cedula,
            :id_historia,
            :id_direccion,
            :id_institucion
          )
        ");

        $query->execute([
          ':nombre' => $this->nombre,
          ':apellido' => $this->apellido,
          ':telefono' => $this->telefono,
          ':edad' => $this->edad,
          ':cargo' => $this->cargo,
          ':cedula' => $this->cedula,
          ':id_historia' => $this->id_historia,
          ':id_direccion' => $this->id_direccion,
          ':id_institucion' => $this->id_institucion
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
        nombre = '$this->nombre',
        apellido = '$this->apellido',
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
			// $resultados = $co->query("SELECT * FROM beneficiarios");


			$resultados = $co->query("SELECT
        b.*,
        t1.cod_historia AS cod_historia
        FROM
            beneficiarios b
        JOIN
            historias t1 ON b.id_historia = t1.id;
        ");

			if($resultados){

				$respuesta = [];
				foreach($resultados as $resultado){
					$beneficiario['id'] = $resultado['id'];
          $beneficiario['nombre'] = $resultado['nombre'];
          $beneficiario['apellido'] = $resultado['apellido'];
          $beneficiario['telefono'] = $resultado['telefono'];
          $beneficiario['edad'] = $resultado['edad'];
          $beneficiario['cargo'] = $resultado['cargo'];
          $beneficiario['cedula'] = $resultado['cedula'];
          $beneficiario['id_historia'] = $resultado['id_historia'];
          $beneficiario['id_direccion'] = $resultado['id_direccion'];
          $beneficiario['id_institucion'] = $resultado['id_institucion'];
          $beneficiario['cod_historia'] = $resultado['cod_historia'];
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
