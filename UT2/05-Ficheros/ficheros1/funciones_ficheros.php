<?php
    //función que comprueba que la longitud del parámetro es correcta, le pone los espacios y la incluye.
    function comprobarRellenarFichero($variable,$fichero,$longitudMaxima) {
        //si se pasa de la longitud marcada no se mostrará, mejor hacer que se corte.
        if(strlen($variable)>0&&strlen($variable)<$longitudMaxima) {
            while(strlen($variable)<$longitudMaxima-1) {
                $variable= $variable." ";
            }
            fwrite($fichero, $variable);
        }
    }

    function crearFichero($nombre,$apellido1,$apellido2,$fechaNac,$localidad) {
        $fichero1= fopen("c:/wamp64/www/files/fichero1.txt", "w") or die("No se puede abrir");
            comprobarRellenarFichero($nombre,$fichero1,41);
            comprobarRellenarFichero($apellido1,$fichero1,41);
            comprobarRellenarFichero($apellido2,$fichero1,42);
            comprobarRellenarFichero($fechaNac,$fichero1,11);
            comprobarRellenarFichero($localidad,$fichero1,27);
        fclose($fichero1);
    }

?>