<?php
    function limpiar($variable) {
        $variable = trim($variable);
        $variable = stripslashes($variable);
        $variable = htmlspecialchars($variable);

        return $variable;
    }

    function comprobarVariableVacia($variable) {
        if (empty($variable))
            echo 'ERRROR, la variable'.$variable.' está vacía.'.'<br>';
    }

    function mostrarFichero($fichero) {
        $fichero1= fopen($fichero, "r");

        while (!feof($fichero1)){
            $linea= fgets($fichero1);
            echo $linea."<br>";
        }
        fclose($fichero1);
    }

    function mostrarLinea($fichero,$lineaElegida) {
        $fichero1= fopen($fichero, "r");
        $contLinea= 1;

        while (!feof($fichero1)) {
            $linea= fgets($fichero1);

            //hacemos que pasen las líneas, y cuando la línea elegida sea igual a la línea 
            //en a la que ha llegado, se muestra esa línea.
            if($lineaElegida==$contLinea)
                echo $linea."<br>";
           
            $contLinea++;
        }
        fclose($fichero1);
    }

    function mostrarPrimerasLineas($fichero,$lineaLimite) {
        $fichero1= fopen($fichero, "r");
        $contLinea= 1;

        //Mientras el contador sea menor a la línea límite elegida, se mostrarán.
        while ($contLinea<=$lineaLimite) {
            $linea= fgets($fichero1);
            echo $linea."<br>";
           
            $contLinea++;
        }
        fclose($fichero1);
    }
?>