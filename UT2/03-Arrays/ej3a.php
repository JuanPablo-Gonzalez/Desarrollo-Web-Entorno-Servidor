<?php
$arrBinarios= array();

echo "<table border='1'>";
echo "<tr>";
echo "<th>"."índice"."</th>";
echo "<th>"."valor"."</th>";
echo "</tr>";

for($i=0;$i<21;$i++) {
    $arrBinarios[$i]= decbin($i);

	echo "<tr>";
	echo "<td>". $i ."</td>";
    echo "<td>". $arrBinarios[$i] ."</td>";
	echo "</tr>";
}

echo "</table>";
?>