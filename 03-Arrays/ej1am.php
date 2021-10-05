<?php 

$matriz= array();
$multiplosDos= 2;

//RELLENAMOS LA MATRIZ CON LOS MÚLTIPLOS DE 2.
for($i=0;$i<3;$i++) { //de 0 a 2 hay 3 posiciones.
    for($j=0;$j<3;$j++) {
        $matriz[$i][$j]= $multiplosDos;
        $multiplosDos+=2;
    }
}

//MOSTRAMOS LA MATRIZ EN UNA TABLA.
echo "<table border='1'>";
for($i=0;$i<3;$i++) {
    echo "<tr>"; //la fila debe crearse aquí.
    for($j=0;$j<3;$j++) {
	    echo "<td>". $matriz[$i][$j] ."</td>";
    }
    echo "</tr>";
}
echo "</table>";

?>