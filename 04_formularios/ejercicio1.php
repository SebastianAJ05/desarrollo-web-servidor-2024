<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <?php include("../detector_errores.php"); ?>
</head>
<body>
<!--EJERCICIO 1: Realiza un formulario que 
reciba 3 números y devuelva el mayor de ellos. -->
    <form action="" method="post">
        <label>Número 1: </label>
        <input type="Number" name="numero1">
        <br><br>
        <label>Número 2: </label>
        <input type="Number" name="numero2">
        <label>Número 3: </label>
        <input type="Number" name="numero3">
        <input type="submit" value="Comprobar">
        <br><br>
    </form>
    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $num1 = $_POST["numero1"];
            $num2 = $_POST["numero2"];
            $num3 = $_POST["numero3"];
            $numeros = [$num1, $num2, $num3];
            sort($numeros);
            echo "El mayor de los números es: " . $numeros[count($numeros)-1];
        }
    
    
    ?>

</body>
</html>