<?php

namespace Bingo;

/**
 * Este es un Carton de generado con
 * https://github.com/vicmagv/bingo-card-generator/blob/master/generar_carton.js
 */
class Carton implements CartonInterface {

  protected $numeros_carton = [];

  public function __construct(array $carton_aleatorio) {
    $this->numeros_carton = $carton_aleatorio;
  }

  /**
   * {@inheritdoc}
   */
  public function filas() {
    return $this->numeros_carton;
  }

  /**
   * {@inheritdoc}
   */
  public function columnas() {
    $columna = [];
    for ($i=0; $i < sizeof($this->numeros_carton); $i++) {
      for ($j=0; $j < sizeof($this->numeros_carton[$i]); $j++) {
        $columna[$j][$i] = $this->numeros_carton[$i][$j];
      }
    }
    return $columna;
  }

  /**
   * {@inheritdoc}
   */
  public function tieneNumero(int $numero) {
    return in_array($numero, $this->numerosDelCarton());
  }

}
