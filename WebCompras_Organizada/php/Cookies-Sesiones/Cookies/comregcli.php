<?php
    require_once 'funcionesCookiesSesiones.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nif= limpiar($_POST["nif"]);
        $nombre= limpiar($_POST["nombre"]);
        $apellido= limpiar($_POST["apellido"]);
        $cp= limpiar($_POST["cp"]);
        $direccion= limpiar($_POST["direccion"]);
        $ciudad= limpiar($_POST["ciudad"]);

        registroCliente($nif,$nombre,$apellido,$cp,$direccion,$ciudad);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Registro clientes</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <form name="formulario" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        <label for="nif">NIF:</label>
        <input type="text" name="nif"> <br>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre"> <br>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido"> <br>

        <label for="cp">cp:</label>
        <input type="text" name="cp"> <br>

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion"> <br>

        <label for="ciudad">Ciudad:</label>
        <input type="text" name="ciudad"> <br><br>

        <input type="submit" value="enviar">
        <input type="reset" value="borrar">
    </form>   
</body>
</html>