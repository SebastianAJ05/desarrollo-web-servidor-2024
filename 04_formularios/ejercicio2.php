<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <?php include("../detector_errores.php"); ?>
</head>
<body>
<!-- EJERCICIO 2: Realiza un formulario que reciba 3 números: a, b y c. 
 Se mostrarán  en una lista los múltiplos de c 
 que se encuentren entre a y b.

Por ejemplo, si a = 3, b = 10, c = 2

Los múltiplos de 2 entre 3 y 10 son: 4, 6, 8 y 10 -->
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
            $a = $_POST["numero1"];
            $b = $_POST["numero2"];
            $c = $_POST["numero3"];
            $multiplos = "";
            for ($i=1; $i <= ($b) ; $i++) { 
                if ($c * $i >= $a && $c * $i <= $b) {
                    if ($i * $c <= ($b - $c)) {
                        $multiplos = $multiplos . ($c*$i) . ", ";
                    }
                    else{
                        $multiplos = $multiplos . " y " . ($c*$i) ;
                    }
                }
            }
            echo "<p>Los núltiplos de $c entre $a y $b son: " . $multiplos . "</p>";
        }
    
    
    ?>
</body>
</html>