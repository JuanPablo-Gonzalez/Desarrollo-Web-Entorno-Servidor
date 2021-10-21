<?php
    /*Juan Pablo González*/
    include 'funcion_calcular.php';

    //var_dump($_POST);

    echo "<h1>"."CALCULADORA"."</h1>";

    $num1= $_POST["operando1"];
    $num2= $_POST["operando2"];
    $operacionElegida= $_POST["operacion"];

    calcular($num1,$num2,$operacionElegida);
?>