<?php 
   //Se recuperan los valores de la sesión.
   require 'funcionesCookiesSesiones.php';
   session_start();

   if(!isset($_SESSION["nif"]))
		header("location: comlogincli.php");
?>

<html>
   <head>
      <title>Bienvenido</title>
   </head>
   
   <body>
		<!-- Se muestra el nombre del usuario recuperado de una variable de sesión -->
		<h1>Bienvenido <?php echo $_SESSION['nombre']."-NIF: ".$_SESSION['nif']; ?></h1> 
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
		$compra= limpiar($_POST["comprar"]);
		$consultar= limpiar($_POST["consultar"]); 
		$cerrar= limpiar($_POST["cerrar"]); 

		if($compra){
			header("location: comprocli.php");
		}
		else if($consultar){
			header("location: comconscli.php");
		}
		else if($cerrar){
			// remove all session variables
			session_unset();
			// destroy the session
			session_destroy();
			header("location: comlogincli.php");
		}
	}
?>