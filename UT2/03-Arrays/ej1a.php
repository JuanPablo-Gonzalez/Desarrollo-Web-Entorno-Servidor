<?php
$arrImpares= array();
$impares= 1;
$suma= 0;

echo "<table border='1'>";
echo "<tr>";
echo "<th>"."índice"."</th>";
echo "<th>"."valor"."</th>";
echo "<th>"."suma"."</th>";
echo "</tr>";

for($i=0;$i<20;$i++) { //de 0 a 19 hay 20 impares.
    $arrImpares[$i]= $impares;
    $suma= $i+$arrImpares[$i];

	echo "<tr>";
	echo "<td>". $i ."</td>";
	echo "<td>". $arrImpares[$i] ."</td>";
	echo "<td>". $suma."</td>";
	echo "</tr>";
	
    $impares+=2;
}

echo "</table>";
?>