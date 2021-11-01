<?php
    /*Juan Pablo González*/
    include 'funciones_basen.php';

    //var_dump($_POST);

    echo "<h1>"."CAMBIO BASE"."</h1>";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = test_input($_POST["operando1"]);
        $base = test_input($_POST["operando2"]);
    }
        
    calcular($num1,$num2,$operacionElegida);
?>