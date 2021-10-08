<?php

/*Juan Pablo González*/

$arr= array();
$contNumeros=0;

//RELLENAMOS EL ARRAY DEL CARTÓN.
while($contNumeros<15) {
	$numAleatorio= random_int(1,60);
	if(!(in_array($numAleatorio,$arr))) {
		$arr[$contNumeros]= $numAleatorio;
		$contNumeros++;
	}
}
    
var_dump($arr);
    
$contApariciones= 0;
$numerosSacados= array();

//COMPROBAMOS SI LOS NÚMEROS ALEATORIOS QUE VAN SALIENDO COINCIDEN CON LOS DEL CARTÓN
while($contApariciones<15) {
    $numAleatorio= random_int(1,60);
	if(!(in_array($numAleatorio,$numerosSacados))) {
		for($i=0;$i<count($arr);$i++) {
			if($arr[$i]==$numAleatorio) 
				$contApariciones++;
		}
		array_push($numerosSacados,$numAleatorio);
	}
}
	
if($contApariciones==15) {
    echo "Has ganado";
}
	
var_dump($numerosSacados);
?>
