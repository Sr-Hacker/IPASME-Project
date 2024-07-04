<?php
require_once('config/db.php');
require_once('modelo/direccion.php');

class Institucion extends DB{
  private $id;
  private $nombre;
  private $rif;
  private $id_direccion;

  public function __construct($nombre, $rif) {
    $this->nombre = $nombre;
    $this->rif = $rif;
  }

	function set_id($valor){
		$this->id = $valor;
	}
	function set_nombre($valor){
		$this->nombre = $valor;
	}
  function set_rif($valor){
		$this->rif = $valor;
	}
	function set_id_direccion($valor){
		$this->id_direccion = $valor;
	}

  public function incluir() {
    $direccion = new Direccion('direccion', 'barrio', 'seguro', '3021');
    $this->set_id_direccion($direccion->incluir());

    $r = array();
      try {
        $bd = $this->conecta();
        $query = $bd->prepare("
          INSERT INTO instituciones (
            nombre,
            rif,
            id_direccion
          ) VALUES (
            :nombre,
            :rif,
            :id_direccion
          )
        ");

        $query->execute([
          ':nombre' => $this->nombre,
          ':rif' => $this->rif,
          ':id_direccion' => $this->id_direccion
        ]);

        $r['resultado'] = 'incluir';
        $r['mensaje'] = 'Registro Incluido';
        $r['id'] = $bd->lastInsertId();
      } catch (PDOException $e) {
        $r['resultado'] = 'error';
        $r['mensaje'] = $e->getMessage();
      }
    return $r;
  }

	function modificar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->rif)){
			try {
					$co->query("UPDATE instituciones SET
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
					$co->query("DELETE FROM instituciones
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
			$resultado = $co->query("SELECT * FROM instituciones WHERE rif='$rif'");

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
