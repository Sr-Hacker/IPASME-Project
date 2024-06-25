<?php
require_once('model/db.php');

class Institucion extends DB{
  private $id;
  private $nombre;
  private $direccion;
  private $rif;

	function set_id($valor){
		$this->id = $valor;
	}
	function set_nombre($valor){
		$this->rif = $valor;
	}
  function set_rif($valor){
		$this->rif = $valor;
	}
	function set_direccion($valor){
		$this->direccion = $valor;
	}


  function get_id($valor){
		return $this->id = $valor;
	}
	function get_nombre($valor){
		return $this->rif = $valor;
	}
  function get_rif($valor){
		return $this->rif = $valor;
	}
	function get_direccion($valor){
		return $this->direccion = $valor;
	}


	function incluir(){
		$r = array();
		if(!$this->existe($this->rif)){
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			try {
					$co->query("INSERT INTO instituciones(
            rif,
            nombre,
            direccion,
					)
						VALUES(
              '$this->rif',
              '$this->nombre',
              '$this->direccion',
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
			$r['mensaje'] =  'Ya existe la rif';
		}

    $result = $this->consultar();
		return $result;
	}

	function modificar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->rif)){
			try {
					$co->query("UPDATE empleados SET
              nombre = '$this->nombre',
              rif = '$this->rif',
              rif = '$this->rif',
              WHERE
              rif = '$this->rif'
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
			$r['mensaje'] =  'rif no registrada';
		}
    $result = $this->consultar();
		return $result;
	}

	function eliminar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->rif)){
			try {
					$co->query("DELETE FROM empleados
						WHERE
						rif = '$this->rif'
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
			$r['mensaje'] =  'No existe la rif';
		}
    $result = $this->consultar();
		return $result;
	}


	function consultar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{

			$resultados = $co->query("SELECT * from productos");

			if($resultados){

				$respuesta = [];
				foreach($resultados as $resultado){
					$producto['id'] = $resultado['id'];
          $producto['nombre'] = $resultado['nombre'];
          $producto['codigo'] = $resultado['codigo'];
          $producto['categoria'] = $resultado['categoria'];
          $producto['precio'] = $resultado['precio'];
          $producto['cantidad'] = $resultado['cantidad'];
          $producto['imagen'] = $resultado['imagen'];
          array_push($respuesta, $producto);
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


	private function existe($rif){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			$resultado = $co->query("SELECT * FROM empleados WHERE rif='$rif'");

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
