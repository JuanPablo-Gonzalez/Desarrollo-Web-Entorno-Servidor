<?php 

$matriz= array();

//RELLENAMOS LA MATRIZ CON LOS MÚLTIPLOS DE 2.
for($i=0;$i<5;$i++) { //de 0 a 2 hay 3 posiciones.
    for($j=0;$j<3;$j++) {
        $matriz[$i][$j]= $i+$j;
    }
}

//mostrar columnas.
for($i=0;$i<3;$i++) {
    echo "Columna $i--- ";
    for($j=0;$j<5;$j++) {
        echo $matriz[$j][$i];
    }
    echo "<br>";
}

/*
//MOSTRAMOS LA MATRIZ EN UNA TABLA.
echo "<table border='1'>";
for($i=0;$i<3;$i++) {
    echo "<tr>"; //la fila debe crearse aquí.
    for($j=0;$j<3;$j++) {
	    echo "<td>". $matriz[$i][$j] ."</td>";
    }
    echo "</tr>";
}
echo "</table>";*/

//si pide mostrar la matriz por columnas es como invirtiendo
//la matriz. Los valores de las columnas se ponen en horizontal, en orden.

?>