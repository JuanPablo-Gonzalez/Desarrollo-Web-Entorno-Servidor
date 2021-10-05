<?php 

$matriz= array();
$multiplosDos= 2;
$sumaFilas= array();
$valorSumaFilas= 0;
$sumaColumnas= array();
$valorSumaColumnas= 0;

//RELLENAMOS LA MATRIZ CON LOS MÚLTIPLOS DE 2.
for($i=0;$i<3;$i++) {
    for($j=0;$j<3;$j++) {
        $matriz[$i][$j]= $multiplosDos;
        $multiplosDos+=2;
    }
}

//MOSTRAMOS LA MATRIZ EN UNA TABLA.
echo "<table border='1'>";
for($i=0;$i<3;$i++) {
    echo "<tr>";
    for($j=0;$j<3;$j++) {
	    echo "<td>". $matriz[$i][$j] ."</td>";
        //APROVECHAMOS EL FOR PARA IR HACIENDO LA SUMA.
        $valorSumaFilas= $valorSumaFilas+$matriz[$i][$j];
        $valorSumaColumnas= $valorSumaColumnas+$matriz[$j][$i];
    }
    echo "</tr>";
    $sumaFilas[$i]= $valorSumaFilas;
    $valorSumaFilas= 0;
    $sumaColumnas[$i]= $valorSumaColumnas;
    $valorSumaColumnas= 0;
}
echo "</table>";

//MOSTRAMOS LAS SUMAS DE LAS FILAS EN UNA TABLA.
echo "<br> Suma de las filas:";
echo "<table border='1'>";
for($i=0;$i<3;$i++) {
    echo "<tr>";
    echo "<td>".$sumaFilas[$i]."</td>";
    echo "</tr>";
}
echo "</table>";

//MOSTRAMOS LAS SUMAS DE LAS COLUMNAS EN UNA TABLA.
echo "<br> Suma de las columnas:";
echo "<table border='1'>";
echo "<tr>";
for($i=0;$i<3;$i++) {
    echo "<td>".$sumaColumnas[$i]."</td>";
}
echo "</tr>";
echo "</table>";

/* PROBAR CON ESTO.
array_column()	
Returns the values from a single column in the input array
*/
?>