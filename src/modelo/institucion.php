<?php
require_once('config/db.php');
require_once('modelo/direccion.php');

class Institucion extends DB{
  private $id;
  private $nombre;
  private $rif;

  private $id_direccion = 0;
  private $direccion;
  private $zona;
  private $descripcion;
  private $postal;

  public function __construct($nombre, $rif, $direccion, $zona, $descripcion, $postal) {
    $this->nombre = $nombre;
    $this->rif = $rif;
    $this->direccion = $direccion;
    $this->zona = $zona;
    $this->descripcion = $descripcion;
    $this->postal = $postal;
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
    $direccion = new Direccion(
      $this->direccion,
      $this->zona,
      $this->descripcion,
      $this->postal
    );
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
        $r['id'] = $bd->lastInsertId();
      } catch (PDOException $e) {
        $r['resultado'] = 'error';
        $r['mensaje'] = $e->getMessage();
      }
    return $r["id"];
  }

	function modificar(){
    $r = array();

    // instanciar modelo con informacion en el construnctor
    $direccion = new Direccion(
      $this->direccion,
      $this->zona,
      $this->descripcion,
      $this->postal
    );
    // carga el id en el modelo
    $direccion->set_id($this->id_direccion);

    // ejecutar metodo de modificar
    $direccion->modificar();

    try {
      $bd = $this->conecta();
			$bd->query("UPDATE instituciones SET
        nombre = '$this->nombre',
        rif = '$this->rif',
        id_direccion = '$this->id_direccion',
        WHERE
        id = '$this->id'
      ");
      $r['resultado'] = 'modificar';
      $r['mensaje'] =  'Registro Modificado';
    } catch(Exception $e) {
      $r['resultado'] = 'error';
      $r['mensaje'] =  $e->getMessage();
    }
		return $r;
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
