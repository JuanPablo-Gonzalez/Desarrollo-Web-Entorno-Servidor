<?php

/*Juan Pablo González*/

    require 'funciones_binario.php';

    //var_dump($_POST);

    echo "<h1>"."CONVERSOR NUMÉRICO"."</h1>";

    $decimal= $_POST["decimal"];
    convertir($decimal);
?>