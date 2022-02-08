<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>polindromos</title>

    <h1>Ingrese las palabras</h1>

    <fieldset>
       <legend>configure el N de palabras</legend> 
    <form method="post" action="palindromo.php"> 
    <input type="text" name="n">
    <input type="submit" name="" value="generar">
    </form>
    </fieldset>


    <form action="generar.php" method="POST">
    <?php  if(isset($_POST['n'])){ ?> 
        <?php for ($i=1; $i <= $_POST['n']; $i++) {?>
            <input type="text" name="palabras[]" placeholder="palabra"><br>
            <?php  }  ?>
            <?php  }  ?>

            <input type="submit" name="procesar"><br>

        </form>
   <div class="conte">
        <a href="opciones.php">Regresar a opciones</a>   
      </div>

</body>
</html>