<?php
    function limpiar($variable) {
        $variable = trim($variable);
        $variable = stripslashes($variable);
        $variable = htmlspecialchars($variable);

        return $variable;
    }

    function comprobarVariableVacia($variable) {
        $vacio= false;

        if (empty($variable)) {
            echo 'ERROR, la variable'.$variable.' está vacía.'.'<br>';
            $vacio= true;
        }

        return $vacio;
    }

    function mostrarDatosFichero($ficheroElegido) {

        $fichero= fopen($ficheroElegido, "r");

        //con basename($rutadelfichero) obtenemos el nombre del fichero.
        echo "<b>Nombre del fichero:</b> ".basename($ficheroElegido)."<br>";
        //con dirname($rutadelfichero) obtenemos la ruta del fichero (relativas y absolutas).
        echo "<b>Directorio:</b> ".dirname($ficheroElegido)."<br>";
        //con filemtime($rutadelfichero) obtenemos la hora de última modificación del fichero. 
        echo "<b>Tamano del fichero:</b> ".filesize($ficheroElegido)." bytes <br>";
        //usamos filemtime junto con el objeto date para mostrar la fecha y hora de última moficiación del fichero.
        //Elegimos el formato con las distintas letras del objeto date();
        echo "<b>Fecha ultima modificacion fichero:</b> ".date("d/m/Y  H:i:s.", filemtime($ficheroElegido));

        fclose($fichero);
    }
?>