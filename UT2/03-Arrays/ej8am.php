<?php

    //creada directamente, 3 filas, que son los 3 array creados (array()) y 3 columnas que son los números dados.
    $matriz1= array(array("1","2","3"),array("1","2","3"),array("1","2","3"));
    $matriz2= array();
    $matrizResultado= array();

    //la 2 está creada mediante un for.
    for($i=0;$i<3;$i++) { //de 0 a 2 hay 3 posiciones.
        for($j=0;$j<3;$j++) {
            $matriz2[$i][$j]= random_int(1,5);
        }
    }

    var_dump($matriz1);
    var_dump($matriz2);

    //así conseguimos sacar una nueva matriz con la suma de esas dos matrices.
    for($i=0;$i<3;$i++) {
        for($j=0;$j<3;$j++) {
            $matrizResultado[$i][$j]= $matriz1[$i][$j]+$matriz2[$i][$j];
        }
    }

    var_dump($matrizResultado);
?>