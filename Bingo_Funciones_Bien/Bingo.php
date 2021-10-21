<?php
/*Juan Pablo González*/

/*
Usé el array_diff para comprobar el ganador. Esta forma funcionaba, 
pero en cuanto a lógica me gustaba más la siguiente que hice sin 
usar array_diff, porque estaba más acorde con la lógica del bingo 
(ir tachando cada vez que se encuentra el número).
*/

include 'funciones_bingo_intento2.php';

$jugadores= array();

//RELLENAMOS LOS CARTONES.
rellenarCarton($jugadores);

//var_dump($jugadores);

mostrarTodosCartones($jugadores);

echo "<h3>MOSTRAMOS EL GANADOR O GANADORES</h3>";
jugar($jugadores);


//MOSTRAMOS LOS NÚMEROS QUE HAN SALIDO DEL BOMBO.
//echo "<h3>NÚMEROS QUE HAN SALIDO DEL BOMBO</h3>";


?>