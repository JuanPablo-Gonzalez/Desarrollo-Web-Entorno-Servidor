<?php 

$matriz= array();
$maximosFilas= array();
$promediosFilas= array();
$max= 0;
$min= 0;
$suma= 0;

//RELLENAMOS LA MATRIZ CON LOS MÚLTIPLOS DE 2.
for($i=0;$i<3;$i++) { //de 0 a 2 hay 3 posiciones.
    for($j=0;$j<3;$j++) {
        $matriz[$i][$j]= random_int(1,30);
    }
}

//mostrar columnas.
for($i=0;$i<3;$i++) {
    for($j=0;$j<3;$j++) {
        echo $matriz[$i][$j]."-";
    }
    echo "<br>";
}

echo "<br>";

//recoger valores máximos de las filas.
for($i=0;$i<3;$i++) {
    for($j=0;$j<3;$j++) {
        if($matriz[$i][$j]>$max) {
            $max= $matriz[$i][$j];
        }
    }
    $maximosFilas[$i]= $max;
    $max= 0;
}

for($i=0;$i<3;$i++) {
    echo "máximo fila $i= $maximosFilas[$i]";
    echo "<br>";
}
// fin recoger valores máximos.

echo "<br>";

//Promedios de las filas.
for($i=0;$i<3;$i++) {
    for($j=0;$j<3;$j++) {
         $suma= $suma+$matriz[$i][$j];
    }
    $promedioFilas[$i]= $suma/2;
    $suma= 0;
}

for($i=0;$i<3;$i++) {
    echo "promedio fila $i= $promedioFilas[$i]";
    echo "<br>";
}
//fin promedios.

/*
//MOSTRAMOS LA MATRIZ EN UNA TABLA.
echo "<table border='1'>";
for($i=0;$i<3;$i++) {
    echo "<tr>"; //la fila debe crearse aquí.
    for($j=0;$j<3;$j++) {
	    echo "<td>". $matriz[$i][$j] ."</td>";
    }
    echo "</tr>";
}
echo "</table>";*/
?>