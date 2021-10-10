<?php

/*Juan Pablo González*/
/*El que estoy haciendo en casa bien*/

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

//FUNCIÓN PARA RELLENAR ARRAYS CON NÚMEROS ALEATORIOS.
function rellenarCarton(&$arr) {
	$contNumeros=0;
	while($contNumeros<15) {
		$numAleatorio= random_int(1,60);
		if(!(in_array($numAleatorio,$arr))) {
			$arr[$contNumeros]= $numAleatorio;
			$contNumeros++;
		}
	}
}

rellenarCarton($jugador1["carton1"]);
rellenarCarton($jugador1["carton2"]);
rellenarCarton($jugador1["carton3"]);

rellenarCarton($jugador2["carton1"]);
rellenarCarton($jugador2["carton2"]);
rellenarCarton($jugador2["carton3"]);

rellenarCarton($jugador3["carton1"]);
rellenarCarton($jugador3["carton2"]);
rellenarCarton($jugador3["carton3"]);

rellenarCarton($jugador4["carton1"]);
rellenarCarton($jugador4["carton2"]);
rellenarCarton($jugador4["carton3"]);

//FUNCIÓN PARA MOSTRAR LOS CARTONES.
function mostrarCartones(&$arr) {
	echo "<table border=1>";
	echo "<tr>";
	for($i=0;$i<count($arr);$i++) {
		echo "<td>".$arr[$i]."</td>"; 
	}
	echo "</tr>";
	echo "</table>";
	echo "<br>";
}

/*PARA VER LOS CARTONES CON VAR_DUMP.
var_dump($jugador1["carton1"]);
var_dump($jugador1["carton2"]);
var_dump($jugador1["carton3"]);
var_dump($jugador2["carton1"]);
var_dump($jugador2["carton2"]);
var_dump($jugador2["carton3"]);
*/

echo "Cartones jugador 1"."<br>";
mostrarCartones($jugador1["carton1"]);
mostrarCartones($jugador1["carton2"]);
mostrarCartones($jugador1["carton3"]);
echo "<br>";

echo "Cartones jugador 2"."<br>";
mostrarCartones($jugador2["carton1"]);
mostrarCartones($jugador2["carton2"]);
mostrarCartones($jugador2["carton3"]);
echo "<br>";

echo "Cartones jugador 3"."<br>";
mostrarCartones($jugador3["carton1"]);
mostrarCartones($jugador3["carton2"]);
mostrarCartones($jugador3["carton3"]);
echo "<br>";

echo "Cartones jugador 4"."<br>";
mostrarCartones($jugador4["carton1"]);
mostrarCartones($jugador4["carton2"]);
mostrarCartones($jugador4["carton3"]);
echo "<br>";

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
echo "Cartones jugador 1"."<br>";
mostrarCartones($jugador1["carton1"]);
mostrarCartones($jugador1["carton2"]);
mostrarCartones($jugador1["carton3"]);
echo "<br>";

echo "Cartones jugador 2"."<br>";
mostrarCartones($jugador2["carton1"]);
mostrarCartones($jugador2["carton2"]);
mostrarCartones($jugador2["carton3"]);
echo "<br>";

echo "Cartones jugador 3"."<br>";
mostrarCartones($jugador3["carton1"]);
mostrarCartones($jugador3["carton2"]);
mostrarCartones($jugador3["carton3"]);
echo "<br>";

echo "Cartones jugador 4"."<br>";
mostrarCartones($jugador4["carton1"]);
mostrarCartones($jugador4["carton2"]);
mostrarCartones($jugador4["carton3"]);
echo "<br>";

//var_dump($numerosSacados);
echo "Números que han salido:";
mostrarCartones($numerosSacados);

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