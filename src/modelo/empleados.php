<?php
require_once('modelo/db.php');

class Empleado extends DB{
  private $apellido;

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
					$trabajador['apellido'] = $resultado['apellido'];
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
