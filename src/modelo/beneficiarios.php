<?php
require_once('config/db.php');
require_once('modelo/direccion.php');
require_once('modelo/institucion.php');
require_once('modelo/historia_medica.php');

class Beneficiario extends DB{
  private $id;
  private $nombre;
  private $apellido;
  private $telefono;
  private $edad;
  private $cargo;
  private $cedula;
  private $id_historia;
  private $id_direccion;
  private $id_institucion;

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
  function set_id_direccion($valor){
		$this->id_direccion = $valor;
	}
  function set_id_institucion($valor){
		$this->id_institucion = $valor;
	}

	function incluir(){
		$r = array();
		if(!$this->existe($this->cedula)){
		  // $historia = new Historia('12345678', 'H001', 'O+', 'M', 1.75, 70, '1990-01-01');
		  $direccion = new Direccion('direccion', 'union', 'seguro', '3021');
      // $institucion = new institucion('Inces', 'J-274361790');

      // $this->set_id_historia($historia->incluir());
      $this->set_id_direccion($direccion->incluir());
      // $this->set_id_institucion($institucion->incluir());
      return $this->id_direccion;

			try {
        $bd = $this->conecta();
        $query = $bd->prepare("
          INSERT INTO empleados (
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
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->cedula)){
			try {
					$co->query("UPDATE beneficiarios SET
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

			$resultados = $co->query("SELECT * from beneficiarios");

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
