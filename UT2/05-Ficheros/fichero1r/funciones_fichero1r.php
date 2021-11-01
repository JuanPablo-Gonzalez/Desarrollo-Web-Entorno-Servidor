<?php
    /*Juan Pablo González*/

    $nombreFichero1= "c:/wamp64/www/files/fichero1.txt";
    $fichero1= fopen($nombreFichero1, "r");
    $contFilasFichero= 0;

    echo "<table border=1>";
    while(!feof($fichero1)) {
        //recogemos la línea en una variable.
        $linea= fgets($fichero1);

        //a partir de la posición 0, cogemos 40 caracteres.
        $nombre= substr($linea,0,40);
        $apellido1= substr($linea,40,40);
        $apellido2= substr($linea,80,40);
        $fecha= substr($linea,120,11);
        $localidad= substr($linea,131,30);
        echo "<tr>";
        echo "<td>".$nombre."</td>";
        echo "<td>".$apellido1."</td>";
        echo "<td>".$apellido2."</td>";
        echo "<td>".$fecha."</td>";
        echo "<td>".$localidad."</td>";
        echo "</tr>";
        $contFilasFichero++;
    }
    echo "</table>";

    fclose($fichero1);

    echo "El achivo tiene $contFilasFichero filas";
?>