<HTML>
<HEAD> <TITLE> Funciones Definidas por Usuario </TITLE> </HEAD>

<BODY>
<?php
 
 /* Además, de las funciones predefinidas de las que ya hemos utilizado algunas de ellas, PHP
  permite definir funciones propias:
  
	- Función es bloque sentencias que puede ser usada múltiples ocasiones dentro programa
    - Función no se ejecutará cuando se carga la página, únicamente se ejecutará cuando se invoque
	- Función proporcionan modularidad, portabilidad, facil mantenimiento ....
	
 */

 /* Sintaxis: 
    function nombreFuncion() {
    codigo funcion;
	} 
 */
 
 function escribirMensaje($mensaje) 
 {
    echo $mensaje."<BR><BR>";
 }
 
 escribirMensaje("Esta funcion recibe un valor y lo muestra por pantalla");

 function sumarNumeros($num1,$num2)
 { 
	echo $num1,"+",$num2,"=",$num1+$num2."<BR><BR>";
 }
 
 sumarNumeros(16,240);
 
  function sumarNumeros2($num1,$num2)
 { 
	return $num1+$num2;
 }
 
 $numero1=100;
 $numero2=24;
 $resultado=sumarNumeros2($numero1,$numero2);
 echo $numero1,"+",$numero2,"=",$resultado,"<BR><BR>";
 
 
//PRUEBA PASO POR REFERENCIA.
$numero1= 10;
$numero2= 5;

/*Al hacer paso por referencia los cambios que hagamos en la función también afectarán 
a la variable de afuera que se haya metido como parámetro*/
function multiplicar($numero1,&$numero2) {
    $multiplicar= $numero1*$numero2;
    $numero2++;

    echo $multiplicar;
    
    //return $multiplicar;
}

multiplicar($numero1,$numero2);
echo "<br>";

//devolverá 6.
echo $numero2;

echo "<br>";

//si lo volvemos a hacer el resultado cambiará, cogerá el nuevo valor de la
//variable $numero2.
multiplicar($numero1,$numero2);
echo "<br>";

//devolverá 6.
echo $numero2;

?>
</BODY>
</HTML>