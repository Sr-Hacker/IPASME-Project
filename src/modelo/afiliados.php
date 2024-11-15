<?php
require_once('config/db.php');

class Afiliado extends DB{
  private $ced_afiliado;
  private $rif_institucion;
  private $primer_nombre;
  private $segundo_nombre;
  private $primer_apellido;
  private $segundo_apellido;
  private $sexo;
  private $fecha_nacimiento;
  private $estado_civil;
  private $direccion_habitacion;
  private $estado;
  private $ciudad;
  private $correo_electronico;
  private $telefono_celular;
  private $telefono_habitacion;
  private $telefono_trabajo;
  private $fecha_ingreso;
  private $cargo;
  private $situacion_laboral;

  private $n_historia;

  function set_ced_afiliado($valor){
    $this->ced_afiliado = $valor;
  }
	function set_rif_institucion($valor){
		$this->rif_institucion = $valor;
	}
	function set_primer_nombre($valor){
		$this->primer_nombre = $valor;
	}
  function set_segundo_nombre($valor){
    $this->segundo_nombre = $valor;
  }
  function set_primer_apellido($valor){
    $this->primer_apellido = $valor;
  }
  function set_segundo_apellido($valor){
    $this->segundo_apellido = $valor;
  }
  function set_sexo($valor){
    $this->sexo = $valor;
  }
  function set_fecha_nacimiento($valor){
    $this->fecha_nacimiento = $valor;
  }
  function set_estado_civil($valor){
    $this->estado_civil = $valor;
  }
  function set_direccion_habitacion($valor){
    $this->direccion_habitacion = $valor;
  }
  function set_estado($valor){
    $this->estado = $valor;
  }
  function set_ciudad($valor){
		$this->ciudad = $valor;
	}
  function set_correo_electronico($valor){
		$this->correo_electronico = $valor;
	}
  function set_telefono_celular($valor){
		$this->telefono_celular = $valor;
	}
  function set_telefono_habitacion($valor){
		$this->telefono_habitacion = $valor;
	}
  function set_telefono_trabajo($valor){
		$this->telefono_trabajo = $valor;
	}
  function set_fecha_ingreso($valor){
		$this->fecha_ingreso = $valor;
	}
  function set_cargo($valor){
		$this->cargo = $valor;
	}
  function set_situacion_laboral($valor){
		$this->situacion_laboral = $valor;
	}

  function set_n_historia($valor){
    $this->n_historia = $valor;
  }



