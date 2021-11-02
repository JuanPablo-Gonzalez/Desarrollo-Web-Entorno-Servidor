<?php

    $matriz= array();
    $matrizTraspuesta= array();

    //la 2 está creada mediante un for.
    for($i=0;$i<3;$i++) { //de 0 a 2 hay 3 posiciones.
        for($j=0;$j<4;$j++) {
            $matriz[$i][$j]= random_int(1,5);
        }
    }

    //conseguimos la matriz traspuesta. los índices serán los que marquen las posiciones, el valor será $num.
    foreach($matriz as $indiceFila=> $fila) {
        foreach($fila as $indiceColumna=> $num) {
            $matrizTraspuesta[$indiceColumna][$indiceFila]= $num;
        }
    }

    var_dump($matriz);
    var_dump($matrizTraspuesta);

?>