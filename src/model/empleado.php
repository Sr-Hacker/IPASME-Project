<?php
require_once('model/db.php');

class Empleado extends DB{
  private $nombre_apellido;
  private $cedula;
  private $rif;
  private $fecha_nac;
  private $vivienda;
  private $automovil;
  private $modelo;
  private $ano;
  private $telefono;
  private $celular;
  private $estado_civil;
  private $tipo_sangre;
  private $talla_camisa;
  private $talla_zapato;
  private $talla_pantalon;
  private $correo;
  private $cargo;
  private $estatus;

	function set_nombre_apellido($valor){
		$this->nombre_apellido = $valor;
	}
	function set_cedula($valor){
		$this->cedula = $valor;
	}
  function set_rif($valor){
		$this->rif = $valor;
	}
	function set_fecha_nac($valor){
		$this->fecha_nac = $valor;
	}
	function set_vivienda($valor){
		$this->vivienda = $valor;
	}
	function set_automovil($valor){
		$this->automovil = $valor;
	}
	function set_modelo($valor){
		$this->modelo = $valor;
	}
  function set_ano($valor){
		$this->ano = $valor;
	}
	function set_telefono($valor){
		$this->telefono = $valor;
	}
  function set_celular($valor){
		$this->celular = $valor;
	}
  function set_estado_civil($valor){
		$this->estado_civil = $valor;
	}
  function set_tipo_sangre($valor){
		$this->tipo_sangre = $valor;
	}
  function set_talla_camisa($valor){
		$this->talla_camisa = $valor;
	}
  function set_talla_zapato($valor){
		$this->talla_zapato = $valor;
	}
  function set_talla_pantalon($valor){
		$this->talla_pantalon = $valor;
	}
  function set_correo($valor){
		$this->correo = $valor;
	}
  function set_cargo($valor){
		$this->cargo = $valor;
	}
  function set_estatus($valor){
		$this->estatus = $valor;
	}

	function get_nombre_apellido($valor){
    return $this->nombre_apellido;
	}
	function get_cedula($valor){
    return $this->cedula;
	}
  function get_rif($valor){
    return $this->rif;
	}
	function get_fecha_nac($valor){
    return $this->fecha_nac;
	}
	function get_vivienda($valor){
    return $this->vivienda;
	}
	function get_automovil($valor){
    return $this->automovil;
	}
	function get_modelo($valor){
    return $this->modelo;
	}
  function get_ano($valor){
    return $this->ano;
	}
	function get_telefono($valor){
    return $this->telefono;
	}
  function get_celular($valor){
    return $this->celular;
	}
  function get_estado_civil($valor){
    return $this->estado_civil;
	}
  function get_tipo_sangre($valor){
    return $this->tipo_sangre;
	}
  function get_talla_camisa($valor){
    return $this->talla_camisa;
	}
  function get_talla_zapato($valor){
    return $this->talla_zapato;
	}
  function get_talla_pantalon($valor){
    return $this->talla_pantalon;
	}
  function get_correo($valor){
    return $this->correo;
	}
  function get_cargo($valor){
    return $this->cargo;
	}
  function get_estatus($valor){
    return $this->estatus;
	}

	function incluir(){
		$r = array();
		if(!$this->existe($this->cedula)){
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			try {
					$co->query("INSERT INTO empleados(
            apellidosynombres,
						cedula,
						rif,
						fechadenacimiento,
						vivienda,
						automovil,
						modelo,
            ano,
            telefono,
            celular,
            estadocivil,
            tipodesangre,
            talladecamisa,
            talladezapato,
            talladepantalon,
            correo,
            cargo,
            estatus
						)
						VALUES(
              '$this->nombre_apellido',
              '$this->cedula',
              '$this->rif',
              '$this->fecha_nac',
              '$this->vivienda',
              '$this->automovil',
              '$this->modelo',
              '$this->ano',
              '$this->telefono',
              '$this->celular',
              '$this->estado_civil',
              '$this->tipo_sangre',
              '$this->talla_camisa',
              '$this->talla_zapato',
              '$this->talla_pantalon',
              '$this->correo',
              '$this->cargo',
              '$this->estatus'
						)");
						$r['resultado'] = 'incluir';
			            $r['mensaje'] =  'Registro Inluido';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
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
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->cedula)){
			try {
					$co->query("UPDATE empleados SET
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
					$co->query("DELETE FROM empleados
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

			$resultados = $co->query("SELECT * from empleados");

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


	private function existe($cedula){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			$resultado = $co->query("SELECT * FROM empleados WHERE cedula='$cedula'");

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
