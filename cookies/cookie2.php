<?php

if (!isset($_COOKIE["usuario"])){
	echo "No hay galleta";
}
else {
	echo $_COOKIE["usuario"];	
}

?>