	function incluir(){
		$r = array();
    try {
      $bd = $this->conecta();
      $bd->beginTransaction();

      $query = $bd->prepare("
        INSERT INTO afiliado (
          ced_afiliado,
          rif_institucion,
          primer_nombre,
          segundo_nombre,
          primer_apellido,
          segundo_apellido,
          sexo,
          fecha_nacimiento,
          estado_civil,
          direccion_habitacion,
          estado,
          ciudad,
          correo_electronico,
          telefono_celular,
          telefono_habitacion,
          telefono_trabajo,
          fecha_ingreso,
          cargo,
          situacion_laboral
        ) VALUES (
          :ced_afiliado,
          :rif_institucion,
          :primer_nombre,
          :segundo_nombre,
          :primer_apellido,
          :segundo_apellido,
          :sexo,
          :fecha_nacimiento,
          :estado_civil,
          :direccion_habitacion,
          :estado,
          :ciudad,
          :correo_electronico,
          :telefono_celular,
          :telefono_habitacion,
          :telefono_trabajo,
          :fecha_ingreso,
          :cargo,
          :situacion_laboral
        )
      ");

      $query->execute([
        ':ced_afiliado' => $this->ced_afiliado,
        ':rif_institucion' => $this->rif_institucion,
        ':primer_nombre' => $this->primer_nombre,
        ':segundo_nombre' => $this->segundo_nombre,
        ':primer_apellido' => $this->primer_apellido,
        ':segundo_apellido' => $this->segundo_apellido,
        ':sexo' => $this->sexo,
        ':fecha_nacimiento' => $this->fecha_nacimiento,
        ':estado_civil' => $this->estado_civil,
        ':direccion_habitacion' => $this->direccion_habitacion,
        ':estado' => $this->estado,
        ':ciudad' => $this->ciudad,
        ':correo_electronico' => $this->correo_electronico,
        ':telefono_celular' => $this->telefono_celular,
        ':telefono_habitacion' => $this->telefono_habitacion,
        ':telefono_trabajo' => $this->telefono_trabajo,
        ':fecha_ingreso' => $this->fecha_ingreso,
        ':cargo' => $this->cargo,
        ':situacion_laboral' => $this->situacion_laboral
      ]);

      $query2 = $bd->prepare("
      INSERT INTO historia_medica (
        n_historia
      ) VALUES (
        :n_historia
      )
    ");

    $query2->execute([
      ':n_historia' => $this->n_historia
    ]);

      $bd->commit();
      $consulta = $this->consultar();
      $r['resultado'] =  $consulta['resultado'];
      $r['mensaje'] =  'Registro Inluido';
    } catch(Exception $e) {
      $bd->rollBack();
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
			$query = $bd->prepare("UPDATE afiliado SET
        ced_afiliado = :ced_afiliado,
        rif_institucion = :rif_institucion,
        primer_nombre = :primer_nombre,
        segundo_nombre = :segundo_nombre,
        primer_apellido = :primer_apellido,
        segundo_apellido = :segundo_apellido,
        sexo = :sexo,
        fecha_nacimiento = :fecha_nacimiento,
        estado_civil = :estado_civil,
        direccion_habitacion = :direccion_habitacion,
        correo_electronico = :correo_electronico,
        telefono_celular = :telefono_celular,
        telefono_habitacion = :telefono_habitacion,
        telefono_trabajo = :telefono_trabajo,
        fecha_ingreso = :fecha_ingreso,
        cargo = :cargo,
        situacion_laboral = :situacion_laboral
        WHERE
        ced_afiliado = :ced_afiliado
      ");

      $query->execute([
        ':ced_afiliado' => $this->ced_afiliado,
        ':rif_institucion' => $this->rif_institucion,
        ':primer_nombre' => $this->primer_nombre,
        ':segundo_nombre' => $this->segundo_nombre,
        ':primer_apellido' => $this->primer_apellido,
        ':segundo_apellido' => $this->segundo_apellido,
        ':sexo' => $this->sexo,
        ':fecha_nacimiento' => $this->fecha_nacimiento,
        ':estado_civil' => $this->estado_civil,
        ':direccion_habitacion' => $this->direccion_habitacion,
        ':correo_electronico' => $this->correo_electronico,
        ':telefono_celular' => $this->telefono_celular,
        ':telefono_habitacion' => $this->telefono_habitacion,
        ':telefono_trabajo' => $this->telefono_trabajo,
        ':fecha_ingreso' => $this->fecha_ingreso,
        ':cargo' => $this->cargo,
        ':situacion_laboral' => $this->situacion_laboral
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
      $bd->query("DELETE FROM afiliado
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
			$resultados = $bd->query("SELECT * FROM afiliado");

			if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
					$afiliado['ced_afiliado'] = $resultado['ced_afiliado'];
          $afiliado['rif_institucion'] = $resultado['rif_institucion'];
          $afiliado['primer_nombre'] = $resultado['primer_nombre'];
          $afiliado['segundo_nombre'] = $resultado['segundo_nombre'];
          $afiliado['primer_apellido'] = $resultado['primer_apellido'];
          $afiliado['segundo_apellido'] = $resultado['segundo_apellido'];
          $afiliado['sexo'] = $resultado['sexo'];
          $afiliado['fecha_nacimiento'] = $resultado['fecha_nacimiento'];
          $afiliado['estado_civil'] = $resultado['estado_civil'];
          $afiliado['direccion_habitacion'] = $resultado['direccion_habitacion'];
          $afiliado['estado'] = $resultado['estado'];
          $afiliado['ciudad'] = $resultado['ciudad'];
          $afiliado['correo_electronico'] = $resultado['correo_electronico'];
          $afiliado['telefono_celular'] = $resultado['telefono_celular'];
          $afiliado['telefono_habitacion'] = $resultado['telefono_habitacion'];
          $afiliado['telefono_trabajo'] = $resultado['telefono_trabajo'];
          $afiliado['fecha_ingreso'] = $resultado['fecha_ingreso'];
          $afiliado['cargo'] = $resultado['cargo'];
          $afiliado['situacion_laboral'] = $resultado['situacion_laboral'];
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
          $institucion['rif_institucion'] = $resultado['rif_institucion'];
          $institucion['cod_ciudad'] = $resultado['cod_ciudad'];
          $institucion['nombre'] = $resultado['nombre'];
          $institucion['direccion'] = $resultado['direccion'];
          $institucion['codigo_postal'] = $resultado['codigo_postal'];
          $institucion['telefono'] = $resultado['telefono'];
          $institucion['correo'] = $resultado['correo'];
          $institucion['tipo_institucion'] = $resultado['tipo_institucion'];
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

  function consultar_estados(){
    $r = array();
		try{
      $bd = $this->conecta();
			$resultados = $bd->query("SELECT * FROM estados");

			if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
          $institucion['nombre_estado'] = $resultado['nombre_estado'];
          $institucion['cod_estado'] = $resultado['cod_estado'];
          array_push($respuesta, $institucion);
				}
				$r['resultado'] =  $respuesta;
				$r['mensaje'] =  "consulta";
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

  function consultar_ciudades($cod_estado){
    $r = array();
		try{
      $bd = $this->conecta();
			$resultados = $bd->query("SELECT * FROM ciudades WHERE cod_estado = $cod_estado");

			if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
          $institucion['nombre_ciudad'] = $resultado['nombre_ciudad'];
          $institucion['cod_ciudad'] = $resultado['cod_ciudad'];
          array_push($respuesta, $institucion);
				}
				$r['resultado'] =  $respuesta;
				$r['mensaje'] =  "consulta";
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
}
?>
