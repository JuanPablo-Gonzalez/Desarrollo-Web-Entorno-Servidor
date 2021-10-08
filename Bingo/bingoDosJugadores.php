<?php

/*Juan Pablo González*/

$arr= array();
$arr2= array();
	
//FUNCIÓN PARA RELLENAR ARRAYS CON NÚMEROS ALEATORIOS.
function rellenarCarton(&$arr) {
	$contNumeros=0;
	while($contNumeros<5) {
		$numAleatorio= random_int(1,10);
		if(!(in_array($numAleatorio,$arr))) {
			$arr[$contNumeros]= $numAleatorio;
			$contNumeros++;
		}
	}
}
	
rellenarCarton($arr);
rellenarCarton($arr2);	
		
var_dump($arr);
var_dump($arr2);
    
//COMPROBAMOS QUIÉN DE LOS DOS GANA.
$contApariciones1= 0;
$contApariciones2= 0;
$numerosSacados= array();
//$ganador= false;
$ganador1= false;
$ganador2= false;	
	
while(!$ganador1&&!$ganador2) {
    $numAleatorio= random_int(1,10);
	if(!(in_array($numAleatorio,$numerosSacados))) {
		for($i=0;$i<count($arr);$i++) {
			if($arr[$i]==$numAleatorio) 
				$contApariciones1++;
		}
		if($contApariciones1==5) {
			//$ganador= true;
			$ganador1= true;
		}
		for($i=0;$i<count($arr2);$i++) {
			if($arr2[$i]==$numAleatorio) 
				$contApariciones2++;
		}
		if($contApariciones2==5) {
			//$ganador= true;
			$ganador2= true;
		}
		array_push($numerosSacados,$numAleatorio);
	}
}
	
if($ganador1) 
    echo "ganador jugador 1";
else if($ganador2) 
	echo "ganador jugador 2";
	
var_dump($numerosSacados);	
?>