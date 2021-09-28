<?php
$numero= "4";
$factorial= $numero; //variable para hacer las operaciones.

for($i=$numero-1; $i>=1; $i--) {
	$factorial= $factorial*$i;
}

echo "EL factorial es de $numero es: $factorial";
?>

