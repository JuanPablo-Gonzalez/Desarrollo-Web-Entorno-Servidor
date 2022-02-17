<?php
	session_start();
	include_once('funciones_epatin.php'); // Fichero de Funciones para pe_altaped.php
	$conexion= conexion();

	if(!isset($_SESSION["usuario"]))
		header("location: elogin.php");

	if ($_SERVER["REQUEST_METHOD"]=="POST") {
		// Limpiamos los parámetros
		$patin= limpiar($_POST["patinetes"]);

		if(isset($_POST["agregar"])) {
			agregarProductoCesta($patin);
		}
		else if(isset($_POST["alquilar"])){
			if(!empty($_SESSION["cesta"]))
				realizarAlquiler();
			else
				echo "Tu cesta está vacía";
		}
		else if(isset($_POST["vaciar"])){
			unset($_SESSION['cesta']);
			echo "La cesta se ha vaciado correctamente";
		}
	}

	cerrarConexion($conexion);
?>

<html>
   
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Bienvenido a EPATIN</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
 </head>
   
 <body>
    <h1>Servicio de ALQUILER PATINETES ELÉCTRICOS</h1> 

    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Menú Usuario - ALQUILAR PATINETES</div>
		<div class="card-body">
	  	  

	<!-- INICIO DEL FORMULARIO -->
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	
		<B>Bienvenido/a: <?php echo $_SESSION["usuario"]?></B>    <BR><BR>
		<B>Saldo Cuenta: <?php echo $_SESSION["saldo"]?></B>   <BR><BR>
		
		<B>PATINETES disponibles</B> <?php $fechaCompra= date("Y-m-d H:i:s"); echo $fechaCompra; ?> <BR>
		
			<select name="patinetes" class="form-control">
			<?php	
					$conexion= conexion();
					mostrarPatinetes($conexion);
					cerrarConexion($conexion);
				?>
			</select>
			
		
		<BR> <BR><BR><BR><BR><BR>
		<div>
			<input type="submit" value="Agregar a Cesta" name="agregar" class="btn btn-warning disabled">
			<input type="submit" value="Realizar Alquiler" name="alquilar" class="btn btn-warning disabled">
			<input type="submit" value="Vaciar Cesta" name="vaciar" class="btn btn-warning disabled">
		</div>		
	</form>
	<!-- FIN DEL FORMULARIO -->
  </body>
   
</html>