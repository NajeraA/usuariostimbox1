
<?php
    #Mandamos llamar el archivo de conexion a la BD
    require_once('conex1.php');

    #Si el usuario da clic al boton Editar
    if(isset($_POST['btnEditar'])){


         $clave = $_POST['clave'];
        $nombre1 = $_POST['nombre1'];
        $userRFC= $_POST['userRFC'];
        $userD = $_POST['userD'];
        $userT = $_POST['userT'];
        $userW = $_POST['userW'];
        $userNpass1 = $_POST['userNpass1'];
        $userNpass2= $_POST['userNpass2'];

        #Construimos un comando UPDATE con los datos del formulario

            $sqlrfc = "SELECT id FROM datos2 WHERE rfc ='$userRFC'";
            $resultadouser= $conexion->query($sqlrfc);
            $filarfc= $resultadouser->num_rows;

            if ($filarfc > 0) {
            echo "<script>
                alert('El rfc ya existe');
                window.location = 'editar_usuario.php';
                </script>";
            }
        //else($userNpass1== $userNpass2){

            $updateEmp = "UPDATE datos1 
                        SET nombre='$nombre1',
                        rfc='$userRFC',
                        contraseña='$userNpass1',
                        direccion='$userD',
                        website='$userW'
                         WHERE id = 'clave';";
                    //= "UPDATE datos2 SET id=[value-1],nombre=[value-2],rfc=[value-3],pass=[value-4],direccion=[value-5],telefono=[value-6],web=[value-7],correo=[value-8],regristro=[value-9] WHERE 1":
        if($conexion->query($updateEmp)) {
             echo "EMPLEADO EDITADO CORRECTAMENTE <br />";
        }else{
            #Si la consulta falla
            echo $conexion->error . "<br />";
            echo $updateEmp . "<br />";


        }
    }
     $buscarDeptos="SELECT id, nombre
    FROM datos2
    ORDER BY nombre;";

    #Mandamos la consulta a la BD y almacenamos el resultado den una variable de PHP
    $resultadoDeptos = $conexion->query($buscarDeptos);

    if(isset($_GET['clave'])){
        $buscarEmp="SELECT id, nombre, rfc, direccion,telefono,web
        FROM datos2
        WHERE id = {$_GET['clave']};";

        $resultadoEmp = $conexion->query($buscarEmp);

        $emp1=$resultadoEmp->fetch_object();
        }

?>

 <!DOCTYPE html>
<html>
    <head>
        <title>Editar datos</title>
        <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    <body>
    <h1>Editar mis datos</h1>
    <form action="#" method="POST"> 
         <input type="hidden" name="clave" value="<?php echo $emp1->id; ?>"></br>
        Nombre: <input type="vachar" name="nombre1" value="<?php echo $emp1->id; ?>"></br>
        RFC: <input type="text" name="userRFC"><br />
        Direccion:<input type="text" name="userD"><br />
        Telefono:<input type="text" name="userT"><br />
        Website:<input type="text" name="userW"><br />
        Cambiar contraseña: <input type="password" name="userNpass1"><br />
        Confirmar nueva contraseña: <input type="password" name="userNpass2"><br />
        
        </select>
        </br>
        <input type="submit" name="btnEditar" value="Editar">
    </form>

    <br /><br />

    <header>
        <header>
    <section>
      <div class="conte">
        <a href="opciones.php">Regresar a opciones</a>   
      </div>

    </header>




</body>
</html>

