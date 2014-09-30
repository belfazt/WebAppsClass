<head>
	<title>Disco BarChart</title>
</head>
<body>
<?php
//error_reporting(E_ALL);
//header("Content-type: text/xml");
$string = file_get_contents("data.json");
$info = json_decode($string,true);
$info = $info['data'];
//print_r ($info);
function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}



echo "<svg width='100%' height='90%' version='1.1' xmlns='http://www.w3.org/2000/svg'>";

for ($i=0; $i <count($info) ; $i++) { 
	$width = 60;
	$pos = $i*$width;
	$height = $info[$i]*10;
	$y = 500 - $height;
	$color = "#".random_color();
	echo "<rect x='$pos' y='$y' width='$width' height='$height' style='fill:$color;stroke-width:3;stroke:rgb(0,0,0)' />";	
}
echo "</svg>";
//header('Location: barChart.php');



?>
<script type="text/javascript">
	window.location.reload();

</script>
</body>