<?php
/*Juan Pablo González*/

/*Quise probar a hacerlo con un array que incluyese a todos los jugadores ($jugadores), 
y que estos a su vez incluyesen sus cartones.
Al hacerlo con el array que incluye a todos los jugadores pude optimizar
algunas funciones, como que rellenase los cartones de todos los jugadores a la vez
o que comprobase el ganador sin necesidad de hacerlo cartón a cartón.*/

//FUNCIÓN QUE CREA LOS JUGADORES, Y TAMBIÉN CREA Y RELLENA LOS CARTONES.
function crearJugadoresCartones(&$arr) {
    for($j=1;$j<5;$j++) {
        for($i=1;$i<4;$i++) {
            $arr["jugador$j"]["carton$i"]= array(); //Se crean los jugadores y cartones.
            $contNumeros=0; //Para que se reinicie al cambiar de cartón.

            while($contNumeros<15) {
                $numAleatorio= random_int(1,60);
                //Si no está en el cartón correspondiente entonces se mete.
                if(!(in_array($numAleatorio, $arr["jugador$j"]["carton$i"]))) { 
                    $arr["jugador$j"]["carton$i"][$contNumeros]= $numAleatorio;
                    $contNumeros++;
                }
            }
        } 
    }
}

//FUNCIÓN QUE MUESTRA TODOS LOS CARTONES DE LOS JUGADORES.
function mostrarTodosCartones($jugadores) {
    foreach($jugadores as $numeroJugador=> $jugador) {
        echo "<h3>Cartones $numeroJugador:</h3>";
        foreach($jugador as $numeroCarton=> $carton) {
            echo "<table border=1>";
            echo "<tr>";
            echo "$numeroCarton:";
            foreach($carton as $posicionNumero=> $numero) {
                echo "<td>$numero</td>";
            }
            echo "</tr>";
            echo "</table>";
            echo "<br>";
        }
    }
}

//FUNCIÓN QUE MUESTRA EL CARTÓN DEL JUGADOR GANADOR.
function mostrarCartonGanador($carton) {
    echo "<table border=1>";
    echo "<tr>";
    foreach($carton as $posicionNumero=> $numero) {
        echo "<td>$numero</td>";
    }
    echo "</tr>";
    echo "</table>";
    echo "<br>";
}

//FUNCIÓN QUE COMPRUEBA EL GANADOR Y MUESTRA EL CARTÓN CON EL QUE HA GANADO.
function comprobarGanador($jugadores,$numerosSacados,&$ganador) { 
    /*Pasé la variable $ganador por referencia para que cambiase en la función jugar().
    Si array_diff devuelve un array vacío es porque todos los valores 
    están en el array (significa que ha ganado).*/
    foreach($jugadores as $numeroJugador=> $jugador) {
        foreach($jugador as $numeroCarton=> $carton) {
            if(array_diff($carton,$numerosSacados)==array()) {
                $ganador= true;
                echo "El $numeroJugador ha ganado con el $numeroCarton.<br>";
                mostrarCartonGanador($carton);
            }
        }
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
function jugar($jugadores) {
    $numerosSacados= array();
    $ganador= false;

    /*Se ejecutará mientras no haya un ganador y no hayan salido más de 60 bolas.
    Se genera un número aleatorio del bombo. Si no ha salida antes 
    se meterá en el array de sacados y se comprobará si hay ganador.*/
    while(!$ganador&&count($numerosSacados)<61) {
        $numAleatorio= random_int(1,60);
        if(!(in_array($numAleatorio,$numerosSacados))) {
            array_push($numerosSacados,$numAleatorio);

            comprobarGanador($jugadores,$numerosSacados,$ganador);
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