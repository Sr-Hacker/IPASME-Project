<?php
require_once('config/db.php');

class Historia extends DB{
  private $n_historia;
  private $fecha_registro;
  private $partida_de_nacimiento;
  private $acta_de_matrimonio;
  private $constancia_Trabajo;

  // public function __construct($n_historia, $fecha_registro, $partida_de_nacimiento, $acta_de_matrimonio, $constancia_Trabajo) {
  //   $this->n_historia = $n_historia;
  //   $this->fecha_registro = $fecha_registro;
  //   $this->partida_de_nacimiento = $partida_de_nacimiento;
  //   $this->acta_de_matrimonio = $acta_de_matrimonio;
  //   $this->constancia_Trabajo = $constancia_Trabajo;
  // }

  function set_n_historia($valor){
		$this->n_historia = $valor;
	}
  function set_fecha_registro($valor){
    $this->fecha_registro = $valor;
  }
  function set_partida_de_nacimiento($valor){
    $this->partida_de_nacimiento = $valor;
  }
  function set_acta_de_matrimonio($valor){
    $this->acta_de_matrimonio = $valor;
  }
  function set_constancia_Trabajo($valor){
    $this->constancia_Trabajo = $valor;
  }

  public function incluir() {
    $r = array();
      try {
        $bd = $this->conecta();
        $query = $bd->prepare("
          INSERT INTO historias_medicas (
            n_historia,
            fecha_registro,
            partida_de_nacimiento,
            acta_de_matrimonio,
            constancia_Trabajo
          ) VALUES (
            :n_historia,
            :fecha_registro,
            :partida_de_nacimiento,
            :acta_de_matrimonio,
            :constancia_Trabajo
          )
        ");

        $query->execute([
          ':n_historia' => $this->n_historia,
          ':fecha_registro' => $this->fecha_registro,
          ':partida_de_nacimiento' => $this->partida_de_nacimiento,
          ':acta_de_matrimonio' => $this->acta_de_matrimonio,
          ':constancia_Trabajo' => $this->constancia_Trabajo,
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
      $query = $bd->prepare("UPDATE historias_medicas SET
        n_historia = :n_historia,
        fecha_registro = :fecha_registro,
        partida_de_nacimiento = :partida_de_nacimiento,
        acta_de_matrimonio = :acta_de_matrimonio,
        constancia_Trabajo = :constancia_Trabajo
        WHERE
        n_historia = :n_historia
      ");

      $query->execute([
        ':n_historia' => $this->n_historia,
        ':fecha_registro' => $this->fecha_registro,
        ':partida_de_nacimiento' => $this->partida_de_nacimiento,
        ':acta_de_matrimonio' => $this->acta_de_matrimonio,
        ':constancia_Trabajo' => $this->constancia_Trabajo,
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
      $bd->query("DELETE FROM historias_medicas
        WHERE
        n_historia = '$this->n_historia'
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
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
			$resultados = $co->query("SELECT * from historias_medicas");
			if($resultados){
				$respuesta = [];
				foreach($resultados as $resultado){
					$historias['n_historia'] = $resultado['n_historia'];
          $historias['fecha_registro'] = $resultado['fecha_registro'];
          $historias['partida_de_nacimiento'] = $resultado['partida_de_nacimiento'];
          $historias['acta_de_matrimonio'] = $resultado['acta_de_matrimonio'];
          $historias['constancia_Trabajo'] = $resultado['constancia_Trabajo'];
          array_push($respuesta, $historias);
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

  private function existe($cedula) {
    $bd = $this->pdo->prepare("SELECT COUNT(*) FROM historias WHERE cedula = :cedula");
    $bd->execute(['cedula' => $cedula]);
    return $bd->fetchColumn() > 0;
  }
}?>
