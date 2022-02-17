<?php
    session_start();
    require_once 'funciones_epatin.php';
    $conexion= conexion();

    //Siempre se destruirá al volver al login, si ya existe.
    if(isset($_SESSION["usuario"])) {
        //setcookie('PHPSESSID', '', time() - 86400, '/');
        //session_destroy();
        unset($_SESSION["usuario"]);
    }
    
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
    <title>Login Page - EPATIN</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
 </head>
      
<body>
    <h1>ALQUILER PATINETES ELÉCTRICOS</h1>

    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Login Usuario</div>
		<div class="card-body">
		
		<form id="" name="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="card-body">
		
		<div class="form-group">
			Email <input type="text" name="email" placeholder="email" class="form-control">
        </div>
		<div class="form-group">
			Clave <input type="password" name="password" placeholder="password" class="form-control">
        </div>				
        
		<input type="submit" name="submit" value="Login" class="btn btn-warning disabled">
        </form>
		
	    </div>
    </div>
    </div>
    </div>

</body>
</html>