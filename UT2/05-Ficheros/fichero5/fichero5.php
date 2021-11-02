<?php

    require "funciones_fichero5.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fichero= limpiar($_POST["fichero"]);
        $operacion= limpiar($_POST["operacion"]);
        $linea= limpiar($_POST["linea"]);
        $lineas= limpiar($_POST["lineas"]);
    }

    if($operacion=="mostrarFichero")
        mostrarFichero($fichero);
    else if($operacion=="mostrarLinea") 
        mostrarLinea($fichero,$linea);
    else if($operacion=="mostrarPrimerasLineas") 
        mostrarPrimerasLineas($fichero,$lineas);

?>