<html>
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Bienvenido a EPATIN</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
 </head>
   
 <body>
    <h1>Servicio de ALQUILER PATINETES ELÉCTRICOS</h1> 

    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Menú Usuario - OPERACIONES </div>
		<div class="card-body">

		<B>Bienvenido/a: <?php echo $_SESSION["usuario"]?></B>    <BR><BR>
		<B>Saldo Cuenta: <?php echo $_SESSION["saldo"]?></B>   <BR><BR>
	  
		<!--Formulario con enlaces -->
		<ul>
			<li><a href="../controllers/alquilar_controller.php">Alquilar Patin</a></li>
			<li><a href="../controllers/consultar_controller.php">Consultar Alquileres</a></li>
			<li><a href="../controllers/aparcar_controller.php">Aparcar Patin</a></li>  		 
		</ul>

			<!-- Borraremos la cookie (destruirla e iremos al login)-->
		  <BR><a href="../views/login_view.php">Cerrar Sesión</a>
		  
	</div>  
   </body>
</html>