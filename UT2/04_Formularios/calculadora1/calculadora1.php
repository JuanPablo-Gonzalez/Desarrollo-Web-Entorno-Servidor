<?php
    /*Juan Pablo González*/

    //var_dump($_POST);

    echo "<h1>"."CALCULADORA"."</h1>";

    $num1= $_POST["operando1"];
    $num2= $_POST["operando2"];
    $operacionElegida= $_POST["operacion"];

    function calcular1() {
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
        else if($operacionElegida=="division") {
            $simboloOperacion= "/";
            $resultado= $num1/$num2;
        }
        
        echo "<input type='text' name='Operando1'>";
        echo "Resultado operación: $num1 $simboloOperacion $num2 = $resultado";
    }
?>