<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Calculadora</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <form name="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        
        <label for="operando1">Operando1</label> 
        <input type="text" name="operando1"> <br>
        <!--<span class="error">* <?php echo $numErr;?></span>-->

        <label for="operando2">Operando2</label> 
        <input type="text" name="operando2"> <br><br>
        <!--<span class="error">* <?php echo $numErr;?></span>-->

        <fieldset>
            <legend>Selecciona una operación</legend>
            <input type="radio" value="suma" name="operacion" /> Suma </br>
            <input type="radio" value="resta" name="operacion" /> Resta </br>
            <input type="radio" value="producto" name="operacion" /> Producto </br>
            <input type="radio" value="division" name="operacion" />  División </br>
        </fieldset>

        <br>

        <input type="submit" value="enviar">
        <input type="reset" value="borrar">
    </form>   

    <?php
        /*Juan Pablo González*/
        include 'funcion_calcular.php';

        //var_dump($_POST);

        echo "<h1>"."CALCULADORA"."</h1>";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num1 = test_input($_POST["operando1"]);
            $num2 = test_input($_POST["operando2"]);
            $operacionElegida = test_input($_POST["operacion"]);
        }

        /*
        if(!esNumero($_POST["operando1"]))
            $numErr = "No es un número";*/
            
        calcular($num1,$num2,$operacionElegida);
    ?>
</body>
</html>