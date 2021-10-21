<?php

    /*Juan Pablo González*/

    require 'funciones_cambioBase.php';

    //var_dump($_POST);

    echo "<h1>"."CONVERSOR NUMÉRICO"."</h1>";

    $decimal= $_POST["decimal"];
    $operacionElegida= $_POST["operacion"];
    
    if($operacionElegida=="binario")
        convertirBinario($decimal);
    else if($operacionElegida=="hexadecimal") 
        convertirHexadecimal($decimal);
    else if($operacionElegida=="octal")
        convertirOctal($decimal);
?>