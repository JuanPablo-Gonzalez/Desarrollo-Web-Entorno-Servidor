<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Calculadora</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <form name="formulario" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"></form>
        <label for="operando1">Operando1</label> 
        <input type="text" name="operando1"> <br>

        <label for="operando2">Operando2</label> 
        <input type="text" name="operando2"> <br><br>

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
       echo "<h1>"."CALCULADORA"."</h1>";

       $num1= $_POST["operando1"];
       $num2= $_POST["operando2"];
       $operacionElegida= $_POST["operacion"];
       $resultado= 0;
   
        if($operacionElegida=="suma") {
            $simboloOperacion= "+";
            $resultado= $num1+$num2;
        }
        else if($operacionElegida=="resta") {
            $simboloOperacion= "-";
            $resultado= $num1-$num2;
        }
        else if($operacionElegida=="producto") {
            $simboloOperacion= "*";
            $resultado= $num1*$num2;
        }
        else if($operacionElegida=="division") {
            $simboloOperacion= "/";
            $resultado= $num1/$num2;
        }
        
        echo "<label for='Operando1'>Operando 1: </label>";
        echo "<input type='text' name='Operando1' value='$num1'>";
        echo "<br>";

        echo "<label for='Operando1'>Operando 2: </label>";
        echo "<input type='text' name='Operando1' value='$num2'>";
        echo "<br>";
        echo "<br>";

        echo "Resultado operación: $num1 $simboloOperacion $num2 = $resultado";
    ?>
</body>
</html>