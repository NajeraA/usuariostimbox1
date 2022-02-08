
<?php 

require_once('conex1.php');
session_start();
if(!isset($_SESSION['id'])){ 
	header ("index1.php");
}

$iduser = $_SESSION['id'];

$sql = " SELECT id, nombre FROM datos2 where id = '$iduser'";
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();



 ?>
<!DOCTYPE html>
<html>
<head> 
	<title>Opciones</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">

</head>
<body>


	<header>
		<header>
    <section>
      <h1>Configuracion</h1>
      <div class="conte">
        <a href="cuenta.php">Actulizar datos</a>
        <a href="palindromo.php">Algoritmo</a>
        <a href="verusuarios.php">usuarios</a>
         <a href="index1.php">cerrar sesion</a>
      </div>

	</header>
	


</body>
</html>