<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>IP</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <form name="formulario" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        
        <h1>IPs</h1>

        <label for="notacionDecimal">Notación decimal</label> 
        <input type="text" name="notacionDecimal"> <br>

        <br>

        <input type="submit" value="enviar">
        <input type="reset" value="borrar">
    </form>   
</body>

<?php 

require 'funciones_ip.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $notacionDecimal= limpiar($_POST["notacionDecimal"]);
}

convertirBinario($notacionDecimal);
?>
</html>