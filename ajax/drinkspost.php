<?php


if(isset($_POST["dato"])) {

	$dato=$_POST["dato"];
	if($dato=="d1"){

		echo "http://upload.wikimedia.org/wikipedia/commons/a/ae/Ripe_guava.jpg";

	} else {

		echo "nada";

	}

}


?>