<?php

function fecha_hora()
{
   $fecha=gmdate("d/m/Y h:i:s");
   return $fecha;
}

//al hacer return habrá que guardar el valor en una variable.
$fechaHoy= fecha_hora();

echo "Hoy es ".$fechaHoy;

//HAREMOS UNA FUNCIÓ QUE MUESTRE SI UNA UNA LETRA
//SE ENCUENTRA EN UNA CADENA.
$cadena= "Hola que tal";
$letra= "q";

echo "<br>";
echo "<br>";
function encontrarLetra($cadena,$letra) {
   $contIteraciones=0;
   $encontrado= false;

   while($contIteraciones<strlen($cadena)&&!$encontrado) {
      if($letra==$cadena[$contIteraciones])
         $encontrado= true;

         $contIteraciones++;
   }

   echo $cadena."<br>";
   if($encontrado)
      echo "la letra ".$letra." aparece";
   else 
      echo "la letra ".$letra." no aparece";
}

encontrarLetra($cadena,$letra);
   echo "<br>";
encontrarLetra("muy bien","o");

//LA MISMA FUNCIÓN CON RETURN. PARA PROBAR.
//EN EL CASO DE ESTA MEJOR COMO LA PRIMERA OPCIÓN.
echo "<br>";
echo "<br>";
function encontrarLetraReturn($cadena,$letra) {
   $contIteraciones=0;
   $encontrado= false;

   while($contIteraciones<strlen($cadena)&&!$encontrado) {
      if($letra==$cadena[$contIteraciones])
         $encontrado= true;

         $contIteraciones++;
   }

   return $encontrado;
}

$validar= encontrarLetraReturn("buenos días","í");

if ($validar==true)
   echo "la letra está";
else 
   echo "la letra no está";

?>