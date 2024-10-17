<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Máximo</title>
    <?php include("../detector_errores.php"); ?>
</head>
<body>
<!-- CREAR CON NÚMEROS ALEATORIOS UN ARRAY CON NÚMEROS A VUESTRA 
 ELECCIÓN
 
 MOSTRAR DICHOS NÚMEROS DE LA FORMA QUE MÁS OS GUSTE
 
 CREAR UN FORMULARIO DONDE SE INTENTE INTRODUCIR EL MÁXIMO VALOR Y
 SE COMPRUEBE SI HAS ACERTADO-->
    <?php 
    $numeros = [1,5,3,9,20,15,22,11];
        for ($i=0; $i < count($numeros); $i++) { 
            echo $numeros[$i] . " ";
        }
    ?>
    <form action="" method="post">
        <label for="maximo">Máximo</label>
        <input type="text" name="numero" id="maximo"
         placeholder="Introduce el máximo">
        <input type="submit" value="Comprobar">
    </form>
    <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $numero = $_POST["numero"];
        $candidato = $numeros[0];
        for ($i=0; $i < count($numeros); $i++) { 
            if ($numeros[$i] > $candidato) $candidato = $numeros[$i];
        }
        $maximo = $candidato;

        if ($numero == $maximo) {
            echo "<h1>¡Has acertado! El máximo es $maximo</h1>";
        }else{
            echo "<h1>¡Fallaste! El máximo es $maximo</h1>";
        }
    }
    
    ?>
</body>
</html>