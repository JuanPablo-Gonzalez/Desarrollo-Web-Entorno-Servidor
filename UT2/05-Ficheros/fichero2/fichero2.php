<?php

    require 'funciones_fichero2.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre= limpiar($_POST["nombre"]);
        $apellido1= limpiar($_POST["apellido1"]);
        $apellido2= limpiar($_POST["apellido2"]);
        $fechaNac= limpiar($_POST["nacimiento"]);
        $localidad= limpiar($_POST["localidad"]);
    }
    
    comprobarVariableVacia($nombre);
    comprobarVariableVacia($apellido1);
    comprobarVariableVacia($apellido2);
    comprobarVariableVacia($fechaNac);
    comprobarVariableVacia($localidad);

    crearFichero($nombre,$apellido1,$apellido2,$fechaNac,$localidad);

?>