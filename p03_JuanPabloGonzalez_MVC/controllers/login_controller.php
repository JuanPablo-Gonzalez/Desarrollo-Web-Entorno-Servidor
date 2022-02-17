<?php
    session_start();
    
    require_once("views/login_view.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario= $_POST["email"];
        $clave= $_POST["password"];

        require_once("models/login_model.php");

        $correcto= login($conexion,$usuario,$clave);
        
        //Si es correcto se llamará al otro controller de inicio.
        if($correcto==true) {
            header("location: controllers/inicio_controller.php");
        }
    }
?>