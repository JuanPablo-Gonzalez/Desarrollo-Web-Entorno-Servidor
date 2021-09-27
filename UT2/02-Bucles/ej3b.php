<?php 

$decimal= "48"; //solo la usaremos para mostrarlo en el echo.
$cociente= $decimal; //la usaremos para operar.
$base= "16";
$resto;
$hexadecimal= ""; //recogerá el resultado final.

if($cociente<16) 
	$hexadecimal= "F"; //si ya es menor que 16 será F.

while($cociente>=16) {
	$resto= $cociente%$base;
	
	if($resto==10) {
		$resto= "A";
	} else if($resto==11) {
		$resto= "B";
	} else if($resto==12) {
		$resto= "C";
	} else if($resto==13) {
		$resto= "D";
	} else if($resto==14) {
		$resto= "E";
	} else if($resto==15) 
		$resto= "F";
	
	$hexadecimal= $resto.$hexadecimal;
	
	$cociente= (int)($cociente/$base); //convertimos a entero para que no haya problema al elegir el número.
	
	//para la parte en la que coge el último cociente.
	if($cociente<16) {
		if($cociente==10) {
			$cociente= "A";
		} else if($cociente==11) {
			$cociente= "B";
		} else if($cociente==12) {
			$cociente= "C";
		} else if($cociente==13) {
			$cociente= "D";
		} else if($cociente==14) {
			$cociente= "E";
		} else if($cociente==15) 
			$cociente= "F";

		$hexadecimal= $cociente.$hexadecimal;
	}	
}

echo $hexadecimal;

?>