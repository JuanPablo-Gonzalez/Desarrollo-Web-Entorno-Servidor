<?php
    /*Juan Pablo González*/

    $nombreFichero2= "c:/wamp64/www/files/fichero2.txt";
    $fichero2= fopen($nombreFichero2, "r");
    $contFilasFichero= 0;

    echo "<table border=1>";
    while(!feof($fichero2)) {
        //recogemos la línea en una variable.
        $linea= fgets($fichero2);

        //separamos los distintos elementos en un array con explode.
        $datos= explode("##", $linea);
        
        echo "<tr>";
        echo "<td>".$datos[0]."</td>";
        echo "<td>".$datos[1]."</td>";
        echo "<td>".$datos[2]."</td>";
        echo "<td>".$datos[3]."</td>";
        echo "<td>".$datos[4]."</td>";
        echo "</tr>";
        $contFilasFichero++;
    }
    echo "</table>";

    fclose($fichero2);

    echo "El achivo tiene $contFilasFichero filas";
?>