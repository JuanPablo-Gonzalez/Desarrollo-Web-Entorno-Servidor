<?php

    function limpiar($variable) {
        $variable = trim($variable);
        $variable = stripslashes($variable);
        $variable = htmlspecialchars($variable);

        return $variable;
    }

    function calcular($num1,$num2,$operacionElegida) {
        $resultado= 0;

        if($operacionElegida=="suma") {
            $simboloOperacion= "+";
            $resultado= $num1+$num2;
        }
        else if($operacionElegida=="resta") {
            $simboloOperacion= "-";
            $resultado= $num1-$num2;
        }
        else if($operacionElegida=="producto") {
            $simboloOperacion= "*";
            $resultado= $num1*$num2;
        }
        else if($operacionElegida=="division"){
            $simboloOperacion= "/";
            $resultado= $num1/$num2;
        }
            
        echo "Resultado operación: $num1 $simboloOperacion $num2 = $resultado";
    }
?>