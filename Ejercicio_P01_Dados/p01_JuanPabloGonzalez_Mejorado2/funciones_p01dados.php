<?php
    /*Juan Pablo González*/

    function limpiar($variable) {
        $variable = trim($variable);
        $variable = stripslashes($variable);
        $variable = htmlspecialchars($variable);

        return $variable;
    }

    //Esta función crea los jugadores y mete los dados al mismo tiempo.
    function crearJugadoresDados(&$arr,$jugador1,$jugador2,$jugador3,$jugador4,$numDados) {
        $arrJugadores= array($jugador1,$jugador2,$jugador3,$jugador4);

        for($j=0;$j<4;$j++) {
            $arr["$arrJugadores[$j]"]= array();
            for($i=0;$i<$numDados;$i++) {
                $numAleatorio= random_int(1,6);
                $arr["$arrJugadores[$j]"][$i]= $numAleatorio;
            } 
        }
    }

    //CON ESTA FUNCIÓN CONSEGUIMOS MOSTRAR EL ARRAY DE JUGADORES.
    function mostrarJugadores($jugadores) {
        foreach($jugadores as $numeroJugador=> $jugador) {
            echo "<table border=1>";
            echo "<tr>";
            //EN LA PRIMERA CELDA DE CADA FILA IRÁ SU NOMBRE. LUEGO SUS DADOS.
            echo "<td>$numeroJugador</td>";
            foreach($jugador as $indiceDado=> $numDado) {
                $imagenDado= $numDado.".PNG";
                echo "<td><img src='images/".$imagenDado."' width='40px' border='.5'></td>";
            }
            echo "</tr>";
            echo "</table>";
            echo "<br>";
        }
    }

    //Con esta función comprobamos si todos los números de los dados son iguales.
    function numerosIguales($jugador) {
        $numerosIguales= false;
        $resultadoUnique= array_unique($jugador);

        if(count($resultadoUnique)==1)
            $numerosIguales= true;

        return $numerosIguales;
    }

    //En esta función sumamos los dados, mostramos la suma,
    //y creamos el array de sumas que nos servirá para operar con él luego.
    function obtenerSumas($jugadores) {
        $arrSumas= array();

        foreach($jugadores as $numeroJugador=> $jugador) {
            $sumaDados= 0;

            //Si la función que comprueba todos los números iguales es true se pone la suma a 100,
            //si no se hace la suma ed todos los núemeros.
            if(numerosIguales($jugadores["$numeroJugador"])==true)
                $sumaDados= 100;
            else {
                foreach($jugador as $indiceDado=> $numDado) {
                    $sumaDados+= $numDado;
                }
            }
            //Metemos las sumas en un array.
            array_push($arrSumas,$sumaDados);
        }

        return $arrSumas;
    }

    function mostrarSumas($jugadores) {
        $arrSumas= obtenerSumas($jugadores);
        $contSuma= 0;

        foreach($jugadores as $numeroJugador=> $jugador) {
            //Mostramos las sumas de los dados de cada jugador.
            echo "Suma dados de ".$numeroJugador."= ".$arrSumas[$contSuma]."<br>";
            $contSuma++;
        }
    }

    //Con esta función obtenemos el número de suma más alto. Que nos
    //servirá para obtener el ganador en la función comprobarGanador().
    function obtenerSumaMayor($jugadores) {
        $arrSumas= obtenerSumas($jugadores);
        $mayorSuma= max($arrSumas);

        return $mayorSuma;
    }

    //Aquí comprobaremos los ganadores.
    function comprobarGanador($jugadores) {
        $mayorSuma= obtenerSumaMayor($jugadores);
        $arrSumas= obtenerSumas($jugadores);
        $contGanadores= 0;
        $contSuma= 0;

        echo "<br>";

        //Luego volveremos a recorrer los jugadores, y si la suma de sus dados coincide con el número
        //que de la suma mayor, entonces será ganador. Usamos el array de sumas con un contador para hacer 
        //hacer ver que cada posicion de la suma le pertenece a un jugador.
        foreach($jugadores as $numeroJugador=> $jugador) {
            if($arrSumas[$contSuma]==$mayorSuma) {
                echo "GANADOR: $numeroJugador <br>";
                $contGanadores++;
            }
            $contSuma++;
        }

        echo "<br>NÚMERO GANADORES: $contGanadores";
    }
?>