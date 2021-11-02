<?php
    function limpiar($variable) {
        $variable = trim($variable);
        $variable = stripslashes($variable);
        $variable = htmlspecialchars($variable);

        return $variable;
    }

    function comprobarVariableVacia($variable) {
        $vacio= false;

        if (empty($variable)) {
            echo 'ERROR, la variable'.$variable.' está vacía.'.'<br>';
            $vacio= true;
        }

        return $vacio;
    }

    function copiarFichero($ficheroOrigen,$ficheroDestino) {
        //con copy copiamos un fichero a otro, da igual si está ya creado el fichero o no.
        //la carpeta sí debe existir, pero eso lo controlamos en el otro php.
        copy($ficheroOrigen,$ficheroDestino);
        echo "El fichero se ha copiado correctamente";
    }

    function renombrarFichero($ficheroOrigen,$ficheroDestino) {
        //se puede renombrar un fichero o directorio, pero si ponemos un directorio distinto y luego
        //un fichero, lo que pasará es que se crea el directorio, y el fichero se traspasa a ese directorio con el nuevo nombre.
        rename($ficheroOrigen,$ficheroDestino);
        echo "El fichero se ha renombrado correctamente";
    }
    function borrarFichero($fichero) {
        //unlink sirve para borrar un fichero.
        unlink($fichero);
        echo "El fichero se ha borrado correctamente";
    }
?>