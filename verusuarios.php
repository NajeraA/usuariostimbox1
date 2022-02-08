<?php
    require_once('conex1.php');

    #Si el usuario elimina a un empleado
    if(isset($_GET['id'])){
        $delete="DELETE FROM datos2
                WHERE id={$_GET['id']};";

        #Mandamos la consulta a la BD
        if($conexion->query($delete)){
            echo "Empleado Eliminado Correctamente! <br />";
        }else{
        #Si la consulta falla
            echo $conexion->error . "<br />";
            echo $delete . "<br />";

        }
    }

    $buscarDeptos="SELECT id,nombre
    FROM datos2
    ORDER BY nombre;";
    $resultadoDeptos = $conexion->query($buscarDeptos);

    if(isset($_POST['btnAgregar'])){
        $correo1=$_POST['correo1'];
        $nombre=$_POST['nombre'];
        $direccion=$_POST['direccion'];
        $telefono=$_POST['telefono'];
        $Website=$_POST['Website'];
        $rfc=$_POST['rfc'];
        $pass1 = $_POST['pass1'];
        $pass2= $_POST['pass2'];
        

        if(isset($_POST['btnAgregar'])){
        if($pass1== $pass2){
        $insertarEmp = "INSERT INTO datos2( nombre, rfc, correo,pass,direccion,telefono,web) VALUES ('$nombre','$rfc','$correo1' ,'$pass1','$direccion','$telefono','$Website')";
        if($conexion->query($insertarEmp)){
            echo "Empleado agregado correctamente!";
            echo "<br />";
        }else{
            echo "ERROR " . $conexion->error;
            # Si el usuario no se inserta 
                echo "ERROR<br />";
            echo $insertarEmp . "<br />";
         }
        }   
    }
    }

    $verUsuarios="SELECT id,nombre,rfc,correo, pass, direccion,telefono,web FROM datos2 WHERE 1";
    $resultadoEmp = $conexion->query($verUsuarios);

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Usuarios</title>
        <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    <body>
    <h1>AGREGAR Usuario</h1>
    <form action="#" method="POST"> 
       
        Nombre: <input type="vachar" name="nombre"required></br>
        Correo: <input type="vachar" name="correo1"required> </br>
        RFC: <input type="vachar" name="rfc"required> </br>
        Direccion: <input type="vachar" name="direccion"required> </br>
        telefono: <input type="int" name="telefono"required> </br>
        Website: <input type="vachar" name="Website"required> </br>
        Contraseña: <input type="password" name="pass1"required><br />
        Confirmar contraseña: <input type="password" name="pass2"required><br /> 
        usuario:         
        <select name="deptoE">
        <?php while($dept = $resultadoDeptos->fetch_object()) { 
        ?>
        <option value="<?php echo $dept->idDepto; ?>">
            <?php echo $dept->nombre; ?>
        </option>   
    
        <?php } ?>
        </select>
        </br>
        <input type="submit" name="btnAgregar" value="Agregar">
    </form>
    <h1>Lista usuarios</h1>  
    <table>
    <tr>
        <td>id</td>
        <td>CORREO</td>
        <td>NOMBRE</td>
        <td>RFC</td>
        
        <td>Creado por</td>
        <td>Direccion</td>
        <td>Telefono</td>
        <td>Website</td>
       
      
       
        <td></td>
        <td></td>
    </tr>  
    <tr>
    <?php while($emp = $resultadoEmp->fetch_object()) { 
    ?>
    <tr>
        <td><?php echo $emp->id; ?></td>
        <td><?php echo $emp->correo; ?></td>
        <td><?php echo $emp->nombre; ?></td>
        <td><?php echo $emp->rfc; ?></td>
        <td><?php echo $emp->id; ?></td>
        <td><?php echo $emp->direccion; ?></td>
        <td><?php echo $emp->telefono; ?></td>
        <td><?php echo $emp->web; ?></td>
      
        

       
        <td><a href="editar_usuario.php?i=<?php echo $emp->id; ?>">Editar</a></td>
        <td><a href="verusuarios.php?id=<?php echo $emp->id; ?>">Eliminar</a></td>
    </tr>
    <?php } ?>
    </tr>  
    </table>

    <a href="opciones.php"->Volver al menu</a>
    </body>
</html>