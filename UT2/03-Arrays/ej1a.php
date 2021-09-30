<?php
$arrImpares= array();
$impares= 1;
$suma= 0;

for($i=0;$i<20;$i++) { //de 0 a 19 hay 20 impareses.
    $arrImpares[$i]= $impares;
    $suma= $i+$arrImpares[$i];

    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>"."índice"."</th>";
    echo "<th>"."valor"."</th>";
    echo "<th>"."suma"."</th>";
    echo "</tr>";
	echo "<tr>";
	echo "<td>". $i ."</td>";
    echo "<td>". $arrImpares[$i] ."</td>";
    echo "<td>". $suma."</td>";
	echo "</tr>";
	echo "</table>";

    $impares+=2;
}
/*
 para mostrar el array.
for($i=0;$i<count($arrImpares);$i++) {
    echo $arrImpares[$i]." - ";
}
*/
?>