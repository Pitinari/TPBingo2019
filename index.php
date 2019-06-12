<?php

require 'vendor/autoload.php';

use Bingo\FabricaCartones;

$fabrica = new FabricaCartones;

foreach (range(1, 5) as $intento) {
  $carton = $fabrica->columnas($fabrica->intentoCarton());
  print "Intento $intento:\n";
  imprimirCarton($carton);
}

function imprimirCarton($carton) {
  print("[\n");
  foreach ($carton as $fila) {
    print("  [");
    foreach ($fila as $celda) {
      printf("% 2d, ", $celda);
    }
    print("],");
    print("\n");
  }
  print("];\n\n");
}
