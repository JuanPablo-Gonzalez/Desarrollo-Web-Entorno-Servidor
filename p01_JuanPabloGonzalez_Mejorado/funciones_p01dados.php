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
                $imagenBola= $numDado.".PNG";
                echo "<td><img src='images/".$imagenBola."' width='40px' border='.5'></td>";
            }
            echo "</tr>";
            echo "</table>";
            echo "<br>";
        }
    }

    //EN ESTA FUNCIÓN LO QUE HAREMOS SERÁ SUMAR LOS DADOS DE CADA JUGADOR, MOSTRAR SU SUMA, Y ADEMÁS
    //DECIDIR QUIÉNES SON LOS GANADORES O GANADOR.
    function comprobarGanador($jugadores,$numDados) {
        //Lo primero que haremos será obtener el número más alto que salga de sumar los dados de un jugador.
        $mayorSuma= 0;
        $contGanadores= 0;
        $arrSumas= array();

        foreach($jugadores as $numeroJugador=> $jugador) {
            $sumaDados= 0;
            $numerosIguales= false;
            $resultadoUnique= array_unique($jugadores["$numeroJugador"]);

            if(count($resultadoUnique)==1&&$numDados>2)
                $sumaDados= 100;
            else {
                foreach($jugador as $indiceDado=> $numDado) {
                    $sumaDados+= $numDado;
                }
            }

            //Mostramos las sumas de los dados de cada jugador.
            echo "Suma dados de ".$numeroJugador."= ".$sumaDados."<br>";
            if($sumaDados>$mayorSuma) {
                $mayorSuma= $sumaDados;
            } 
            
            //metemos las sumas en un array.
            array_push($arrSumas,$sumaDados);
        }

        echo "<br>";
        //var_dump($arrSumas);

        //Luego volveremos a recorrer los jugadores, y si la suma de sus dados coincide con el número
        //que ha salido, entonces será ganador. Usamos el array de sumas con un contador para hacer 
        //hacer ver que cada posicion de la suma le pertenece a una jugador.
        $contSuma= 0;
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