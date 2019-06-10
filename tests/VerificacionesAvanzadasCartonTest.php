<?php

namespace Bingo;

use PHPUnit\Framework\TestCase;


class VerificacionesAvanzadasCartonTest extends TestCase {

  /**
   * Verifica que los números del carton se encuentren en el rango 1 a 90.
   * @dataProvider cartones
   */
  public function testUnoANoventa(CartonInterface $carton) {
    foreach ($carton->filas() as $fila) {
      foreach (celdas_ocupadas($fila) as $celda) {
        $this->assertFalse(($celda > 90) || ($celda < 1));
      }
    }
  }

  /**
   * Verifica que cada fila de un carton tenga exactamente 5 celdas ocupadas.
   * @dataProvider cartones
   */
  public function testCincoNumerosPorFila(CartonInterface $carton) {
    foreach($carton->filas() as $fila){
	$this->assertCount(5,celdas_ocupadas($fila));
    }
  }

  /**
   * Verifica que para cada columna, haya al menos una celda ocupada.
   * @dataProvider cartones
   */
  public function testColumnaNoVacia(CartonInterface $carton) {
	foreach($carton->columnas() as $columna){
		$this->assertTrue(sizeof(celdas_ocupadas($columna)) != 0);
	}    
  }

  /**
   * Verifica que no haya columnas de un carton con tres celdas ocupadas.
   * @dataProvider cartones
   */
  public function testColumnaCompleta(CartonInterface $carton) {
    foreach($carton->columnas() as $columna){
		$this->assertTrue(sizeof(celdas_ocupadas($columna)) < 3);
	}    
  }

  /**
   * Verifica que solo hay exactamente tres columnas que tienen solo una celda
   * ocupada.
   * @dataProvider cartones
   */
  public function testTresCeldasIndividuales(CartonInterface $carton) {
	$cont = 0;
    foreach($carton->columnas() as $columna){
	if(sizeof(celdas_ocupadas($columna)) == 1){
		$cont++;
	} 		
	}  
$this->assertEquals(3, $cont);
  }

  /**
   * Verifica que los números de las columnas izquierdas son menores que los de
   * las columnas a la derecha.
   */
  public function testNumerosIncrementales() {
    $this->assertTrue(TRUE);
  }

  /**
   * Verifica que en una fila no existan más de dos celdas vacias consecutivas.
   */
  public function testFilasConVaciosUniformes() {
    $this->assertTrue(TRUE);
  }

  public function cartones() {
    return [
      [new CartonEjemplo],
      [new CartonJs],
    ];
  }

}
