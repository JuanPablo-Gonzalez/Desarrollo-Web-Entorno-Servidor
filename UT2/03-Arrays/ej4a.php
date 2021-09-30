<?php
$arrBinarios= array();

for($i=0;$i<21;$i++) {
    $arrBinarios[$i]= decbin($i);
}

$arrBinariosInvertido= array_reverse($arrBinarios);
$posicionReves= 20;

for($i=0;$i<count($arrBinariosInvertido);$i++) {
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>"."índice"."</th>";
    echo "<th>"."valor"."</th>";
    echo "</tr>";
	echo "<tr>";
	echo "<td>". $posicionReves ."</td>";
    echo "<td>". $arrBinariosInvertido[$i] ."</td>";
	echo "</tr>";
	echo "</table>";

    $posicionReves--;
}

?>