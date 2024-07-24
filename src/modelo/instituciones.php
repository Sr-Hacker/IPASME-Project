<?php
require_once('config/db.php');
require_once('modelo/direccion.php');
require_once('modelo/institucion.php');
require_once('modelo/historia_medica.php');

class Instituciones extends DB{
  private $rif;
  private $nombre;
  private $estado_provincia;
  private $ciudad;
  private $direccion;
  private $codigo_postal;
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
	function set_codigo_postal($valor){
		$this->codigo_postal = $valor;
	}
	function set_telefono($valor){
		$this->telefono = $valor;
	}
  function set_correo($valor){
		$this->correo = $valor;
	}

	function incluir(){
		$r = array();
		if(!$this->existe($this->cedula)){
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
      $institucion = new institucion(
        $this->nombre_institucion,
        $this->rif_institucion,
        $this->direccion_institucion,
        $this->zona_institucion,
        $this->descripcion_institucion,
        $this->postal_institucion
      );

      // recupera los ids del registro de los modelos
      $this->set_id_historia($historia->incluir());
      $this->set_id_direccion($direccion->incluir());
      $this->set_id_institucion($institucion->incluir());

			try {
        $bd = $this->conecta();
        $query = $bd->prepare("
          INSERT INTO afiliados (
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
    $institucion = new institucion(
      $this->nombre_institucion,
      $this->rif_institucion,
      $this->direccion_institucion,
      $this->zona_institucion,
      $this->descripcion_institucion,
      $this->postal_institucion
    );
    // carga los ids en los modelos
    $historia->set_id($this->id_historia);
    $direccion->set_id($this->id_direccion);
    $institucion->set_id($this->id_institucion);
    $institucion->set_id_direccion($this->id_direccion_institucion);

    // ejecutar metodos de modificar
    $historia->modificar();
    $direccion->modificar();
    $institucion->modificar();

    try {
      $bd = $this->conecta();
			$bd->query("UPDATE afiliados SET
        nombre = '$this->nombre',
        apellido = '$this->apellido',
        telefono = '$this->telefono',
        edad = '$this->edad',
        cargo = '$this->cargo',
        cedula = '$this->cedula',
        id_historia = '$this->id_historia',
        id_direccion = '$this->id_direccion',
        id_institucion = '$this->id_institucion'
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
      $bd->query("DELETE FROM afiliados
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
          direcciones d4 ON i3.id_direccion = d4.id;
        ");


			if($resultados){

				$respuesta = [];
				foreach($resultados as $resultado){
					$afiliado['id'] = $resultado['id'];
          $afiliado['nombre'] = $resultado['nombre'];
          $afiliado['apellido'] = $resultado['apellido'];
          $afiliado['telefono'] = $resultado['telefono'];
          $afiliado['edad'] = $resultado['edad'];
          $afiliado['cargo'] = $resultado['cargo'];
          $afiliado['cedula'] = $resultado['cedula'];
          $afiliado['id_historia'] = $resultado['id_historia'];
          $afiliado['id_direccion'] = $resultado['id_direccion'];
          $afiliado['id_institucion'] = $resultado['id_institucion'];

          $afiliado['cod_historia'] = $resultado['cod_historia'];
          $afiliado['tipo_sangre'] = $resultado['tipo_sangre'];
          $afiliado['sexo'] = $resultado['sexo'];
          $afiliado['peso'] = $resultado['peso'];
          $afiliado['estatura'] = $resultado['estatura'];
          $afiliado['fecha_nacimiento'] = $resultado['fecha_nacimiento'];

          $afiliado['direccion'] = $resultado['direccion'];
          $afiliado['zona'] = $resultado['zona'];
          $afiliado['descripcion'] = $resultado['descripcion'];
          $afiliado['postal'] = $resultado['postal'];

          $afiliado['nombre_institucion'] = $resultado['nombre_institucion'];
          $afiliado['rif_institucion'] = $resultado['rif_institucion'];
          $afiliado['id_direccion_institucion'] = $resultado['id_direccion_institucion'];

          $afiliado['direccion_institucion'] = $resultado['direccion_institucion'];
          $afiliado['zona_institucion'] = $resultado['zona_institucion'];
          $afiliado['descripcion_institucion'] = $resultado['descripcion_institucion'];
          $afiliado['postal_institucion'] = $resultado['postal_institucion'];
          array_push($respuesta, $afiliado);
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

	private function existe($cedula){
		try{
      $bd = $this->conecta();
			$resultado = $bd->query("SELECT * FROM afiliados WHERE cedula='$cedula'");

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
