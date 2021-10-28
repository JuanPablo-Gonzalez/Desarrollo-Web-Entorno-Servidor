<?php
/*Juan Pablo González*/

//FUNCIÓN QUE CREA LOS CARTONES DE LOS JUGADORES Y LOS RELLENA.
function rellenarCarton(&$arr) {
	for($i=1;$i<4;$i++) {
		$arr["carton$i"]= array(); //Se crean los cartones.
		$contNumeros=0; //Para que se reinicie al cambiar de cartón.
		while($contNumeros<15) {
			$numAleatorio= random_int(1,60);
			//Si no está en el cartón correspondiente entonces se mete.
			if(!(in_array($numAleatorio,$arr["carton$i"]))) { 
				$arr["carton$i"][$contNumeros]= $numAleatorio;
				$contNumeros++;
			}
		}
	} 
}

//FUNCIÓN QUE MUESTRA TODOS LOS CARTONES DE LOS JUGADORES.
function mostrarTodosCartones($arr) {
    foreach($arr as $numeroCarton=> $carton) {
        echo "<table border=1>";
        echo "<tr>";
        echo "$numeroCarton:";
        foreach($carton as $indice=> $numero) {
            echo "<td>$numero</td>";
        }
        echo "</tr>";
        echo "</table>";
        echo "<br>";
    }
}

//FUNCIÓN QUE MUESTRA EL CARTÓN DEL JUGADOR GANADOR.
function mostrarCartonGanador($arr) {
    echo "<table border=1>";
    echo "<tr>";
    foreach($arr as $indice=> $numero) {
        echo "<td>$numero</td>";
    }
    echo "</tr>";
    echo "</table>";
    echo "<br>";
}

//FUNCIÓN QUE COMPRUEBA EL GANADOR Y MUESTRA EL CARTÓN CON EL QUE HA GANADO.
function comprobarCarton($jugador1,$jugador2,$jugador3,$jugador4,$numerosSacados,&$ganador) {
    /*Pasé la variable $ganador por referencia para que cambiase en la función jugar().
    Si array_diff devuelve un array vacío es porque todos los valores 
    están en el array (significa que ha ganado).*/
    if (array_diff($jugador1["carton1"], $numerosSacados)==array()) {
        $ganador= true;
        echo "Ha ganado el jugador 1 con el cartón 1"."<br>";
        mostrarCartonGanador($jugador1["carton1"]);
    }
    if (array_diff($jugador1["carton2"], $numerosSacados)==array()) {
        $ganador= true;
        echo "Ha ganado el jugador 1 con el cartón 2"."<br>";
        mostrarCartonGanador($jugador1["carton2"]);
    }
    if (array_diff($jugador1["carton3"], $numerosSacados)==array()) {
        $ganador= true;
        echo "Ha ganado el jugador 1 con el cartón 3"."<br>";
        mostrarCartonGanador($jugador1["carton3"]);
    }
    if (array_diff($jugador2["carton1"], $numerosSacados)==array()) {
        $ganador= true;
        echo "Ha ganado el jugador 2 con el cartón 1"."<br>";
        mostrarCartonGanador($jugador2["carton1"]);
    }
    if (array_diff($jugador2["carton2"], $numerosSacados)==array()) {
        $ganador= true;
        echo "Ha ganado el jugador 2 con el cartón 2"."<br>";
        mostrarCartonGanador($jugador2["carton2"]);
    }
    if (array_diff($jugador2["carton3"], $numerosSacados)==array()) {
        $ganador= true;
        echo "Ha ganado el jugador 2 con el cartón 3"."<br>";
        mostrarCartonGanador($jugador2["carton3"]);
    }
    if (array_diff($jugador3["carton1"], $numerosSacados)==array()) {
        $ganador= true;
        echo "Ha ganado el jugador 3 con el cartón 1"."<br>";
        mostrarCartonGanador($jugador3["carton1"]);
    }
    if (array_diff($jugador3["carton2"], $numerosSacados)==array()) {
        $ganador= true;
        echo "Ha ganado el jugador 3 con el cartón 2"."<br>";
        mostrarCartonGanador($jugador3["carton2"]);
    }
    if (array_diff($jugador3["carton3"], $numerosSacados)==array()) {
        $ganador= true;
        echo "Ha ganado el jugador 3 con el cartón 3"."<br>";
        mostrarCartonGanador($jugador3["carton3"]);
    }
    if (array_diff($jugador4["carton1"], $numerosSacados)==array()) {
        $ganador= true;
        echo "Ha ganado el jugador 4 con el cartón 1"."<br>";
        mostrarCartonGanador($jugador4["carton1"]);
    }
    if (array_diff($jugador4["carton2"], $numerosSacados)==array()) {
        $ganador= true;
        echo "Ha ganado el jugador 4 con el cartón 2"."<br>";
        mostrarCartonGanador($jugador4["carton2"]);
    }
    if (array_diff($jugador4["carton3"], $numerosSacados)==array()) {
        $ganador= true;
        echo "Ha ganado el jugador 4 con el cartón 3"."<br>";
        mostrarCartonGanador($jugador4["carton3"]);
    }
}

//FUNCIÓN QUE MUESTRA LAS BOLAS DEL BOMBO.
function mostrarBolasBombo($numerosSacados) {
    foreach($numerosSacados as $numeros=> $numero) {
        $imagenBola= $numero.".PNG";
        echo "<img src='ImagenesBolas/".$imagenBola."' width='40px' border='.5'>"; 
        
        /*Estas condiciones las puse para que fuese pasando a la siguiente línea 
        cada 10 bolas, simplemente para que se viese mejor.*/
        if($numeros==9) 
            echo "<br>";
        else if($numeros==19) 
            echo "<br>";
        else if($numeros==29) 
            echo "<br>";
        else if($numeros==39) 
            echo "<br>";
        else if($numeros==49) 
            echo "<br>";
    }
}

//FUNCIÓN QUE SIRVE PARA EMPEZAR EL JUEGO.
function jugar($jugador1,$jugador2,$jugador3,$jugador4) {
    $numerosSacados= array();
    $ganador= false;

    /*Se ejecutará mientras no haya un ganador y no hayan salido más de 60 bolas.
    Se genera un número aleatorio del bombo. Si no ha salida antes 
    se meterá en el array de sacados y se comprobará si hay ganador.*/
    while(!$ganador&&count($numerosSacados)<61) {
        $numAleatorio= random_int(1,60);
        if(!(in_array($numAleatorio,$numerosSacados))) {
            array_push($numerosSacados,$numAleatorio);
            comprobarCarton($jugador1,$jugador2,$jugador3,$jugador4,$numerosSacados,$ganador);
        }
    }
    
    //PARA CONTROLAR SI NO HUBIESE GANADOR.
    if(!$ganador)
	    echo "No hay ningún ganador"."<br>";

    //MOSTRAMOS LOS NÚMEROS QUE HAN SALIDO DEL BOMBO.
    echo "<h3>NÚMEROS QUE HAN SALIDO DEL BOMBO</h3>";

    mostrarBolasBombo($numerosSacados);
}
?>