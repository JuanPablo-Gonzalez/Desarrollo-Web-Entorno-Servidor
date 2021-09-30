<?php
$arrEdadAlumnos= array("Juan"=>"21","Ana"=>"18","Marcos"=>"20","Alicia"=>"23","Pedro"=>"19");

//a: mostralos usando un bucle.
foreach($arrEdadAlumnos as $nombre => $edad) {
	echo $nombre." tiene ".$edad." años";
	echo "<br>";
}
//fin apartado a.

//b: mostrar valor de la segunda posición.
$segundaPosicion= next($arrEdadAlumnos); //mostrará el segundo valor, ya que es el siguiente al primero.
echo "<br>";
echo "El valor de la segunda posición es: ".$segundaPosicion; 
//fin apartado b.

//c: avanzar uno y mostrar el valor.
$terceraPosicion= next($arrEdadAlumnos); //al volver a aplicar next, se pasa al siguiente valor (al tercero, ya que antes estaba en el segundo).
echo "<br>";
echo "El valor de la tercera posición es: ".$terceraPosicion; 
//fin apartado c.

//d: colocar en última posición y mostrar valor.
$ultimaPosicion= end($arrEdadAlumnos); //muestra el último valor.
echo "<br>";
echo "El valor de la última posición es: ".$ultimaPosicion; 
//fin apartado d.

//e
asort($arrEdadAlumnos); //con esta función ordenamos el array.
echo "<br>";
echo "<br>";
echo "Array ordenado: <br>";

foreach($arrEdadAlumnos as $nombre => $edad) {
	echo $nombre." tiene ".$edad." años";
	echo "<br>";
}
//fin e.

/*
next() se comporta como current(), con una diferencia. 
Avanza el puntero interno un lugar a delante antes de devolver el valor del elemento. 
Esto significa que devuelve el siguiente valor del array 
y avanza el puntero interno del array un lugar.

current() - Devuelve el elemento actual en un array
end() - Establece el puntero interno de un array a su último elemento
prev() - Rebobina el puntero interno del array
reset() - Establece el puntero interno de un array a su primer elemento
each() - Devolver el par clave/valor actual de un array y avanzar el cursor del array

asort — Ordena un array y mantiene la asociación de índices
*/

?>