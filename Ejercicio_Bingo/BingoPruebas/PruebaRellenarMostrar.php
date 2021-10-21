<?php
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

function rellenarCarton(&$arr) {
	for($i=1;$i<4;$i++) {
		$contNumeros=0; //lo pongo aquí para que se reinicie al cambiar de cartón.
		while($contNumeros<15) { //el for hace que se aumente la posición aunque no halla, POR ESO USAR WHILE.
			$numAleatorio= random_int(1,60);
			if(!(in_array($numAleatorio,$arr["carton$i"]))) { //si no está en el cartón correspondiente entonces se mete.
				$arr["carton$i"][$contNumeros]= $numAleatorio;
				$contNumeros++;
			}
		}
	}
}

rellenarCarton($jugador1);
rellenarCarton($jugador2);
rellenarCarton($jugador3);
rellenarCarton($jugador4);

function mostrarCarton(&$arr) {
	for($i=1;$i<4;$i++) {
		$contNumeros=0;
		echo "<table border=1>";
		echo "<tr>";
		echo "carton $i:";
		while($contNumeros<15) {
			echo "<td>".$arr["carton$i"][$contNumeros]."</td>";
			$contNumeros++;
		}
		echo "</tr>";
		echo "</table>";
		echo "<br>";
	}
}

echo "CARTONES DEL JUGADOR 1"."<br>";
mostrarCarton($jugador1);
echo "CARTONES DEL JUGADOR 2"."<br>";
mostrarCarton($jugador2);
echo "CARTONES DEL JUGADOR 3"."<br>";
mostrarCarton($jugador3);
echo "CARTONES DEL JUGADOR 4"."<br>";
mostrarCarton($jugador4);

//var_dump($jugador1);

/*Estaba poniendo un for al colocar los números, pero estaba mal porque el for siempre
avanzaba la posición, y la posición solo debe avanzar cuando no esté el número. 
Por eso con el while sale bien, porque hago que la variable contNumeros solo aumente
cuando el número no esté en el el array correspondiente*/
?>