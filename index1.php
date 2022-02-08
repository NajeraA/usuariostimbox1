<?php
	
	#habilitamos el uso de variables de sesion
	session_start();
if(!isset($_SESSION['id'])){ 
	header ("opciones.php");

}

	# Llamamos el archivo de conexión a la BD
	require_once('conex1.php');


	# Si el usuario dio clic al botón de Registrar

	if(isset($_POST[ 'btnRegistrar'])) { 
		$userReg= $_POST['userReg'];
		$userRFC= $_POST['userRFC'];
		$userC= $_POST['userC'];
		$pass1 = $_POST['pass1'];
		$pass2= $_POST['pass2'];

		// validaciones
			$sqluser = "SELECT id FROM datos2 WHERE correo ='$userC'";
			$sqlrfc = "SELECT id FROM datos2 WHERE rfc ='$userRFC'";
			$resultadouser= $conexion->query($sqluser);
			$filarfc= $resultadouser->num_rows;

		if ($filarfc > 0) {
		echo "<script>
				alert('El rfc ya existe');
				window.location = 'index1.php';
				</script>";
	}
	

		$filauser= $resultadouser->num_rows;
		if ($filauser > 0) {
		echo "<script>
				alert('El usuario ya existe');
				window.location = 'index1.php'
				</script>";

	}else{ 


			$insert = "INSERT INTO datos2 (nombre,rfc,correo,pass) VALUES ('$userReg','$userRFC','$userC','$pass1')";
				

			if($conexion->query($insert)) {
				# Si el usuario se inserta correctamente
				echo "Usuario registrado correctamente. Puedes iniciar sesión.<br />"; 
			} else {
				# Si el usuario no se inserta 
				echo "ERROR<br />";
				echo $insert . "<br />";
			}
		}
	}	
	



	#si el usuario dio click al boton de iniciar seccion
	if(isset($_POST['btnLogin'])) {
		

		$userLogin = $_POST['userLogin'];
		$passLogin = $_POST['passLogin'];

		$buscarUser = "SELECT  correo, pass FROM datos2
						WHERE correo='{$userLogin}' AND pass='{$passLogin}';";



		$resultadoUser = $conexion->query($buscarUser);
		$email = $resultadoUser->fetch_object();

		 	


		if($resultadoUser->num_rows > 0) { 
		# Usuario registrado
			$_SESSION['id'] = $correo->pass;
			header('location: opciones.php');
			echo "Usu nuevo. <br />";
		} else {
		# Usuario no registrado (o puso mal sus datos) 
		echo "Usuario o contraseña incorrectos. Intente de nuevo. <br />";
		}
	}




 ?>

<!DOCTYPE html>
<html>
<head> 
	<title>Inicio de Sesión</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>

<h1>Inicia Sesión</h1> 
<form action="#" method="POST">
	Correo: <input type="text" name="userLogin"required><br />
	Contraseña: <input type="password" name="passLogin"required><br /> 
	


	<input type ="submit" name="btnLogin" value="Iniciar Sesión"><br/>
</form>

<br /><br />

<h1> Regístro</h1> 
<form action="#" method="POST">
	Nombre: <input type="text" name="userReg"required><br /> 
	RFC: <input type="text" name="userRFC"required><br />
	Correo electronico:<input type="text" name="userC"required><br />
	Contraseña: <input type="password" name="pass1"required><br />
	Confirmar contraseña: <input type="password" name="pass2"required><br /> 
	<input type="submit" name="btnRegistrar" value="Registrar"><br />
</form>



</body>
</html>