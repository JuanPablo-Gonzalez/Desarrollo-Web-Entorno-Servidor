<?php
    session_start();
    require_once 'funciones_epatin.php';
    $conexion= conexion();

    if(!isset($_SESSION["usuario"]))
		header("location: elogin.php");
    
    //Poner session_start en la función, cuando se haya validado la session.
    //y poner aquí la función a ejecutar porque debe estar antes del html.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email= limpiar($_POST["email"]);
        $clave= limpiar($_POST["password"]);

        login($conexion,$email,$clave);
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
		<div class="card-header">Menú Usuario - OPERACIONES </div>
		<div class="card-body">


		<B>Bienvenido/a: <?php echo $_SESSION["usuario"]?></B>    <BR><BR>
		<B>Saldo Cuenta: <?php echo $_SESSION["saldo"]?></B>   <BR><BR>
	  
		<!--Formulario con enlaces -->
		<ul>
			<li><a href="ealquilar.php">Alquilar Patin</a></li>
			<li><a href="econsultar.php">Consultar Alquileres</a></li>
			<li><a href="eaparcar.php">Aparcar Patin</a></li>  		 
		</ul>

			<!-- Borraremos la cookie (destruirla e iremos al login)-->
		  <BR><a href="elogin.php">Cerrar Sesión</a>
		  
	</div>  
	  
	  
     
   </body>
   
</html>


