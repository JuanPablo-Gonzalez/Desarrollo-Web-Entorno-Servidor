<?php
$arrImpares= array();
$impares= 1;
$arrPosicionImpares= array();
$arrPosicionPares= array();
$sumaPosicionesPares= 0;
$sumaPosicionesImpares= 0;

//metemos los números impares en un array.
for($i=0;$i<20;$i++) { //de 0 a 19 hay 20 impareses.
    $arrImpares[$i]= $impares;
    $suma= $i+$arrImpares[$i];

    /*
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>"."índice"."</th>";
    echo "<th>"."valor"."</th>";
    echo "<th>"."media"."</th>";
    echo "</tr>";
	echo "<tr>";
	echo "<td>". $i ."</td>";
    echo "<td>". $arrImpares[$i] ."</td>";
    echo "<td>". $suma."</td>";
	echo "</tr>";
	echo "</table>";
    */

    $impares+=2;
}

//ahora recogeremos los valores de las posiciones pares en un array,
//y los de las impares en otra.
for($i=0;$i<count($arrImpares);$i++) {
    if($i%2==0||$i==0) {
        $arrPosicionPares[$i]= $arrImpares[$i];
    } else {
        $arrPosicionPares[$i]= 0; //metemos un cero para rellenar. no influirá en la media.
    }
    $sumaPosicionesPares= $sumaPosicionesPares+$arrPosicionPares[$i];
}

for($i=0;$i<count($arrImpares);$i++) {
    if($i%2!=0) {
        $arrPosicionImpares[$i]= $arrImpares[$i];
    } else {
        $arrPosicionImpares[$i]= 0;
    }
    $sumaPosicionesImpares= $sumaPosicionesImpares+$arrPosicionImpares[$i];
}

echo "Media de las posiciones pares: $sumaPosicionesPares/2= ".$sumaPosicionesPares/2;
echo "<br>";
echo "Media de las posiciones impares: . $sumaPosicionesImpares/2= ".$sumaPosicionesImpares/2 ;

/*
//muestra el array de las posiciones pares.
for($i=0;$i<count($arrPosicionPares);$i++) {
    echo $arrPosicionPares[$i]." - ";

}

echo "<br>";

//muestra el array de las posiciones pares.
for($i=0;$i<count($arrPosicionImpares);$i++) {
    echo $arrPosicionImpares[$i]." - ";
}
*/ 
?>
