<?php
/*Juan Pablo González*/

/*
Usé el array_diff para comprobar el ganador. Esta forma funcionaba, 
pero en cuanto a lógica me gustaba más la siguiente que hice sin 
usar array_diff, porque estaba más acorde con la lógica del bingo 
(ir tachando cada vez que se encuentra el número).
*/

include 'funciones_bingo_intento2.php';

$jugador1= array();
$jugador2= array();
$jugador3= array();
$jugador4= array();

//RELLENAMOS LOS CARTONES.
rellenarCarton($jugador1);
rellenarCarton($jugador2);
rellenarCarton($jugador3);
rellenarCarton($jugador4);

echo "<h3>MOSTRAMOS LOS CARTONES</h3>";
echo "CARTONES DEL JUGADOR 1"."<br>";
mostrarTodosCartones($jugador1);
echo "CARTONES DEL JUGADOR 2"."<br>";
mostrarTodosCartones($jugador2);
echo "CARTONES DEL JUGADOR 3"."<br>";
mostrarTodosCartones($jugador3);
echo "CARTONES DEL JUGADOR 4"."<br>";
mostrarTodosCartones($jugador4);

echo "<h3>MOSTRAMOS EL GANADOR O GANADORES</h3>";
jugar($jugador1,$jugador2,$jugador3,$jugador4);


//MOSTRAMOS LOS NÚMEROS QUE HAN SALIDO DEL BOMBO.
//echo "<h3>NÚMEROS QUE HAN SALIDO DEL BOMBO</h3>";


?>