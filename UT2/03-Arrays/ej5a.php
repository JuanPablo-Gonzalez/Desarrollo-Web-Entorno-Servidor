<?php

$array1= array("Bases Datos","Entornos Desarrollo","Programación");
$array2= array("Sistemas Informáticos","FOL","Mecanizado");
$array3= array("Desarrollo Web ES","Desarrollo Web EC","Despliegue","Desarrollo Interfaces","Inglés");

//apartado a.
$arrayApartadoA= array();

for($i=0; $i<count($array1);$i++) { //metemos los valores del primer array.
	$arrayApartadoA[$i]= $array1[$i];
}

$longitudArrA= count($arrayApartadoA); //variable que regoge la longitud del nuevo array.

/*En este punto el valor de $longitudArrA será 3, y como las posiciones del array 
empiezan por 0, el valor 3 en realidad será la posición 4 del nuevo array.
Por lo tanto el primer valor del array 2 se colocará en la posición 4 del nuevo array, 
y se irá incrementando para rellenar el nuevo array correctamente.*/

for($i=0; $i<count($array2);$i++) { //metemos los valores del segundo array.
	$arrayApartadoA[$longitudArrA]= $array2[$i];
	$longitudArrA++;
}

for($i=0; $i<count($array3);$i++) { //metemos los valores del tercer array.
	$arrayApartadoA[$longitudArrA]= $array3[$i];
	$longitudArrA++;
}

for($i=0; $i<count($arrayApartadoA);$i++) { //mostramos el array completo.
	echo $arrayApartadoA[$i].", ";
}
//fin apartado a.
?>