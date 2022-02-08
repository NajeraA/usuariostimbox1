<?php  
	#Declaramos las variables de la conexion a la BD
	$host = "localhost"; #Direccion IP del servidor de la BD
	$user = "root"; #Direccion IP del servidor de la BD
	$pass = ""; #Contraseña del usuario
	$bd = "registro"; #Nombre de la BD

	#creamos un objeto llamado $conexion instaciando la clase MySQLi
	$conexion = new mysqli($host, $user, $pass, $bd);

	#Si ocurre un error de conexion a la BD
	if($conexion->connect_errno) {
		echo "Error de conexion:" . $conexion->connect_error;
		echo "<br /> ";
	}
?>