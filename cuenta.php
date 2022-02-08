<?php 

#Mandamos llamar el archivo de conexion a la BD
    require_once('conex1.php');


#Si el usuario da clic al boton ACTULI
    if(isset($_POST['btnActuliza'])){


        $correo = $_POST['correo'];
        $nombre = $_POST['nombre'];
        $rfcn= $_POST['rfcn'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];


        #Construimos un comando UPDATE con los datos del formulario


          if($pass1== $pass2){
                $updateEmp ="UPDATE datos2 SET nombre=['$nombre'],rfc=['$rfcn='],contraseña=['$pass1'] WHERE email=$correo";

                #Mandamos la consulta a BD
        if($conexion->query($updateEmp)){
            #Si la consulta se ejecuta exitosamente en la BD
            echo "Usuario EDITADO CORRECTAMENTE <br />";

        }else{
            #Si la consulta falla
            echo $conexion->error . "<br />";
            echo $updateEmp . "<br />";


            }

        }
    }


         #Mandamos la consulta a la BD y almacenamos el resultado en una variable PHP







 ?>
<html>
<head> 
	<title>Mis datos</title>
    <h1> Mis datos</h1> 
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">

	<form action="#" method="GET">
    <input type="hidden" name="correo" value="<?php echo $emp->email; ?>"></br>
    Nuevo nombre: <input type="string" name="nombre"></br>
    Nuevo RFC: <input type="string" name="rfcn"></br>
   Editar contraseña contraseña: <input type="password" name="pass1"></br>
   Confirmar nueva contraseña: <input type="password" name="pass2"><br />
    <input type="submit" name="btnActulizar" value="Actulizar"><br />

    </form>
</head>
<body>
<br /><br />

<h1> Nuevos datos</h1> 
<form action="#" method="POST">

	Direccion:<input type="text" name="userD"><br />
	Telefono:<input type="text" name="userT"><br />
	Website:<input type="text" name="userW"><br />
	Cambiar contraseña: <input type="text" name="userNpass1"><br />
    <input type="submit" name="btnActulizar1" value="Actulizar1"><br />

<header>
		<header>
    <section>
      <div class="conte">
        <a href="opciones.php"-> volver al menu</a>
       
      </div>

	</header>

	
</form>



</body>
</html>