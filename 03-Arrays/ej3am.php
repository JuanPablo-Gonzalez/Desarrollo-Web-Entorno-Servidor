<?php 

$matriz= array();
$numero= 1;

for($i=0;$i<3;$i++) {
    for($j=0;$j<5;$j++) {
        $matriz[$i][$j]= $numero." - ";
        $numero++;
    }
}

//mostrar filas.
for($i=0;$i<3;$i++) {
    echo "Fila $i: ";
    for($j=0;$j<5;$j++) {
	    echo $matriz[$i][$j];
    }
    echo "<br>";
}

echo "<br>";

//mostrar columnas.
for($i=0;$i<5;$i++) {
    echo "Columna $i: ";
    for($j=0;$j<3;$j++) {
        echo $matriz[$j][$i];
    }
    echo "<br>";
}
?>