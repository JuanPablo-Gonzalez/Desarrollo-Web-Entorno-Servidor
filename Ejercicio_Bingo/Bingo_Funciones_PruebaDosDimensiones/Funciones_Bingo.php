<?php

//bien
function rellenarCarton(&$arr) {
    for($i=1;$i<4;$i++) {
        $arr["carton$i"]= array(); //se crean los cartones.
        $contNumeros=0; //lo pongo aquí para que se reinicie al cambiar de cartón.

        while($contNumeros<15) {
            $numAleatorio= random_int(1,60);
            //si no está en el cartón correspondiente entonces se mete.
            if(!(in_array($numAleatorio, $arr["carton$i"]))) { 
                $arr["carton$i"][$contNumeros]= $numAleatorio;
                $contNumeros++;
            }
        }
    } 
}

//bien
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

//bien
function mostrarCartonGanador($arr) {
	//el foreach coje el carton directamente, y ese carton tiene numeros, 
    //y cada indice del array será un número.
    echo "<table border=1>";
    echo "<tr>";
    foreach($arr as $indice=> $numero) {
        echo "<td>$numero</td>";
    }
    echo "</tr>";
    echo "</table>";
    echo "<br>";
}

//bien
function comprobarGanador($arr,$numerosSacados,&$ganador) { 
    foreach($arr as $numeroCarton=> $carton) {
        //Si array_diff devuelve un array vacío es porque 
        //todos los valores están en el array (significa que ha ganado).
        if(array_diff($carton,$numerosSacados)==array()) {
            $ganador= true;
            echo "El $numeroCarton está completo.<br>";
            mostrarCartonGanador($carton);
            //var_dump($carton);
        }
    }
}

//bien
function mostrarBolasBombo($numerosSacados) {
    for($i=0;$i<count($numerosSacados);$i++) {
        $imagenBola= $numerosSacados[$i].".PNG";
        echo "<img src='../ImagenesBolas/".$imagenBola."' width='40px' border='.5'>"; 
        
        //Estas condiciones las puse para que fuese pasando a la siguiente línea 
        //cada 10 bolas, simplemente para que se viese mejor.
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
}

//bien
function jugar($jugador1,$jugador2,$jugador3,$jugador4) {
    $numerosSacados= array();
    $ganador= false;
    while(!$ganador&&count($numerosSacados)<61) {
        //COMPROBAMOS SI LOS NÚMEROS ALEATORIOS QUE VAN SALIENDO COINCIDEN CON LOS DEL CARTÓN
        $numAleatorio= random_int(1,60);
        if(!(in_array($numAleatorio,$numerosSacados))) {
            array_push($numerosSacados,$numAleatorio);

            comprobarGanador($jugador1,$numerosSacados,$ganador);
            comprobarGanador($jugador2,$numerosSacados,$ganador);
            comprobarGanador($jugador3,$numerosSacados,$ganador);
            comprobarGanador($jugador4,$numerosSacados,$ganador);
        }
    }
    
    /*PARA CONTROLAR SI NO HUBIESE GANADOR.
    if(!$ganador)
	    echo "No hay ningún ganador"."<br>";*/

    //MOSTRAMOS LOS NÚMEROS QUE HAN SALIDO DEL BOMBO.
    echo "<h3>NÚMEROS QUE HAN SALIDO DEL BOMBO</h3>";

    mostrarBolasBombo($numerosSacados);
}
?>