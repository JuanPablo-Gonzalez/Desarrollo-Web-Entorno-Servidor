<?php
	$arr= array();
    
	$contNumeros=0;
    while($contNumeros<15) {
		$numAleatorio= random_int(1,60);
		if(!(in_array($numAleatorio,$arr))) {
			$arr[$contNumeros]= $numAleatorio;
			$contNumeros++;
		}
    }
    
    var_dump($arr);
    
    $contApariciones= 0;
	$numerosSacados= array();
	$ganador= false;
	
    while(!$ganador) {
      $numAleatorio= random_int(1,60);
	  if(!(in_array($numAleatorio,$numerosSacados))) {
		for($i=0;$i<count($arr);$i++) {
			if($arr[$i]==$numAleatorio) 
				$contApariciones++;
		}
		if($contApariciones==15) {
			$ganador= true;
    }
	  }
	  array_push($numerosSacados,$numAleatorio);
    }
	
    if($ganador) {
        echo "ganador";
    }
	
	var_dump($numerosSacados);
	
	/*
	$arr= array();
    
	$contNumeros=0;
    while($contNumeros<5) {
		$numAleatorio= random_int(1,10);
		if(!(in_array($numAleatorio,$arr))) {
			$arr[$contNumeros]= $numAleatorio;
			$contNumeros++;
		}
    }
    
    var_dump($arr);
    
    $contApariciones= 0;
	$numerosSacados= array();
	$ganador= false;
	
    while(!$ganador) {
      $numAleatorio= random_int(1,10);
	  if(!(in_array($numAleatorio,$numerosSacados))) {
		for($i=0;$i<count($arr);$i++) {
			if($arr[$i]==$numAleatorio) 
				$contApariciones++;
		}
		if($contApariciones==5) {
			$ganador= true;
    }
	  }
	  array_push($numerosSacados,$numAleatorio);
    }
	
    if($ganador) {
        echo "ganador";
    }
	
	var_dump($numerosSacados);
	*/
?>