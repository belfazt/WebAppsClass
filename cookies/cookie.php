<?php
	setcookie("pais",$_POST["pais"],time()+60*60);
	setcookie("language",$_POST["language"],time()+60*60);
	setcookie("lastmovie",$_POST["lastmovie"],time()+60*60);
	setcookie("audio",$_POST["audio"],time()+60*60);
	
	
	//Must be called before sending any other content to the client
?>
