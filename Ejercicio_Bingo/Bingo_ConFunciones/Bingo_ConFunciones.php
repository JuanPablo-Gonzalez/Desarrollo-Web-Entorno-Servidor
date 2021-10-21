<?php
/*Juan Pablo González*/

/*
Lo hice de esta forma para probar a hacerlo sin array_diff.
El resultado es el mismo pero me parecía más sencillo entenderlo
como si se fuesen tachando los números que iban apareciendo.
*/

include 'Funciones_Bingo.php';

//LO HE PENSADO COMO SI CADA JUGADOR TUVIESE 3 ARRAYS, QUE SERÁN SUS CARTONES. 
$jugador1= array(
    "carton1"=> array(),
    "carton2"=> array(),
    "carton3"=> array()
);
$jugador2= array(
    "carton1"=> array(),
    "carton2"=> array(),
    "carton3"=> array()
);
$jugador3= array(
    "carton1"=> array(),
    "carton2"=> array(),
    "carton3"=> array()
);
$jugador4= array(
    "carton1"=> array(),
    "carton2"=> array(),
    "carton3"=> array()
);

//RELLENAMOS LOS CARTONES.
rellenarCarton($jugador1);
rellenarCarton($jugador2);
rellenarCarton($jugador3);
rellenarCarton($jugador4);

//MOSTRAMOS LOS CARTONES YA LLENOS.
echo "<h3>MOSTRAMOS LOS CARTONES LLENOS</h3>";
echo "CARTONES DEL JUGADOR 1"."<br>";
mostrarCarton($jugador1);
echo "CARTONES DEL JUGADOR 2"."<br>";
mostrarCarton($jugador2);
echo "CARTONES DEL JUGADOR 3"."<br>";
mostrarCarton($jugador3);
echo "CARTONES DEL JUGADOR 4"."<br>";
mostrarCarton($jugador4);

echo "<br>";

//EMPIEZA A JUGAR.
jugar($jugador1,$jugador2,$jugador3,$jugador4);
?>