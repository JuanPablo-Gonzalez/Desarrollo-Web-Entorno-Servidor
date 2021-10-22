<?php
/*Juan Pablo González*/

/*
Usé el array_diff para comprobar el ganador. Esta forma funcionaba, 
pero en cuanto a lógica me gustaba más la siguiente que hice sin 
usar array_diff, porque estaba más acorde con la lógica del bingo 
(ir tachando cada vez que se encuentra el número).
*/

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

function rellenarCarton(&$arr) {
	for($i=1;$i<4;$i++) {
		$contNumeros=0; //lo pongo aquí para que se reinicie al cambiar de cartón.
		while($contNumeros<15) {
			$numAleatorio= random_int(1,60);
			//si no está en el cartón correspondiente entonces se mete.
			if(!(in_array($numAleatorio,$arr["carton$i"]))) { 
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

echo "<h3>MOSTRAMOS LOS CARTONES LLENOS</h3>";
echo "CARTONES DEL JUGADOR 1"."<br>";
mostrarCarton($jugador1);
echo "CARTONES DEL JUGADOR 2"."<br>";
mostrarCarton($jugador2);
echo "CARTONES DEL JUGADOR 3"."<br>";
mostrarCarton($jugador3);
echo "CARTONES DEL JUGADOR 4"."<br>";
mostrarCarton($jugador4);

$numerosSacados= array();
$ganador= false;

echo "<h3>MOSTRAMOS EL GANADOR O GANADORES</h3>";
//COMPROBAMOS SI LOS NÚMEROS ALEATORIOS QUE VAN SALIENDO COINCIDEN CON LOS DEL CARTÓN
while(!$ganador) {
    $numAleatorio= random_int(1,60);
	if(!(in_array($numAleatorio,$numerosSacados))) {
		array_push($numerosSacados,$numAleatorio);
		//Si array_diff devuelve un array vacío es porque todos los valores están en el array (significa que ha ganado).
		if (array_diff($jugador1["carton1"], $numerosSacados)==array()) {
			/*Se pone ganador a true para poder salir del bucle.
			Luego se muestra el ganador y el cartón con el que ha ganado.
			También se muestran sus cartones para comprobar que
			el cartón ganador es correcto.*/
			$ganador= true;
			echo "Ha ganado el jugador 1 con el cartón 1"."<br>";
			mostrarCarton($jugador1);
		}
		if (array_diff($jugador1["carton2"], $numerosSacados)==array()) {
			$ganador= true;
			echo "Ha ganado el jugador 1 con el cartón 2"."<br>";
			mostrarCarton($jugador1);
		}
		if (array_diff($jugador1["carton3"], $numerosSacados)==array()) {
			$ganador= true;
			echo "Ha ganado el jugador 1 con el cartón 3"."<br>";
			mostrarCarton($jugador1);
		}
		if (array_diff($jugador2["carton1"], $numerosSacados)==array()) {
			$ganador= true;
			echo "Ha ganado el jugador 2 con el cartón 1"."<br>";
			mostrarCarton($jugador2);
		}
		if (array_diff($jugador2["carton2"], $numerosSacados)==array()) {
			$ganador= true;
			echo "Ha ganado el jugador 2 con el cartón 2"."<br>";
			mostrarCarton($jugador2);
		}
		if (array_diff($jugador2["carton3"], $numerosSacados)==array()) {
			$ganador= true;
			echo "Ha ganado el jugador 2 con el cartón 3"."<br>";
			mostrarCarton($jugador2);
		}
		if (array_diff($jugador3["carton1"], $numerosSacados)==array()) {
			$ganador= true;
			echo "Ha ganado el jugador 3 con el cartón 1"."<br>";
			mostrarCarton($jugador3);
		}
		if (array_diff($jugador3["carton2"], $numerosSacados)==array()) {
			$ganador= true;
			echo "Ha ganado el jugador 3 con el cartón 2"."<br>";
			mostrarCarton($jugador3);
		}
		if (array_diff($jugador3["carton3"], $numerosSacados)==array()) {
			$ganador= true;
			echo "Ha ganado el jugador 3 con el cartón 3"."<br>";
			mostrarCarton($jugador3);
		}
		if (array_diff($jugador4["carton1"], $numerosSacados)==array()) {
			$ganador= true;
			echo "Ha ganado el jugador 4 con el cartón 1"."<br>";
			mostrarCarton($jugador4);
		}
		if (array_diff($jugador4["carton2"], $numerosSacados)==array()) {
			$ganador= true;
			echo "Ha ganado el jugador 4 con el cartón 2"."<br>";
			mostrarCarton($jugador4);
		}
		if (array_diff($jugador4["carton3"], $numerosSacados)==array()) {
			$ganador= true;
			echo "Ha ganado el jugador 4 con el cartón 3"."<br>";
			mostrarCarton($jugador4);
		}
	}
}

//MOSTRAMOS LOS NÚMEROS QUE HAN SALIDO DEL BOMBO.
echo "<h3>NÚMEROS QUE HAN SALIDO DEL BOMBO</h3>";

for($i=0;$i<count($numerosSacados);$i++) {
	$imagenBola= $numerosSacados[$i].".PNG";
	echo "<img src='ImagenesBolas/".$imagenBola."' width='40px' border='.5'>"; 
	
	/*Estas condiciones las puse para que fuese pasando a la siguiente línea 
	cada 10 bolas, simplemente para que se viese mejor.*/
	if($i==9) 
		echo "<br>";
	else if($i==19) 
		echo "<br>";
	else if($i==29) 
		echo "<br>";
	else if($i==39) 
		echo "<br>";
	else if($i==49) 
		echo "<br>";
}
?>
