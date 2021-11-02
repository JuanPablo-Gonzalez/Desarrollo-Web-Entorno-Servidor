<?php

    require "funciones_fichero6.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fichero= limpiar($_POST["fichero"]);
    }

    //si la variable está vacía, no se ejecutará la función.
    if(!comprobarVariableVacia($fichero)) {
        mostrarDatosFichero($fichero);
    }


?>