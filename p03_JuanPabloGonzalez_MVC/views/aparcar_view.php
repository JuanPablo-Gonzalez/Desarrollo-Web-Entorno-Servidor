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
		<div class="card-header">Menú Usuario - APARCAR PATINETE </div>
		<div class="card-body">
	  
	<!-- INICIO DEL FORMULARIO -->
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	
		<B>Bienvenido/a: <?php echo $_SESSION["usuario"]?></B>    <BR><BR>
		<B>Saldo Cuenta: <?php echo $_SESSION["saldo"]?></B>   <BR><BR>
				
			<B>PATINETES ALQUILADOS: </B><select name="patinetes" class="form-control">
				<?php mostrarPatinetesAlquilados(); ?>
			</select>
		<BR><BR>
		<div>
			<input type="submit" value="Aparcar Patinete" name="devolver" class="btn btn-warning disabled">
			<input type="submit" value="Volver" name="volver" class="btn btn-warning disabled">
		</div>		
	</form>
	<!-- FIN DEL FORMULARIO -->
	<a href ="../views/login_view.php">Cerrar Sesion</a>
	
  </body>
</html>