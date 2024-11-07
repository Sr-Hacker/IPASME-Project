<?php
require_once('config/db.php');

class Ciudad extends DB{
  private $cod_ciudad;
  private $cod_estado;
  private $nombre_ciudad;

	function set_cod_ciudad($valor){
		$this->cod_ciudad = $valor;
	}
	function set_cod_estado($valor){
		$this->cod_estado = $valor;
	}
  function set_nombre_ciudad($valor){
		$this->nombre_ciudad = $valor;
	}


	function incluir(){
		$r = array();
			try {
        $bd = $this->conecta();
        $query = $bd->prepare("INSERT INTO ciudades (
            cod_ciudad,
            cod_estado,
            nombre_ciudad
          ) VALUES (
            :cod_ciudad,
            :cod_estado,
            :nombre_ciudad
          )
        ");

        $query->execute([
          ':cod_ciudad' => $this->cod_ciudad,
          ':cod_estado' => $this->cod_estado,
          'nombre_ciudad' => $this->nombre_ciudad
        ]);

      $consulta = $this->consultar();
      $r['resultado'] =  $consulta['resultado'];
      $r['mensaje'] =  'Registro incluido';
    } catch(Exception $e) {
      $consulta = $this->consultar();
      $r['resultado'] =  $consulta['resultado'];
      $r['mensaje'] =  $e->getMessage();
    }
		return $r;
	}

	function modificar(){
    $r = array();
    try {
      $co = $this->conecta();
      $co->query("UPDATE ciudades SET
        cod_ciudad = '$this->cod_ciudad',
        cod_estado =  '$this->cod_estado',
        nombre_ciudad = '$this->nombre_ciudad'
        WHERE
        cod_ciudad = '$this->cod_ciudad',
        cod_estado = '$this->cod_estado',
        nombre_ciudad = '$this->nombre_ciudad'
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
      $co = $this->conecta();
      $co->query("DELETE FROM ciudades
        WHERE
        cod_ciudad = '$this->cod_ciudad'
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
      $co = $this->conecta();
			$resultados = $co->query("SELECT * from ciudades");

			if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
					$ciudades['cod_ciudad'] = $resultado['cod_ciudad'];
					$ciudades['cod_estado'] = $resultado['cod_estado'];
          $ciudades['nombre_ciudad'] = $resultado['nombre_ciudad'];
          array_push($respuesta, $ciudades);
				}
				$r['resultado'] =  $respuesta;
				$r['mensaje'] =  "consulta";
			}
			else{
				$r['resultado'] = 'consultar';
				$r['mensaje'] =  '';
			}

		}catch(Exception $e){

			$r['resultado'] = 'error';
			$r['mensaje'] =  $e->getMessage();
		}
		return $r;
	}

  function buscar() {
    try {
      $co = $this->conecta();
      $stmt = $co->prepare("SELECT * FROM especialidades WHERE codigo = :codigo");
      $stmt->bindParam(':codigo', $this->codigo, PDO::PARAM_STR);
      $stmt->execute();
      $fila = $stmt->fetchAll(PDO::FETCH_BOTH);
      return $fila;
    } catch (Exception $e) {
      return false;
    }
  }
}
?>
