<?php

    require "funciones_fichero7.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ficheroOrigen= limpiar($_POST["ficheroOrigen"]);
        $ficheroDestino = limpiar($_POST["ficheroDestino"]);
        $operacion= limpiar($_POST["operacion"]);
    }
    var_dump($_POST);
    //si la variable está vacía, no se ejecutará la función.
    if(!comprobarVariableVacia($ficheroOrigen)) {
    //file_exists comprueba si una carpeta o directorio existen.
        //si el fichero existe se ejecutarán las funciones.
        if (file_exists($ficheroOrigen)) {
            //si carpeta de destino no existe se creará
            if(file_exists(dirname($ficheroDestino)))
                echo "La carpeta especificada existe. <br>";
            else {
                mkdir(dirname($ficheroDestino), 0777);
                echo "La carpeta".dirname($ficheroDestino)." se ha creado <br>";
            }
            //se ejecutará la opción seleccionada.
            if($operacion=="copiarFichero") 
                copiarFichero($ficheroOrigen,$ficheroDestino);
            else if($operacion=="renombrarFichero") 
                renombrarFichero($ficheroOrigen,$ficheroDestino);
            else if($operacion=="borrarFichero") 
                borrarFichero($ficheroOrigen);

        //si no existe se lanza el mensaje y no se ejecuta nada.
        } else {
            echo "El fichero $ficheroOrigen no existe";
        }
    }

?>