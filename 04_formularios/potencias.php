<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potencias</title>
    <?php include("../detector_errores.php"); ?>
</head>
<body>
<!--CREAR UN FORMULARIO QUE RECIBA DOS NÚMEROS:
BASE Y EXPONENTE

SE MOSTRARÁ EL RESULTADO DE ELEVAR LA BASE AL EXPONENTE

EJEMPLOS:

2 ELEVADO A 3 = 8 -> 2 x 2 x 2
3 elevado a 2 = 9 -> 3 x 3
2 ELEVADO A 1  = 2
2 ELEVADO A 0 = 1   -->

    <form action="" method="post">
    <label>Base:</label>
    <input type="text" name="base">
    <label>Exponente:</label>
    <input type="text" name="exponente">
    <input type="submit" value="Calcular">
    </form>
    <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
            
    }
    $base = (int)$_POST["base"];
    $exponente = (int)$_POST["exponente"];
    //$res = $base**$exponente;
    
    //echo "<p>$res</p>";
    $res = 1;
    for ($i=0; $i < $exponente; $i++) { 
        $res *= $base;
    }
    echo "<p>$res</p>";
    
    ?>
</body>
</html>