<?php
$arrImpares= array();
$impares= 1;
$arrPosicionImpares= array();
$arrPosicionPares= array();
$sumaPosicionesPares;
$sumaPosicionesImpares;

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

/* Si la posición es par, el valor de esa posición se guardará en el array de posiciones pares,
si no es par en la de impares. Hice que se rellenasen con 0 para que todas las posiciones
estuviesen llenas y me funcionase la suma como la había hecho primeramente. Pero luego
usando la función array_sum() la suma se hacía bien aunque no todas las posiciones estuviesen llenas.*/
for($i=0;$i<count($arrImpares);$i++) {
    if($i%2==0) {
        $arrPosicionPares[$i]= $arrImpares[$i];
		$arrPosicionImpares[$i]= 0;
    } else {
        $arrPosicionPares[$i]= 0;
		$arrPosicionImpares[$i]= $arrImpares[$i];
    }
	//AL PRINCIPIO HICE LA SUMA ASÍ, PERO LUEGO LO HICE CON LA FUNCIÓN ARRAY_SUM().
    //$sumaPosicionesPares= $sumaPosicionesPares+$arrPosicionPares[$i];
	//$sumaPosicionesImpares= $sumaPosicionesImpares+$arrPosicionImpares[$i];
}

/* 
AL PRINCPIO HICE DOS FOR, UNO PARA CREAR EL ARRAY DE PARES Y OTRO CON EL DE IMPARES,
PERO CON UN SOLO FOR SE PODÍAN HACER LOS DOS ARRAY A LA VEZ.

for($i=0;$i<count($arrImpares);$i++) {
    if($i%2!=0) {
        $arrPosicionImpares[$i]= $arrImpares[$i];
    } else {
        $arrPosicionImpares[$i]= 0;
    }
    $sumaPosicionesImpares= $sumaPosicionesImpares+$arrPosicionImpares[$i];
} 
*/

$sumaPosicionesPares= array_sum($arrPosicionPares);
$sumaPosicionesImpares= array_sum($arrPosicionImpares);

echo "Media de las posiciones pares: $sumaPosicionesPares/2= ".$sumaPosicionesPares/2;
echo "<br>";
echo "Media de las posiciones impares: $sumaPosicionesImpares/2= ".$sumaPosicionesImpares/2; 
?>
