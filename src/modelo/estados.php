<?php
require_once('config/db.php');

class Estado extends DB{
  private $cod_estado;
  private $nombre_estado;
  private $nombre_ciudad;

	function set_cod_estado($valor){
		$this->cod_estado = $valor;
	}
	function set_nombre_estado($valor){
		$this->nombre_estado = $valor;
	}

	function incluir(){
		$r = array();
			try {
        $bd = $this->conecta();
        $query = $bd->prepare("INSERT INTO estados (
            cod_estado,
            nombre_estado
          ) VALUES (
            :cod_estado,
            :nombre_estado
          )
        ");

        $query->execute([
          ':cod_estado' => $this->cod_estado,
          ':nombre_estado' => $this->nombre_estado
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
      $co->query("UPDATE estados SET
        cod_estado = '$this->cod_estado',
        nombre_estado =  '$this->nombre_estado'
        WHERE
        cod_estado = '$this->cod_estado',
        nombre_estado = '$this->nombre_estado'
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
      $co->query("DELETE FROM estados
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
			$resultados = $co->query("SELECT * from estados");

			if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
					$ciudades['cod_estado'] = $resultado['cod_estado'];
					$ciudades['nombre_estado'] = $resultado['nombre_estado'];
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
      $stmt = $co->prepare("SELECT * FROM estados WHERE codigo = :codigo");
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
