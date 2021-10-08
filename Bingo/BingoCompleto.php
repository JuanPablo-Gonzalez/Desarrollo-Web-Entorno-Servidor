<?php

/*Juan Pablo González*/
/*El que estoy haciendo en casa bien*/

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
		$numAleatorio= random_int(1,20);
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

//función para mostrar cartones. ARREGLAR.
function mostrarCartones(&$arr) {
	foreach($arr as $jugador=>$cartones) {
		echo $jugador;
		foreach($cartones as $carton=>$numeros) {
			echo $carton.$numeros;
		}
	}
}

/*PARA VER LOS CARTONES.
var_dump($jugador1["carton1"]);
var_dump($jugador1["carton2"]);
var_dump($jugador1["carton3"]);
var_dump($jugador2["carton1"]);
var_dump($jugador2["carton2"]);
var_dump($jugador2["carton3"]);
*/

mostrarCartones($jugador1["carton1"]);


//$contApariciones= 0;
$numerosSacados= array();
$ganador= false;
$ganador1= false;
$ganador2= false;
$ganador3= false;
$ganador4= false;

//COMPROBAMOS SI LOS NÚMEROS ALEATORIOS QUE VAN SALIENDO COINCIDEN CON LOS DEL CARTÓN
while(!$ganador) {
    $numAleatorio= random_int(1,20);
	if(!(in_array($numAleatorio,$numerosSacados))) {
		array_push($numerosSacados,$numAleatorio);
		//si el array_diff muestra un array vació es porque todos los valores están en el array.
		if(array_diff($jugador1["carton1"], $numerosSacados)==array()||array_diff($jugador1["carton2"], $numerosSacados)==array()
		||array_diff($jugador1["carton3"], $numerosSacados)==array()) {
			$ganador= true;
			$ganador1= true;
		} else if (array_diff($jugador2["carton1"], $numerosSacados)==array()||array_diff($jugador2["carton2"], $numerosSacados)==array()
		||array_diff($jugador2["carton3"], $numerosSacados)==array()) {
			$ganador= true;
			$ganador2= true;
		} else if (array_diff($jugador3["carton1"], $numerosSacados)==array()||array_diff($jugador3["carton2"], $numerosSacados)==array()
		||array_diff($jugador3["carton3"], $numerosSacados)==array()) {
			$ganador= true;
			$ganador3= true;
		} else if (array_diff($jugador4["carton1"], $numerosSacados)==array()||array_diff($jugador4["carton2"], $numerosSacados)==array()
		||array_diff($jugador4["carton3"], $numerosSacados)==array()) {
			$ganador= true;
			$ganador4= true;
		}
	}
}

if($ganador1) 
    echo "1 Ha ganado";
else if($ganador2)
	echo "2 Ha ganado";
else if($ganador3)
	echo "3 Ha ganado";
else if($ganador4)
	echo "4 Ha ganado";

var_dump($numerosSacados);

//cambiando los valores de ambos random_int a 15 comprobamos que siempre haya un ganador al salir 15 bolas.
?>