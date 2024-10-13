<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <?php include("../detector_errores.php"); ?>
</head>
<body>
<!--EJERCICIO 3: Realiza un formulario que reciba dos números
y devuelva todos los números primos dentro de ese rango
(incluidos los extremos).-->
<form action="" method="post">
<label>Número 1: </label>
        <input type="Number" name="numero1">
        <br><br>
        <label>Número 2: </label>
        <input type="Number" name="numero2">
        <input type="submit" value="Comprobar">
        <br><br>
</form>
    <?php 

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $num1 = $_POST["numero1"];
        $num2 = $_POST["numero2"]; 
        $primos = "";
        $esPrimo = TRUE; 
        for ($i=$num1; $i <= $num2; $i++) { 
            $esPrimo = TRUE;
            for ($j=2; $j < $i; $j++) { 
                
                if($i % $j == 0) {
                    $esPrimo = FALSE;
                    continue;
                }
            }
            if($esPrimo) $primos = $primos . " $i ";
        }
        echo "<p>Números primos entre $num1 y $num2:$primos</p>";
    }
    
    
    ?>
</body>
</html>