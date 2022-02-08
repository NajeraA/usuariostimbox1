<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>



<?php 	
echo " polindromos";

echo '<pre>';
print_r($_POST);
echo "<br><br>";

$vector1 = $_POST['palabras'];
$pos = sizeof($vector1);

$i=0;

while ($i<= $pos) {


	echo $vector1[$i];
	$palabra = $vector1[$i];

	$tam_texto = strlen($palabra) - 1;
	$salida ='';


	for ($c=$tam_texto; $c>=0; $c--) { 
		$salida .= $palabra[$c];
	}

	if ($salida == $palabra) {
		echo" Es palindromo  pos:".$i."<br> ";
	}else{

		echo" no Es palindromo  pos:".$i."<br> ";
	}
	$i=$i+1;
}


 ?>
    <div class="conte">
        <a href="opciones.php">Regresar a opciones</a>   
      </div>


 </body>
</html>
