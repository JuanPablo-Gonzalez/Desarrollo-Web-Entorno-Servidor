<?php
$arrBinarios= array();

for($i=0;$i<21;$i++) {
    $arrBinarios[$i]= decbin($i);
}

$arrBinariosInvertido= array_reverse($arrBinarios); //DAMOS LA VUELTA AL ARRAY.
$posicionReves= 20; //SERVIRÁ PARA CONTROLAR LA POSICIÓN QUE APARECERÁ EN LA TABLA.

echo "<table border='1'>";
echo "<tr>";
echo "<th>"."índice"."</th>";
echo "<th>"."valor"."</th>";

for($i=0;$i<count($arrBinariosInvertido);$i++) {
	echo "<tr>";
	echo "<td>". $posicionReves ."</td>";
    echo "<td>". $arrBinariosInvertido[$i] ."</td>";
	echo "</tr>";

    $posicionReves--;
}

echo "</table>";
?>