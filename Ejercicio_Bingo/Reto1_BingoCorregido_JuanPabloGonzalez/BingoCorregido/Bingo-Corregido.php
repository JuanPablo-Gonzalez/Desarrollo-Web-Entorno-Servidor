<?php
/*Juan Pablo González*/

require 'funciones_BingoCorregido.php';

//VARIABLES DE LOS JUGADORES, QUE INCLUIRÁN LOS CARTONES.
$jugador1= array();
$jugador2= array();
$jugador3= array();
$jugador4= array();

/*LLAMAMOS A LA FUNCIÓN RELLENARCARTON(), 
QUE CREARÁ LOS CARTONES Y LOS RELLENARÁ.*/
rellenarCarton($jugador1);
rellenarCarton($jugador2);
rellenarCarton($jugador3);
rellenarCarton($jugador4);

//MOSTRAMOS TODOS LOS CARTONES DE CADA JUGADOR.
echo "<h3>MOSTRAMOS LOS CARTONES</h3>";
echo "CARTONES DEL JUGADOR 1"."<br>";
mostrarTodosCartones($jugador1);
echo "CARTONES DEL JUGADOR 2"."<br>";
mostrarTodosCartones($jugador2);
echo "CARTONES DEL JUGADOR 3"."<br>";
mostrarTodosCartones($jugador3);
echo "CARTONES DEL JUGADOR 4"."<br>";
mostrarTodosCartones($jugador4);

//LLAMAMOS A LA FUNCIÓN JUGAR(), QUE DECIDIRÁ EL GANADOR.
echo "<h3>MOSTRAMOS EL GANADOR O GANADORES</h3>";
jugar($jugador1,$jugador2,$jugador3,$jugador4);
?>