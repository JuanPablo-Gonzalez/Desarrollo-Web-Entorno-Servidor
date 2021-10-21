<?php
/*Juan Pablo González*/

/*
Hecho de esta forma sí que controla que un mismo jugador tenga
dos cartones ganadores. El código es igual hasta la línea 126,
que modifiqué para que funcionase eso.
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
		$contNumeros=0; //para que se reinicie al cambiar de cartón.
		while($contNumeros<15) {
			$numAleatorio= random_int(1,60);
			//Si el número no está ya en el cartón, entonces se mete.
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

echo "<br>";

$numerosSacados= array();
$ganador= false;

echo "<h3>MOSTRAMOS EL GANADOR O GANADORES</h3>";
//ITERARÁ HASTA QUE HAYA AL MENOS UN GANADOR.
while(!$ganador) {
    $numAleatorio= random_int(1,60);
	//ENTRARÁ SI NO ESTÁ EN EL ARRAY DE LOS QUE YA HAN SIDO SACADOS DEL BOMBO.
	if(!(in_array($numAleatorio,$numerosSacados))) {
		array_push($numerosSacados,$numAleatorio);
		/*AQUÍ LO QUE HAREMOS SERÁ COMPROBAR SI EL NÚMERO ALEATORIO QUE HA SALIDO 
		ESTÁ EN ALGUNO DE LOS CARTONES. SI ESTÁ, SE 'TACHARÁ' ESA POSICIÓN.*/
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
	
	/*AQUÍ LO QUE HAREMOS SERÁ COMPROBAR EL GANADOR, DE TAL FORMA QUE SI EL CARTÓN
	DEL JUGADOR ES IGUAL AL ARRAY DE TACHADOS SIGNIFICARÁ QUE ESE JUGADOR HA GANADO 
	CON ESE CARTÓN. PUEDE HABER VARIOS GANADORES.*/
	$cartonTachado= array("--","--","--","--","--","--","--","--","--","--","--","--","--","--","--");
	
	if($jugador1["carton1"]==$cartonTachado) {
		$ganador=true;
		echo "Ha ganado el jugador 1 con el cartón 1"."<br>";
		/*Mostraremos los cartones del jugador ganador.
		El cartón o los cartones del ganador o ganadores
		aparecerá con todas posiciones tachadas ('--').*/
		mostrarCarton($jugador1); 
	}
	if($jugador1["carton2"]==$cartonTachado) {
		$ganador=true;
		echo "Ha ganado el jugador 1 con el cartón 2"."<br>";
		mostrarCarton($jugador1);
	}
	if($jugador1["carton3"]==$cartonTachado) {
		$ganador=true;
		echo "Ha ganado el jugador 1 con el cartón 3"."<br>";
		mostrarCarton($jugador1);
	}
	if($jugador2["carton1"]==$cartonTachado) {
		$ganador=true;
		echo "Ha ganado el jugador 2 con el cartón 1"."<br>";
		mostrarCarton($jugador2);
	}
	if($jugador2["carton2"]==$cartonTachado)  {
		$ganador=true;
		echo "Ha ganado el jugador 2 con el cartón 2"."<br>";
		mostrarCarton($jugador2);
	}
	if($jugador2["carton3"]==$cartonTachado) {
		$ganador=true;
		echo "Ha ganado el jugador 2 con el cartón 3"."<br>";
		mostrarCarton($jugador2);
	}
	if($jugador3["carton1"]==$cartonTachado) {
		$ganador=true;
		echo "Ha ganado el jugador 3 con el cartón 1"."<br>";
		mostrarCarton($jugador3);
	}
	if($jugador3["carton2"]==$cartonTachado) {
		$ganador=true;
		echo "Ha ganado el jugador 3 con el cartón 2"."<br>";
		mostrarCarton($jugador3);
	}
	if($jugador3["carton3"]==$cartonTachado) {
		$ganador=true;
		echo "Ha ganado el jugador 3 con el cartón 3"."<br>";
		mostrarCarton($jugador3);
	}
	if($jugador4["carton1"]==$cartonTachado) {
		$ganador=true;
		echo "Ha ganado el jugador 4 con el cartón 1"."<br>";
		mostrarCarton($jugador4);
	}
	if($jugador4["carton2"]==$cartonTachado) {
		$ganador=true;
		echo "Ha ganado el jugador 4 con el cartón 2"."<br>";
		mostrarCarton($jugador4);
	}
	if($jugador4["carton3"]==$cartonTachado) {
		$ganador=true;
		echo "Ha ganado el jugador 4 con el cartón 3"."<br>";
		mostrarCarton($jugador4);
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