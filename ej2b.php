<?php
   $decimal= "48";
   $auxDecimal= $decimal; //la usaremos para los cálculos a realizar, para no machacar la otra.
   $base= "6";
   $resultado= "";
   $resto;
	
   if($base=="2") { //si la base es 2, habrá que convertirlo a binario.
        while($auxDecimal!=0) {
            if($auxDecimal%$base==0) {
                $resto= 0;
            } else {
                $resto= 1;
            }
            $resultado= $resto.$resultado;
            $auxDecimal= ((integer)$auxDecimal/2); //Hay que hacer un cast a entero para que no de más ceros de los necesarios.
        }
    } else {
        while($auxDecimal>=$base) {
            $resto= $auxDecimal%$base;
            $resultado= $resto.$resultado;
            $auxDecimal= ((integer)$auxDecimal/$base); //Hay que hacer un cast a entero para que no de más ceros de los necesarios.
        }
    }
	
	$resultado= ((integer)$auxDecimal).$resultado; //le hago un cast al mostrarlo porque en algunos casos dará decimal el cociente, y no valdrá.
	
	echo "-Ejercicio 2 de bucles-<br><br>";
	echo "El número $decimal en base $base es: $resultado<br>";
?>