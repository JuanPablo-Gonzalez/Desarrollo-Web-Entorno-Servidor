<?php
    require 'funciones_altaNN.php';
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombreDpto= limpiar($_POST["nombreDpto"]);
    }

    $conn= crearConexion();
    echo "<br>";

    //Hacemos la select.
    $ultimoCodigo = $conn->query("SELECT max(cod_dpto) FROM departamento");

    //RECOGEMOS EL VALOR DE LA SELECT USANDO UN ARRAY, Y OBTENEMOS EL ÚLTIMO CÓDIGO.
    $valores= mysqli_fetch_array($ultimoCodigo);
    $ultimoNumero= "$valores[0]";
    
    //RECOGEMOS EL ÚLTIMO VALOR Y LE SUMAMOS UNO.
    $siguienteNumero= intval(substr($ultimoNumero,1,3))+1;

    //HACEMOS EL INSERT.
    $sql = "INSERT INTO departamento (cod_dpto,nombre_dpto) VALUES 
    ('D".str_pad($siguienteNumero,3,"0",STR_PAD_LEFT)."','$nombreDpto')";

    if (mysqli_query($conn, $sql)) {
        echo "Se ha insertado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);

    /*mysqli_fetch_array: Obtiene una fila de resultados como un array 
    asociativo, numérico, o ambos*/
?>