<?php

namespace Bingo;

class FabricaCartones {

  public function generarCarton() {
    // Algo de pseudo-código para ayudar con la evaluacion.
		$carton= [];		
		while(!$this->cartonEsValido($carton)){
    	$carton = $this->columnas($this->intentoCarton());
    }
		return $carton;
  }

  protected function cartonEsValido($carton) {
    if ($this->validarUnoANoventa($carton) &&
      $this->validarCincoNumerosPorFila($carton) &&
      $this->validarColumnaNoVacia($carton) &&
      $this->validarColumnaCompleta($carton) &&
      $this->validarTresCeldasIndividuales($carton) &&
      $this->validarNumerosIncrementales($carton) &&
      $this->validarFilasConVaciosUniformes($carton)
    ) {
      return TRUE;
    }
    return FALSE;
  }

  protected function validarUnoANoventa($carton) {
		foreach ($this->filas($carton) as $fila) {
      foreach ($this->celdas_ocupadas($fila) as $celda) {
        if(($celda > 90) || ($celda < 1))
					return FALSE;
      }
    }
		return TRUE;
  }

  protected function validarCincoNumerosPorFila($carton) {
		foreach($this->filas($carton) as $fila){
			if(5 != $this->celdas_ocupadas($fila))
				return FALSE;    
		}
		return TRUE;
  }

  protected function validarColumnaNoVacia($carton) {
		foreach($this->columnas($carton) as $columna){
			if(sizeof($this->celdas_ocupadas($columna)) == 0)
				return FALSE;
		}
		return TRUE;
  }

  protected function validarColumnaCompleta($carton) {
		foreach($this->columnas($carton) as $columna){
			if(sizeof($this->celdas_ocupadas($columna)) >= 3)
				return FALSE;
		}
		return TRUE;
  }

  protected function validarTresCeldasIndividuales($carton) {
		$cont = 0;
    foreach($this->columnas($carton) as $columna){
			if(sizeof($this->celdas_ocupadas($columna)) == 1){
				$cont++;
			}
		}
		return ($cont == 3);
  }

  protected function validarNumerosIncrementales($carton) {
		$columna = $this->columnas($carton);
    for ($i=0; $i < sizeof($columna)-1; $i++) {
      if(max($this->celdas_ocupadas($columna[$i])) >= min($this->celdas_ocupadas($columna[$i+1])))
				return FALSE;
    }
		return TRUE;
  }

  protected function validarFilasConVaciosUniformes($carton) {
		$cont=0;
    foreach ($this->filas($carton) as $fila ) {
      for ($i=0; $i < sizeof($fila); $i++) {
        if ($fila[$i]==0) {
          $cont++;
        }
        else {
          $cont=0;
        }
        if($cont >= 3)
					return FALSE;
      }
      $cont=0;
    }
		return TRUE;
  }


  public function intentoCarton() {
    $contador = 0;

    $carton = [
      [0,0,0],
      [0,0,0],
      [0,0,0],
      [0,0,0],
      [0,0,0],
      [0,0,0],
      [0,0,0],
      [0,0,0],
      [0,0,0]
    ];
    $numerosCarton = 0;

    while ($numerosCarton < 15) {
      $contador++;
      if ($contador == 50) {
        return $this->intentoCarton();
      }
      $numero = rand (1, 90);

      $columna = floor ($numero / 10);
      if ($columna == 9) { $columna = 8;}
      $huecos = 0;
      for ($i = 0; $i<3; $i++) {
        if ($carton[$columna][$i] == 0) {
          $huecos++;
        }
        if ($carton[$columna][$i] == $numero) {
          $huecos = 0;
          break;
        }
      }
      if ($huecos < 2) {
        continue;
      }

      $fila = 0;
      for ($j=0; $j<3; $j++) {
        $huecos = 0;
        for ($i = 0; $i<9; $i++) {
          if ($carton[$i][$fila] == 0) { $huecos++; }
        }

        if ($huecos < 5 || $carton[$columna][$fila] != 0) {
          $fila++;
        } else{
          break;
        }
      }
      if ($fila == 3) {
        continue;
      }

      $carton[$columna][$fila] = $numero;
      $numerosCarton++;
      $contador = 0;
    }

    for ( $x = 0; $x < 9; $x++) {
      $huecos = 0;
      for ($y =0; $y < 3; $y ++) {
        if ($carton[$x][$y] == 0) { $huecos++;}
      }
      if ($huecos == 3) {
        return $this->intentoCarton();
      }
    }

    return $carton;
  }


  public function filas($numeros_carton) {
    return $numeros_carton;
  }

  
  public function columnas($numeros_carton) {
    $columna = [];
    for ($i=0; $i < sizeof($numeros_carton); $i++) {
      for ($j=0; $j < sizeof($numeros_carton[$i]); $j++) {
        $columna[$j][$i] = $numeros_carton[$i][$j];
      }
    }
    return $columna;
  }

	function celdas_ocupadas(array $lista) {
		return array_filter($lista);
	}	

}
