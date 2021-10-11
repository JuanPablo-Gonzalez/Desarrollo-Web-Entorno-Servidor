<?php
/*Juan Pablo González*/

/*Usé el array_diff para comprobar el ganador, luego taché las posiciones para ver 
visualmente quién ganaba y para escoger el cartón del ganador.
Esta forma funcionaba, pero en cuanto a lógica me gustaba más la que hice sin
usar array_diff, porque simplificaba el código y estaba más acorde con la lógica 
del bingo (ir tachando cada vez que se encuentra el número).*/

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
		//si array_diff muestra un array vacio es porque todos los valores están en el array (significa que ha ganado).
		if(array_diff($jugador1["carton1"], $numerosSacados)==array()||array_diff($jugador1["carton2"], $numerosSacados)==array()
			||array_diff($jugador1["carton3"], $numerosSacados)==array())
			$ganador1= true;
		if (array_diff($jugador2["carton1"], $numerosSacados)==array()||array_diff($jugador2["carton2"], $numerosSacados)==array()
			||array_diff($jugador2["carton3"], $numerosSacados)==array())
			$ganador2= true;
		if (array_diff($jugador3["carton1"], $numerosSacados)==array()||array_diff($jugador3["carton2"], $numerosSacados)==array()
			||array_diff($jugador3["carton3"], $numerosSacados)==array()) 
			$ganador3= true;
		if (array_diff($jugador4["carton1"], $numerosSacados)==array()||array_diff($jugador4["carton2"], $numerosSacados)==array()
			||array_diff($jugador4["carton3"], $numerosSacados)==array()) 
			$ganador4= true;
	}
}

//Con esto conseguimos "tachar" los números que ya han salido, 
//para ver exactamente el cupón del jugador ganador, que saldrá con todas las posiciones con '--'.
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

/*AQUÍ LO QUE HAREMOS SERÁ COMPROBAR EL CARTÓN CON EL QUE EL GANADOR HA GANADO, 
QUE SERÁ EL QUE TENGA TODOS TACHADOS).*/
$cartonTachado= array("--","--","--","--","--","--","--","--","--","--","--","--","--","--","--");
$cartonGanadorJ1;
$cartonGanadorJ2;
$cartonGanadorJ3;
$cartonGanadorJ4;

if($jugador1["carton1"]==$cartonTachado) {
	$cartonGanadorJ1="cartón 1";
}
if($jugador1["carton2"]==$cartonTachado) {
	$cartonGanadorJ1="cartón 2";
}
if($jugador1["carton3"]==$cartonTachado) {
	$cartonGanadorJ1="cartón 3";
}
if($jugador2["carton1"]==$cartonTachado) {
	$cartonGanadorJ2="cartón 1";
}
if($jugador2["carton2"]==$cartonTachado)  {
	$cartonGanadorJ2="cartón 2";
}
if($jugador2["carton3"]==$cartonTachado) {
	$cartonGanadorJ2="cartón 3";
}
if($jugador3["carton1"]==$cartonTachado) {
	$cartonGanadorJ3="cartón 1";
}
if($jugador3["carton2"]==$cartonTachado) {
	$cartonGanadorJ3="cartón 2";
}
if($jugador3["carton3"]==$cartonTachado) {
	$cartonGanadorJ3="cartón 3";
}
if($jugador4["carton1"]==$cartonTachado) {
	$cartonGanadorJ4="cartón 1";
}
if($jugador4["carton2"]==$cartonTachado) {
	$cartonGanadorJ4="cartón 2";
}
if($jugador4["carton3"]==$cartonTachado) {
	$cartonGanadorJ4="cartón 3";
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

//MOSTRAMOS LOS NÚMEROS QUE HAN SALIDO DEL BOMBO.
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
    echo "El jugador 1 ha ganado con el $cartonGanadorJ1"."<br>";
if($ganador2)
	echo "El jugador 2 ha ganado con el $cartonGanadorJ2"."<br>";
if($ganador3)
	echo "El jugador 3 ha ganado con el $cartonGanadorJ3"."<br>";
if($ganador4)
	echo "El jugador 4 ha ganado con el $cartonGanadorJ4"."<br>";
?>