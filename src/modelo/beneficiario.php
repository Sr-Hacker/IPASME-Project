<?php
require_once('config/db.php');
require_once('modelo/direccion.php');
require_once('modelo/instituciones.php');
require_once('modelo/historia_medica.php');

class Beneficiario extends DB{
  private $id = 0;
  private $id_afiliado = 2;
  private $nombre;
  private $apellido;
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
  function set_id_afiliado($valor){
		$this->id_afiliado = $valor;
	}
	function set_nombre($valor){
		$this->nombre = $valor;
	}
  function set_apellido($valor){
		$this->apellido = $valor;
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
            nombre,
            apellido,
            parentesco,
            telefono,
            edad,
            cedula,
            id_historia,
            id_afiliado,
            id_direccion
          ) VALUES (
            :nombre,
            :apellido,
            :parentesco,
            :telefono,
            :edad,
            :cedula,
            :id_historia,
            :id_afiliado,
            :id_direccion
          )
        ");

        $query->execute([
          ':nombre' => $this->nombre,
          ':apellido' => $this->apellido,
          ':parentesco' => $this->parentesco,
          ':telefono' => $this->telefono,
          ':edad' => $this->edad,
          ':cedula' => $this->cedula,
          ':id_historia' => $this->id_historia,
          ':id_afiliado' => $this->id_afiliado,
          ':id_direccion' => $this->id_direccion
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

    // instancia los modelos con informacion en el contructor
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

    // carga los ids en los modelos
    $historia->set_id($this->id_historia);
    $direccion->set_id($this->id_direccion);

    // ejecutar metodos de modificar
    $historia->modificar();
    $direccion->modificar();

    try {
      $bd = $this->conecta();
			$bd->query("UPDATE beneficiarios SET
        nombre = '$this->nombre',
        apellido = '$this->apellido',
        parentesco = '$this->parentesco',
        telefono = '$this->telefono',
        edad = '$this->edad',
        cedula = '$this->cedula',
        id_historia = '$this->id_historia',
        id_afiliado = '$this->id_afiliado',
        id_direccion = '$this->id_direccion'
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
		$r = array();
		try {
      $bd = $this->conecta();
      $bd->query("DELETE FROM beneficiarios
        WHERE
        id = '$this->id'
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
      $bd = $this->conecta();
			$resultados = $bd->query("SELECT
        b.*,
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

          a3.nombre AS nombre_afiliado,
          a3.apellido AS apellido_afiliado,
          a3.cedula AS cedula_afiliado
        FROM
          beneficiarios b
        JOIN
          historias h1 ON b.id_historia = h1.id
        JOIN
          direcciones d2 ON b.id_direccion = d2.id
        JOIN
          afiliados a3 ON b.id_afiliado = a3.id;
      ");
			if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
					$beneficiario['id'] = $resultado['id'];
          $beneficiario['nombre'] = $resultado['nombre'];
          $beneficiario['apellido'] = $resultado['apellido'];
          $beneficiario['parentesco'] = $resultado['parentesco'];
          $beneficiario['telefono'] = $resultado['telefono'];
          $beneficiario['edad'] = $resultado['edad'];
          $beneficiario['cedula'] = $resultado['cedula'];
          $beneficiario['id_historia'] = $resultado['id_historia'];
          $beneficiario['id_direccion'] = $resultado['id_direccion'];
          $beneficiario['id_afiliado'] = $resultado['id_afiliado'];

          $beneficiario['cod_historia'] = $resultado['cod_historia'];
          $beneficiario['tipo_sangre'] = $resultado['tipo_sangre'];
          $beneficiario['sexo'] = $resultado['sexo'];
          $beneficiario['peso'] = $resultado['peso'];
          $beneficiario['estatura'] = $resultado['estatura'];
          $beneficiario['fecha_nacimiento'] = $resultado['fecha_nacimiento'];

          $beneficiario['direccion'] = $resultado['direccion'];
          $beneficiario['zona'] = $resultado['zona'];
          $beneficiario['descripcion'] = $resultado['descripcion'];
          $beneficiario['postal'] = $resultado['postal'];

          $beneficiario['nombre_afiliado'] = $resultado['nombre_afiliado'];
          $beneficiario['apellido_afiliado'] = $resultado['apellido_afiliado'];
          $beneficiario['cedula_afiliado'] = $resultado['cedula_afiliado'];

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
