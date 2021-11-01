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

    function rellenarVariable(&$variable, $longitud) {
        //substr($variable,1,$longitud);
        $variable= str_pad($variable, $longitud, " ");
        
        return $variable;
    }

    function crearFichero($nombre,$apellido1,$apellido2,$fechaNac,$localidad) {
        //El parámetro "a" significa se abrirá el archivo para escritura y cualquier texto 
        //nuevo añadido al final de la misma. Escribir nuevos datos:
        $fichero1= fopen("c:/wamp64/www/files/fichero1.txt", "a") or die("No se puede abrir");
        
        rellenarVariable($nombre,40);
        rellenarVariable($apellido1,40);
        rellenarVariable($apellido2,41);
        rellenarVariable($fechaNac,10);
        rellenarVariable($localidad,26);
        
        $alumno= $nombre.$apellido1.$apellido2.$fechaNac.$localidad;
        fwrite($fichero1, "$alumno\n"); //para que salte de línea al meter al siguiente alumno.

        fclose($fichero1);

        echo "Los datos del alumno se han incluido en el fichero.";
    }

    /* hacerla
    function validarFecha() {

    }*/


    //función que comprueba que la longitud del parámetro es correcta, le pone los espacios y la incluye.
    /* LA HICE PRIMERAMENTE ASÍ PERO LUEGO LO HICE CON STR_PAD Y SUB_STR.
    function comprobarRellenarFichero($variable,$fichero,$longitudMaxima) {

        //si se pasa de la longitud marcada no se mostrará, mejor hacer que se corte.
        if(strlen($variable)>0&&strlen($variable)<$longitudMaxima) {
            while(strlen($variable)<$longitudMaxima-1) {
                $variable= $variable." ";
            }
            fwrite($fichero, $variable);
        } else {
            fwrite("Nombre incorrecto");
        }
    }

    function crearFichero($nombre,$apellido1,$apellido2,$fechaNac,$localidad) {
        $fichero1= fopen("c:/wamp64/www/files/fichero1.txt", "w") or die("No se puede abrir");
            comprobarRellenarFichero($nombre,$fichero1,41);
            comprobarRellenarFichero($apellido1,$fichero1,41);
            comprobarRellenarFichero($apellido2,$fichero1,42);
            comprobarRellenarFichero($fechaNac,$fichero1,11);
            comprobarRellenarFichero($localidad,$fichero1,27);

            /*$contenidoFichero1= fread($fichero1, filesize("c:/wamp64/www/files/fichero1.txt"));
        fclose($fichero1);

        echo "Los datos del alumno se han incluido en el fichero.";
    }*/



    //este lo hacía bien, pero preferí hacerlo de la forma siguiente, para el salto de línea...
    /*
    function rellenarVariable($variable, $fichero, $longitud) {
        //substr($variable,1,$longitud);
        $variable= str_pad($variable, $longitud, " ");
        fwrite($fichero, $variable);
    }

    function crearFichero($nombre,$apellido1,$apellido2,$fechaNac,$localidad) {
        //El parámetro "a" significa se abrirá el archivo para escritura y cualquier texto 
        //nuevo añadido al final de la misma. Escribir nuevos datos:
        $fichero1= fopen("c:/wamp64/www/files/fichero1.txt", "a") or die("No se puede abrir");
        
        rellenarVariable($nombre,$fichero1,40);
        rellenarVariable($apellido1,$fichero1,40);
        rellenarVariable($apellido2,$fichero1,41);
        rellenarVariable($fechaNac,$fichero1,10);
        rellenarVariable($localidad,$fichero1,26);
            
        fclose($fichero1);

        echo "Los datos del alumno se han incluido en el fichero.";
    }*/
?>