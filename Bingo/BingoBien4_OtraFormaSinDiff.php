<?php

/*Juan Pablo González*/
/*Funciona bien, lo hice como alternativa a hacerlo con array_diff, y para que quedase más claro el proceso de
tachar al tener el número.*/

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
$cartonGanador= array("--","--","--","--","--","--","--","--","--","--","--","--","--","--","--");
$cartonDelGanador="";
while(!$ganador1&&!$ganador2&&!$ganador3&&!$ganador4) {
    $numAleatorio= random_int(1,60);
	if(!(in_array($numAleatorio,$numerosSacados))) {
		array_push($numerosSacados,$numAleatorio);
		//con esto conseguimos "tachar" los números que ya han salido, 
		//para ver mejor quién ha ganado. El cupón del ganador saldrá con todas las posiciones con '--'.
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

	if($jugador1["carton1"]==$cartonGanador) {
		$ganador1=true;
		$cartonDelGanador="cartón 1";
	}
	if($jugador1["carton2"]==$cartonGanador) {
		$ganador1=true;
		$cartonDelGanador="cartón 2";
	}
	if($jugador1["carton3"]==$cartonGanador) {
		$ganador1=true;
		$cartonDelGanador="cartón 3";
	}
	if($jugador2["carton1"]==$cartonGanador) {
		$ganador2=true;
		$cartonDelGanador="cartón 1";
	}
	if($jugador2["carton2"]==$cartonGanador)  {
		$ganador2=true;
		$cartonDelGanador="cartón 2";
	}
	if($jugador2["carton3"]==$cartonGanador) {
		$ganador2=true;
		$cartonDelGanador="cartón 3";
	}
	if($jugador3["carton1"]==$cartonGanador) {
		$ganador3=true;
		$cartonDelGanador="cartón 1";
	}
	if($jugador3["carton2"]==$cartonGanador) {
		$ganador3=true;
		$cartonDelGanador="cartón 2";
	}
	if($jugador3["carton3"]==$cartonGanador) {
		$ganador3=true;
		$cartonDelGanador="cartón 3";
	}
	if($jugador4["carton1"]==$cartonGanador) {
		$ganador4=true;
		$cartonDelGanador="cartón 1";
	}
	if($jugador4["carton2"]==$cartonGanador) {
		$ganador4=true;
		$cartonDelGanador="cartón 2";
	}
	if($jugador4["carton3"]==$cartonGanador) {
		$ganador4=true;
		$cartonDelGanador="cartón 3";
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
    echo "El jugador 1 ha ganado con el $cartonDelGanador";
else if($ganador2)
	echo "El jugador 2 ha ganado con el $cartonDelGanador";
else if($ganador3)
	echo "El jugador 3 ha ganado con el $cartonDelGanador";
else if($ganador4)
	echo "El jugador 4 ha ganado con el $cartonDelGanador";

//PROBAR TAMBIÉN QUE PUEDA HABER VARIOS GANADORES.
?>