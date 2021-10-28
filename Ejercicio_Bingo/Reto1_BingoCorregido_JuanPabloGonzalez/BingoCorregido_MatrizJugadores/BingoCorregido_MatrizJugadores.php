<?php
/*Juan Pablo González*/

require 'Funciones_BingoCorregido_MatrizJugadores.php';

/*VARIABLE QUE SERÁ UNA MATRIZ QUE INCLUIRÁ A LOS 4 JUGADORES, 
Y ESOS JUGADORES INCLUIRÁN SUS TRES CARTONES.*/
$jugadores= array();

/*CREAMOS A LOS JUGADORES, Y CREAMOS Y RELLENAMOS LOS CARTONES.*/
crearJugadoresCartones($jugadores);

//MOSTRAMOS TODOS LOS CARTONES DE TODOS LOS JUGADORES.
echo "<h3>MOSTRAMOS LOS CARTONES</h3>";
mostrarTodosCartones($jugadores);

//LLAMAMOS A LA FUNCIÓN JUGAR(), QUE DECIDIRÁ EL GANADOR.
echo "<h3>MOSTRAMOS EL GANADOR O GANADORES</h3>";
jugar($jugadores);
?>