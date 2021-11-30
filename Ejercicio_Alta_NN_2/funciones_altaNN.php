<?php

    function limpiar($variable) {
        $variable = trim($variable);
        $variable = stripslashes($variable);
        $variable = htmlspecialchars($variable);

        return $variable;
    }

    function crearConexion() {
        $servername = "localhost";
        $username = "root";
        $password = "rootroot";
        $dbname="empleadosnn"; 

        // Create connection
        $conn = mysqli_connect($servername, $username, $password,$dbname);

        //Check connection.
        if (!$conn)
            die("Fallo en la conexión: " . mysqli_connect_error());
        else
            echo "Conexión establecida.";

        return $conn;
    }

    /*PARA EJERCICIO 1*/
    function altaDeptAutonumerico($nombreDpto) {
        
        //CREA LA CONEXIÓN Y COMPRUEBA DIRECTAMENTE.
        $conn = crearConexion();
        echo "<br>";

        //Hacemos la select.
        $ultimoCodigo = $conn->query("SELECT max(cod_dpto) FROM departamento");

        //RECOGEMOS EL VALOR DE LA SELECT "CONVIRTIÉNDOLO" Y USANDO UN ARRAY, Y OBTENEMOS EL ÚLTIMO CÓDIGO.
        $valores= mysqli_fetch_array($ultimoCodigo);
        $ultimoNumero= "$valores[0]";
        
        //RECOGEMOS EL ÚLTIMO VALOR Y LE SUMAMOS UNO.
        $siguienteNumero= intval(substr($ultimoNumero,1,3))+1;

        //HACEMOS EL INSERT.
        $sql = "INSERT INTO departamento (cod_dpto,nombre_dpto) VALUES ('D".str_pad($siguienteNumero,3,"0",STR_PAD_LEFT)."','$nombreDpto')";

        if (mysqli_query($conn, $sql)) {
            echo "Se ha insertado correctamente";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }

    /*PARA EJERCICIO 2*/
    function mostrarSelect() {
        echo "<select name='departamentos'>";
            $mysqli= crearConexion();
            $query = $mysqli -> query ("SELECT nombre_dpto FROM departamento");
            while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="'.$valores[nombre_dpto].'">'.$valores[nombre_dpto].'</option>';
            }
        echo "</select>";
    }
?>