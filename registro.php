<?php 

# Llamamos el archivo de conexión a la BD
	require_once('conex1.php');



	# Si el usuario dio clic al botón de Registrar

	if(isset($_POST[ 'btnRegistrar'])) { 
		$userReg= $_POST['userReg'];
		$userRFC= $_POST['userRFC'];
		$userC= $_POST['userC'];
		$pass1 = $_POST['pass1'];
		$pass2= $_POST['pass2'];
		
		if($pass1== $pass2){
			$insert = "INSERT INTO datos( nombre, email, rfc, contraseña) VALUES ('$userReg ','$userC ','$userRFC' ,'$pass1')";

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

		$buscarUser = "SELECT id_user, user, pass FROM user 
						WHERE user='{$userLogin}' AND pass='{$passLogin}';";



		$resultadoUser = $conexion->query($buscarUser);
		$user = $resultadoUser->fetch_object();

		 	


		if($resultadoUser->num_rows > 0) { 
		# Usuario registrado
			$_SESSION['id'] = $user->id_user;
			header('location: datos.php');
			echo "Usu nuevo. <br />";
		} else {
		# Usuario no registrado (o puso mal sus datos) 
		echo "Usuario o contraseña incorrectos. Intente de nuevo. <br />";
		}
	}





 ?>