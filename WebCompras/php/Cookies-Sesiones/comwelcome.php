<?php 
   //Se recuperan los valores de la sesión.
   require 'funcionesCookiesSesiones.php';
   session_start();
?>

<html>
   <head>
      <title>Bienvenido</title>
   </head>
   
   <body>
		<!-- Se muestra el nombre del usuario recuperado de una variable de sesión -->
		<h1>Bienvenido <?php echo $_SESSION['nombre']."-NIF: ".$_SESSION['nif']; ?></h1> 
		<!-- INICIO DEL FORMULARIO -->
		<form action="welcome.php" method="post">
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
	

?>