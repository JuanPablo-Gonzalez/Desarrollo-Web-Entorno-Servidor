<?php

/*Juan Pablo González*/
/*Con esta funciona comprobando los primeros cartones de los dos primeros jugadores*/

$jugador1= array(
    "carton1"=> array(),
    //"carton2"=> array(),
    //"carton3"=> array()
);
$jugador2= array(
    "carton1"=> array(),
    //"carton2"=> array(),
    //"carton3"=> array()
);
/*
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
*/

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
//rellenarCarton($jugador1["carton2"]);
//rellenarCarton($jugador1["carton3"]);

rellenarCarton($jugador2["carton1"]);
//rellenarCarton($jugador2["carton2"]);
//rellenarCarton($jugador2["carton3"]);
/*
rellenarCarton($jugador3["carton1"]);
rellenarCarton($jugador3["carton2"]);
rellenarCarton($jugador3["carton3"]);

rellenarCarton($jugador4["carton1"]);
rellenarCarton($jugador4["carton2"]);
rellenarCarton($jugador4["carton3"]);
*/

//PARA VER LOS CARTONES.
var_dump($jugador1["carton1"]);
var_dump($jugador2["carton1"]);
//var_dump($jugador3["carton1"]);
//var_dump($jugador4["carton1"]);



//$contApariciones= 0;
$contApariciones1= 0;
$contApariciones2= 0;
$numerosSacados= array();
$ganador= false;
$ganador1= false;
$ganador2= false;
//$ganador3= false;
//$ganador4= false;

while(!$ganador) {
    $numAleatorio= random_int(1,60);
	if(!(in_array($numAleatorio,$numerosSacados))) {
		array_push($numerosSacados,$numAleatorio);

		for($i=0;$i<15;$i++) {
			if($jugador1["carton1"][$i]==$numAleatorio) 
				$contApariciones1++;
			else if($jugador2["carton1"][$i]==$numAleatorio) 
				$contApariciones2++;
		}
	}
	if($contApariciones1==15) {
		$ganador= true;
		$ganador1= true;
	} else if($contApariciones2==15) {
		$ganador= true;
		$ganador2= true;
	}
}

//COMPROBAMOS SI LOS NÚMEROS ALEATORIOS QUE VAN SALIENDO COINCIDEN CON LOS DEL CARTÓN
/*
while(!$ganador) {
    $numAleatorio= random_int(1,60);

	if(!(in_array($numAleatorio,$numerosSacados))) {
		array_push($numerosSacados,$numAleatorio);

		if(array_diff($jugador1["carton1"], $numerosSacados)==0||array_diff($jugador1["carton2"], $numerosSacados)==0
		||array_diff($jugador1["carton3"], $numerosSacados)==0) {
			$ganador= true;
			$ganador1= true;
		} else if (array_diff($jugador2["carton1"], $numerosSacados)==0||array_diff($jugador2["carton2"], $numerosSacados)==0
		||array_diff($jugador2["carton3"], $numerosSacados)==0) {
			$ganador= true;
			$ganador2= true;
		}
	}
}
*/
if($ganador1) 
    echo "1 Ha ganado";
else if($ganador2)
	echo "2 Ha ganado";

var_dump($numerosSacados);
?>