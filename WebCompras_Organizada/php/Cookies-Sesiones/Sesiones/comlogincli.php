<?php
    require_once 'funcionesCookiesSesiones.php';
    
    //Poner session_start en la función, cuando se haya validado la session.
    //y poner aquí la función a ejecutar porque debe estar antes del html.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre= limpiar($_POST["nombre"]);
        $clave= limpiar($_POST["clave"]);

        loginCliente($nombre,$clave);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login clientes</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <form name="formulario" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre"> <br>

        <label for="clave">Clave:</label>
        <input type="text" name="clave"> <br>

        <input type="submit" value="enviar">
        <input type="reset" value="borrar">
    </form>  
</body>
</html>