<?php


	if(isset($_GET["dato"])) {

		$dato=$_GET["dato"];
		if($dato=="d1"){

			echo "http://upload.wikimedia.org/wikipedia/commons/a/ae/Ripe_guava.jpg";

		} else {

			echo "nada";

		}

	}


?>