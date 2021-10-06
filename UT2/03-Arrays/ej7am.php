<?php

$matrizAlumnos= array(
	"Juan"=> array("Lengua"=>random_int(1,10),"Mates"=>random_int(1,10),"Historia"=>random_int(1,10),"Inglés"=>random_int(1,10)),
	"Ana"=> array("Lengua"=>random_int(1,10),"Mates"=>random_int(1,10),"Historia"=>random_int(1,10),"Inglés"=>random_int(1,10)),
	"Pepe"=> array("Lengua"=>random_int(1,10),"Mates"=>random_int(1,10),"Historia"=>random_int(1,10),"Inglés"=>random_int(1,10)),
	"Sofía"=> array("Lengua"=>random_int(1,10),"Mates"=>random_int(1,10),"Historia"=>random_int(1,10),"Inglés"=>random_int(1,10)),
	"Ramón"=> array("Lengua"=>random_int(1,10),"Mates"=>random_int(1,10),"Historia"=>random_int(1,10),"Inglés"=>random_int(1,10)),
	"Marta"=> array("Lengua"=>random_int(1,10),"Mates"=>random_int(1,10),"Historia"=>random_int(1,10),"Inglés"=>random_int(1,10)),
	"Pedro"=> array("Lengua"=>random_int(1,10),"Mates"=>random_int(1,10),"Historia"=>random_int(1,10),"Inglés"=>random_int(1,10)),
	"Jaime"=> array("Lengua"=>random_int(1,10),"Mates"=>random_int(1,10),"Historia"=>random_int(1,10),"Inglés"=>random_int(1,10)),
	"Lucía"=> array("Lengua"=>random_int(1,10),"Mates"=>random_int(1,10),"Historia"=>random_int(1,10),"Inglés"=>random_int(1,10)),
	"Raquel"=> array("Lengua"=>random_int(1,10),"Mates"=>random_int(1,10),"Historia"=>random_int(1,10),"Inglés"=>random_int(1,10)),
);

//para añadir un nuevo alumno.
//$matrizAlumnos["Alex"]= array("Lengua"=>random_int(1,10),"Mates"=>random_int(1,10),"Historia"=>random_int(1,10),"Inglés"=>random_int(1,10));

//PARA MOSTRAR LA MATRIZ.
foreach($matrizAlumnos as $nombreAlumno => $datos) {
	echo "Notas ".$nombreAlumno.":";
	echo "<br>";
	foreach($datos as $asignatura => $nota) {
		echo $asignatura."= ".$nota." - ";
		//echo "<br>";
	}
	echo "<br>";
	echo "<br>";
}

//CONSEGUIMOS LA NOTA MÁS ALTA.
$notaAlta= 0;
$alumnoNotaAlta= "";
$asignaturaElegida= "Mates";

foreach($matrizAlumnos as $nombreAlumno => $datos) {
	foreach($datos as $asignatura => $nota) {
		if($asignatura==$asignaturaElegida) { //Conseguimos que solo se fije en la asignatura elegida.
			if($nota>$notaAlta) {
				$notaAlta= $nota; //Si la nota es más alta, recogerá la nota y el nombre de ese alumno.
				$alumnoNotaAlta= $nombreAlumno;
			}
		}
	}
}
//faltaría indicar que en caso de ser la misma nota incluyese a los dos.

echo "El alumno con la nota más alta en ".$asignaturaElegida." es ".$alumnoNotaAlta." con un ".$notaAlta;
echo "<br>";

//NOTA MÁS BAJA.
$notaBaja= 11;
$alumnoNotaBaja= "";
$asignaturaElegida= "Mates";

foreach($matrizAlumnos as $nombreAlumno => $datos) {
	foreach($datos as $asignatura => $nota) {
		if($asignatura==$asignaturaElegida) {
			if($nota<$notaBaja) {
				$notaBaja= $nota;
				$alumnoNotaBaja= $nombreAlumno;
			}
		}
	}
}

echo "El alumno con la nota más alta en ".$asignaturaElegida." es ".$alumnoNotaBaja." con un ".$notaBaja;
echo "<br>";

//MOSTAR NOTA MÁS BAJA DE UN ALUMNO.
$peorNotaAlumno= 11;
$nombreAlum= "Marta";
$nombreAsignatura;

foreach($matrizAlumnos as $nombreAlumno=> $datos) {
	if($nombreAlum==$nombreAlumno) { //Condicionamos a que solo entre si es el alumno buscado.
		foreach($datos as $asignatura=> $nota) {
			if($nota<$peorNotaAlumno) {
				$peorNotaAlumno= $nota;
				$nombreAsignatura= $asignatura;
			}
		}
	}
}

echo "La asignatura con menor nota de ".$nombreAlum." es ".$nombreAsignatura." con un ".$peorNotaAlumno;
echo "<br>";

//MEDIA POR MATERIA DE TODOS LOS ALUMNOS.
$nombreMateria= "Lengua";
$sumaNotas= 0;
$numAlumnos= 0; //variable que controlará el número de alumnos que hay, para luego dividir entre eso y sacar la media.

foreach($matrizAlumnos as $nombreAlumno=> $datos) {
	foreach($datos as $asignatura=> $nota) { //si el nombre de la materia coincide se suma.
		if($nombreMateria==$asignatura)
			$sumaNotas+= $nota;
	}
	$numAlumnos++;
}

echo "La media de la materia ".$nombreMateria." es ".$sumaNotas/$numAlumnos;
echo "<br>";

//PARA CAMBIAR EL VALOR DE UN ELEMENTO.
$matrizAlumnos["Marta"]["Lengua"]= 4;
//$matrizAlumnos["Juan"]= "David"; //mirar como cambiar el nombre de un índice.

foreach($matrizAlumnos as $nombreAlumno => $datos) {
	echo "Notas ".$nombreAlumno.":";
	echo "<br>";
	foreach($datos as $asignatura => $nota) {
		echo $asignatura."= ".$nota." - ";
		//echo "<br>";
	}
	echo "<br>";
	echo "<br>";
}

?>