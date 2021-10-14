<?php
/*Juan Pablo González*/

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
		$contNumeros=0; //para que se reinicie al cambiar de cartón.
		while($contNumeros<15) {
			$numAleatorio= random_int(1,60);
			if(!(in_array($numAleatorio,$arr["carton$i"]))) { //si no está ya en el cartón, entonces se mete.
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
$ganador1= false;
$ganador2= false;
$ganador3= false;
$ganador4= false;

//ITERARÁ HASTA QUE HAYA AL MENOS UN GANADOR.
while(!$ganador1&&!$ganador2&&!$ganador3&&!$ganador4) {
    $numAleatorio= random_int(1,60);
	//ENTRARÁ SI NO ESTÁ EN EL ARRAY DE LOS QUE YA HAN SIDO SACADOS DEL BOMBO.
	if(!(in_array($numAleatorio,$numerosSacados))) {
		array_push($numerosSacados,$numAleatorio);
		/*AQUI LO QUE HAREMOS SERÁ COMPROBAR SI EL NÚMERO ALEATORIO DEL BOMBO ESTÁ 
		EN ALGUNO DE LOS CARTONES. SI ESTÁ, SE 'TACHARÁ' ESA POSICIÓN.*/
		for($i=0;$i<15;$i++) {
			if($jugador1["carton1"][$i]==$numAleatorio) 
				$jugador1["carton1"][$i]= "--";
			if($jugador1["carton2"][$i]==$numAleatorio) 
				$jugador1["carton2"][$i]= "--";
			if($jugador1["carton3"][$i]==$numAleatorio) 
				$jugador1["carton3"][$i]= "--";
			if($jugador2["carton1"][$i]==$numAleatorio) 
				$jugador2["carton1"][$i]= "--";
			if($jugador2["carton2"][$i]==$numAleatorio) 
				$jugador2["carton2"][$i]= "--";
			if($jugador2["carton3"][$i]==$numAleatorio) 
				$jugador2["carton3"][$i]= "--";
			if($jugador3["carton1"][$i]==$numAleatorio) 
				$jugador3["carton1"][$i]= "--";
			if($jugador3["carton2"][$i]==$numAleatorio) 
				$jugador3["carton2"][$i]= "--";
			if($jugador3["carton3"][$i]==$numAleatorio) 
				$jugador3["carton3"][$i]= "--";
			if($jugador4["carton1"][$i]==$numAleatorio) 
				$jugador4["carton1"][$i]= "--";
			if($jugador4["carton2"][$i]==$numAleatorio) 
				$jugador4["carton2"][$i]= "--";
			if($jugador4["carton3"][$i]==$numAleatorio) 
				$jugador4["carton3"][$i]= "--";
		}
	}
	
	/*AQUÍ LO QUE HAREMOS SERÁ COMPROBAR EL GANADOR, DE TAL FORMA QUE SI EL CARTÓN DEL JUGADOR ES IGUAL
	AL CARTÓN DE TACHADOS, SIGNIFICARÁ QUE ESE JUGADOR A GANADO CON ESE CARTÓN.*/
	$cartonTachado= array("--","--","--","--","--","--","--","--","--","--","--","--","--","--","--");
	$cartonGanadorJ1;
	$cartonGanadorJ2;
	$cartonGanadorJ3;
	$cartonGanadorJ4;
	
	if($jugador1["carton1"]==$cartonTachado) {
		$ganador1=true;
		$cartonGanadorJ1="cartón 1";
	}
	if($jugador1["carton2"]==$cartonTachado) {
		$ganador1=true;
		$cartonGanadorJ1="cartón 2";
	}
	if($jugador1["carton3"]==$cartonTachado) {
		$ganador1=true;
		$cartonGanadorJ1="cartón 3";
	}
	if($jugador2["carton1"]==$cartonTachado) {
		$ganador2=true;
		$cartonGanadorJ2="cartón 1";
	}
	if($jugador2["carton2"]==$cartonTachado)  {
		$ganador2=true;
		$cartonGanadorJ2="cartón 2";
	}
	if($jugador2["carton3"]==$cartonTachado) {
		$ganador2=true;
		$cartonGanadorJ2="cartón 3";
	}
	if($jugador3["carton1"]==$cartonTachado) {
		$ganador3=true;
		$cartonGanadorJ3="cartón 1";
	}
	if($jugador3["carton2"]==$cartonTachado) {
		$ganador3=true;
		$cartonGanadorJ3="cartón 2";
	}
	if($jugador3["carton3"]==$cartonTachado) {
		$ganador3=true;
		$cartonGanadorJ3="cartón 3";
	}
	if($jugador4["carton1"]==$cartonTachado) {
		$ganador4=true;
		$cartonGanadorJ4="cartón 1";
	}
	if($jugador4["carton2"]==$cartonTachado) {
		$ganador4=true;
		$cartonGanadorJ4="cartón 2";
	}
	if($jugador4["carton3"]==$cartonTachado) {
		$ganador4=true;
		$cartonGanadorJ4="cartón 3";
	}
}

//VOLVEMOS A MOSTRAR LOS CARTONES, PERO ESTA VEZ CON LOS NÚMEROS TACHADOS.
echo "<h3>MOSTRAMOS LOS CARTONES 'TACHADOS'</h3>";
echo "CARTONES DEL JUGADOR 1"."<br>";
mostrarCarton($jugador1);
echo "CARTONES DEL JUGADOR 2"."<br>";
mostrarCarton($jugador2);
echo "CARTONES DEL JUGADOR 3"."<br>";
mostrarCarton($jugador3);
echo "CARTONES DEL JUGADOR 4"."<br>";
mostrarCarton($jugador4);

//MOSTRAMOS LOS NÚMEROS QUE HAN SALIDO DEL BOMBO.
echo "<h3>NÚMEROS QUE HAN SALIDO DEL BOMBO</h3>";

echo "<table border=1>";
echo "<tr>";
for($i=0;$i<count($numerosSacados);$i++) {
	$imagenBola= $numerosSacados[$i].".PNG";
	echo "<td> <img src='ImagenesBolas/".$imagenBola."' width='30px'> </td>"; 
}
echo "</tr>";
echo "</table>";
echo "<br>";

/*COMPROBAMOS QUIÉN HA GANADO. 
/SALDRÁ EN NOMBRE DE TODOS LOS GANADORES EN CASO DE QUE HAYA VARIOS.*/
echo "<h3>MOSTRAMOS EL GANADOR O GANADORES</h3>";

if($ganador1) 
    echo "El jugador 1 ha ganado con el $cartonGanadorJ1"."<br>";
if($ganador2)
	echo "El jugador 2 ha ganado con el $cartonGanadorJ2"."<br>";
if($ganador3)
	echo "El jugador 3 ha ganado con el $cartonGanadorJ3"."<br>";
if($ganador4)
	echo "El jugador 4 ha ganado con el $cartonGanadorJ4"."<br>";
?>