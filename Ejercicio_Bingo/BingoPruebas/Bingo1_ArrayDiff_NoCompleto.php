<?php

/*Juan Pablo González*/
/*Este funciona bien, y tiene lo de rellenar los cartones y mostrarlos bien hecho.
También falta lo de varios ganadores y lo de que saque el cartón ganador.*/

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

$numerosSacados= array();
$ganador1= false;
$ganador2= false;
$ganador3= false;
$ganador4= false;

//COMPROBAMOS SI LOS NÚMEROS ALEATORIOS QUE VAN SALIENDO COINCIDEN CON LOS DEL CARTÓN
while(!$ganador1&&!$ganador2&&!$ganador3&&!$ganador4) {
    $numAleatorio= random_int(1,60);
	if(!(in_array($numAleatorio,$numerosSacados))) {
		array_push($numerosSacados,$numAleatorio);
		//si el array_diff muestra un array vacio es porque todos los valores están en el array.
		if(array_diff($jugador1["carton1"], $numerosSacados)==array()||array_diff($jugador1["carton2"], $numerosSacados)==array()
			||array_diff($jugador1["carton3"], $numerosSacados)==array()) {
			//$ganador= true;
			$ganador1= true;
		} else if (array_diff($jugador2["carton1"], $numerosSacados)==array()||array_diff($jugador2["carton2"], $numerosSacados)==array()
			||array_diff($jugador2["carton3"], $numerosSacados)==array()) {
			//$ganador= true;
			$ganador2= true;
		} else if (array_diff($jugador3["carton1"], $numerosSacados)==array()||array_diff($jugador3["carton2"], $numerosSacados)==array()
			||array_diff($jugador3["carton3"], $numerosSacados)==array()) {
			//$ganador= true;
			$ganador3= true;
		} else if (array_diff($jugador4["carton1"], $numerosSacados)==array()||array_diff($jugador4["carton2"], $numerosSacados)==array()
			||array_diff($jugador4["carton3"], $numerosSacados)==array()) {
			//$ganador= true;
			$ganador4= true;
		}
	}
}

//con esto conseguimos "tachar" los números que ya han salido, 
//para ver mejor quién ha ganado. El cupón del ganador saldrá con todas las posiciones con '--'.
for($j=0;$j<count($numerosSacados);$j++) {
	for($i=0;$i<15;$i++) {
		if($jugador1["carton1"][$i]==$numerosSacados[$j]) 
			$jugador1["carton1"][$i]= "--";
		if($jugador1["carton2"][$i]==$numerosSacados[$j]) 
			$jugador1["carton2"][$i]= "--";
		if($jugador1["carton3"][$i]==$numerosSacados[$j]) 
			$jugador1["carton3"][$i]= "--";
		if($jugador2["carton1"][$i]==$numerosSacados[$j]) 
			$jugador2["carton1"][$i]= "--";
		if($jugador2["carton2"][$i]==$numerosSacados[$j]) 
			$jugador2["carton2"][$i]= "--";
		if($jugador2["carton3"][$i]==$numerosSacados[$j]) 
			$jugador2["carton3"][$i]= "--";
		if($jugador3["carton1"][$i]==$numerosSacados[$j]) 
			$jugador3["carton1"][$i]= "--";
		if($jugador3["carton2"][$i]==$numerosSacados[$j]) 
			$jugador3["carton2"][$i]= "--";
		if($jugador3["carton3"][$i]==$numerosSacados[$j]) 
			$jugador3["carton3"][$i]= "--";
		if($jugador4["carton1"][$i]==$numerosSacados[$j]) 
			$jugador4["carton1"][$i]= "--";
		if($jugador4["carton2"][$i]==$numerosSacados[$j]) 
			$jugador4["carton2"][$i]= "--";
		if($jugador4["carton3"][$i]==$numerosSacados[$j]) 
			$jugador4["carton3"][$i]= "--";
	}
}

//VOLVEMOS A MOSTRAR LOS CARTONES, PERO ESTA VEZ CON LOS NÚMEROS TACHADOS.
echo "CARTONES DEL JUGADOR 1"."<br>";
mostrarCarton($jugador1);
echo "CARTONES DEL JUGADOR 2"."<br>";
mostrarCarton($jugador2);
echo "CARTONES DEL JUGADOR 3"."<br>";
mostrarCarton($jugador3);
echo "CARTONES DEL JUGADOR 4"."<br>";
mostrarCarton($jugador4);
//var_dump($numerosSacados);
echo "Números que han salido:";

//MOSTRAMOS LOS NÚMERO QUE HAN SALIDO DEL BOMBO.
echo "<table border=1>";
echo "<tr>";
for($i=0;$i<count($numerosSacados);$i++) {
	echo "<td>".$numerosSacados[$i]."</td>"; 
}
echo "</tr>";
echo "</table>";
echo "<br>";


//COMPROBAMOS QUIÉN HA GANADO.
if($ganador1) 
    echo "El jugador 1 ha ganado";
else if($ganador2)
	echo "El jugador 2 ha ganado";
else if($ganador3)
	echo "El jugador 3 ha ganado";
else if($ganador4)
	echo "El jugador 4 ha ganado";

//cambiando los valores de ambos random_int a 15 comprobamos que siempre haya un ganador al salir 15 bolas.

//LO DE TACHARLOS SOLO FUNCIONA A NIVEL VISUAL, PODRÍA HACER QUE EL PROCESO DE TACHADO Y COMPROBACIÓN FUESE SIMULTÁNEO.
//PROBAR TAMBIÉN QUE SE PUEDA COGER EL CARTÓN CON EL QUE HA GANADO, Y QUE PUEDA HABER VARIOS GANADORES.

?>