<?php
    /*Juan Pablo González*/

    require 'funciones_p01dados.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre1= limpiar($_POST["nombre1"]);
        $nombre2= limpiar($_POST["nombre2"]);
        $nombre3= limpiar($_POST["nombre3"]);
        $nombre4= limpiar($_POST["nombre4"]);
        $numDados= limpiar($_POST["numdados"]);
    }

    echo "<h3>RESULTADO JUEGO DADOS</h3>";

    //Si no hay 4 jugadores, o el número de dados es incorrecto, no se ejecutarán las funciones.
    if($nombre1==""||$nombre2==""||$nombre3==""||$nombre4=="")
        echo  "Número de jugadores incorrecto";
    else if($numDados==""||$numDados>10||$numDados<1) {
        echo "Número de dados incorrecto";
    } else {
        //haremos una matriz jugador con los 4 jugadores, cada jugador tendrá un array 
        //con el número de dados especificado.
        $jugadores= array();

        //creamos los jugadores y sus dados.
        crearJugadoresDados($jugadores,$nombre1,$nombre2,$nombre3,$nombre4,$numDados);
        //var_dump($jugadores);

        //mostramos los jugadores y sus dados en una tabla.
        mostrarJugadores($jugadores);

        //Mostramos las sumas de los dados de cada jugador.
        mostrarSumas($jugadores);

        //mostramos la suma de los dados de cada jugador y decidimos ganador.
        comprobarGanador($jugadores); 
    }
?>