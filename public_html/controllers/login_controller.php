<?php
session_start();
if(isset($_SESSION["email"])){
	$email = $_SESSION["email"];
}else{
	$email = "";
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Login Music Network</title>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

	<link rel="stylesheet" href="../css/estilosIndex.css">
	<link rel="stylesheet" href="../css/barraNavegacion.css">
</head>
<body>
	<?php
	include_once "../views/barraNavegacion.html";
	include_once "../views/login_view.html";
	?>
	<script src="validateForms.js"></script>
	<script src="inicioSesion.js"></script>
</body>
</html>