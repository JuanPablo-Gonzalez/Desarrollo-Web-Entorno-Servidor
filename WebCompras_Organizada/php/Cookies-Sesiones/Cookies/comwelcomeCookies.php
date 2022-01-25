<?php 
   //Se recuperan los valores de la sesión.
   require 'funcionesCookiesSesiones.php';

   //Si la cookie no existe se enviará al formulario de login.
   if(!isset($_COOKIE["nif"]))
		header("location: comlogincliCookies.php");
?>

<html>
   <head>
      <title>Bienvenido</title>
   </head>
   
   <body>
		<!-- Se muestra el nombre del usuario recuperado de una variable de sesión -->
		<h1>Bienvenido <?php echo $_COOKIE['nombre']." -NIF: ".$_COOKIE['nif']; ?></h1> 
		<!-- INICIO DEL FORMULARIO -->
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<div>
				<input type="submit" value="Comprar Productos" name="comprar">
				<input type="submit" value="Consulta Compras" name="consultar">
				<input type="submit" value="Cerrar Sesión" name="cerrar">
			</div>		
		</form>
		<!-- FIN DEL FORMULARIO -->
   </body>
</html>

<?php 
	if($_SERVER["REQUEST_METHOD"]=="POST") {
		if(isset($_POST["comprar"])) {
			header("location: comprocli.php");
		}
		else if(isset($_POST["consultar"])){
			header("location: comconscli.php");
		}
		else if(isset($_POST["cerrar"])){
			//Borramos la cookie.
            //Al borrarla sin poner la barra me daba error, no la borraba bien pero cuando la incluí sí.
			setcookie("nombre", "",time()-3600,"/"); 
            setcookie("nif", "",time()-3600,"/");
			header("location: comlogincliCookies.php");
		}
	}
?>