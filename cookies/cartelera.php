<?php
	$link = mysqli_connect("localhost","superuser","bestpass123","cartelera") or die ("Error ".mysqli_error($link));

	$query = "SELECT * FROM peliculas";

	$result = $link->query($query);

	
	$peliculas = array();
	
	while ($fila = (mysqli_fetch_assoc($result))) {
		
		$id = $fila["ID"]; 
		$query = "SELECT HORARIO FROM horario WHERE id = $id"; 
		$result2 = $link->query($query); while( $row = (mysqli_fetch_assoc($result2)) ){ 
			$fila["horarios"][] = $row["HORARIO"]; 
		} 
		$peliculas["peliculas"][]= $fila;
	}
	
	$f = json_encode($peliculas, JSON_PRETTY_PRINT);

	echo $f;
?>