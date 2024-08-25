<?php
require_once('config/db.php');

class Medico extends DB{
  private $ced_medico;
  private $nombre;
  private $apellido;
  private $estado;

  function set_ced_medico($valor){
    $this->ced_medico = $valor;
  }
	function set_nombre($valor){
		$this->nombre = $valor;
	}
	function set_apellido($valor){
		$this->apellido = $valor;
	}
  function set_estado($valor){
    $this->estado = $valor;
  }

	function incluir(){
		$r = array();
    try {
      $bd = $this->conecta();
      $query = $bd->prepare("
        INSERT INTO medicos (
          ced_medico,
          nombre,
          apellido,
          estado
        ) VALUES (
          :ced_medico,
          :nombre,
          :apellido,
          :estado
        )
      ");

      $query->execute([
        ':ced_medico' => $this->ced_medico,
        ':nombre' => $this->nombre,
        ':apellido' => $this->apellido,
        ':estado' => $this->estado
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
			$query = $bd->prepare("UPDATE medicos SET
        ced_medico = :ced_medico,
        nombre = :nombre,
        apellido = :apellido,
        estado = :estado
        WHERE
        ced_medico = :ced_medico
      ");

      $query->execute([
        ':ced_medico' => $this->ced_medico,
        ':nombre' => $this->nombre,
        ':apellido' => $this->apellido,
        ':estado' => $this->estado
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
      $bd->query("DELETE FROM medicos
        WHERE
        ced_medico = '$this->ced_medico'
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
			$resultados = $bd->query("SELECT * FROM medicos");

			if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
					$afiliado['ced_medico'] = $resultado['ced_medico'];
          $afiliado['nombre'] = $resultado['nombre'];
          $afiliado['apellido'] = $resultado['apellido'];
          $afiliado['estado'] = $resultado['estado'];
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
          medicos a
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

  function consultar_especialidades(){
    $r = array();
		try{
      $bd = $this->conecta();
			$resultados = $bd->query("SELECT * FROM especialidades");

			if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
          $institucion['cod_especialidad'] = $resultado['cod_especialidad'];
          $institucion['nombre'] = $resultado['nombre'];
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
