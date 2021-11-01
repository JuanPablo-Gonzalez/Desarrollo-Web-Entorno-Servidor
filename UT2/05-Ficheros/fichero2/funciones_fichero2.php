<?php
    function limpiar($variable) {
        $variable = trim($variable);
        $variable = stripslashes($variable);
        $variable = htmlspecialchars($variable);

        return $variable;
    }

    function comprobarVariableVacia($variable) {
        if (empty($variable)) {
            echo 'ERRROR, la variable'.$variable.' está vacía.'.'<br>';
        } /*else {
            echo 'La variable NO está vacía, su contenido es: '.$variable.'<br>';
        }*/
    }

    function crearFichero($nombre,$apellido1,$apellido2,$fechaNac,$localidad) {
        //El parámetro "a" significa se abrirá el archivo para escritura y cualquier texto 
        //nuevo añadido al final de la misma. Escribir nuevos datos:
        $fichero2= fopen("c:/wamp64/www/files/fichero2.txt", "a") or die("No se puede abrir");
        
        $alumno= "$nombre##$apellido1##$apellido2##$fechaNac##$localidad";
        fwrite($fichero2, "$alumno\n"); //para que salte de línea al meter al siguiente alumno.

        fclose($fichero2);

        echo "Los datos del alumno se han incluido en el fichero.";
    }
?>