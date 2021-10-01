<?php

$datosInditex= array("precio"=>"31.780","variacion"=>"-0.13%","var."=>"-0.04€","volumenTitulos"=>"475495","volumenEuros"=>"15027985.74");

foreach($datosInditex as $nombreDato => $valor) {
    echo $nombreDato . "= " . $valor;
    echo "<br>";
}

?>