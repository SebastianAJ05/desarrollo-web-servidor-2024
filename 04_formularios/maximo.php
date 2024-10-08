<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Máximo</title>
</head>
<body>
<!-- CREAR CON NÚMEROS ALEATORIOS UN ARRAY CON NÚMEROS ELEGIDOS POR TI

MOSTRAR DICHOS NÚMEROS DE LA FORMA QUE MÁS OS GUSTE

CREAR UN FORMULARIO DONDE SE INTENTE INTRODUCIR EL MÁXIMO
VALOR Y SE COMPRUEBE SI HAS ACERTADO
-->
<form action="" method="post">
    <input type="text" name="mayor">

    <input type="submit" value="Adivinar">
</form>
<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){

}
$mayor_usu = $_POST["mayor"];

$numeros_aleatorios= [4,7,2,897,34,765,3534,574,52345, 0];
$mayor = $numeros_aleatorios[0];
foreach($numeros_aleatorios as $numero_aleatorio){
    if ($numero_aleatorio > $mayor) {
        $mayor = $numero_aleatorio;
    }
}
foreach ($numeros_aleatorios as $numero_aleatorio) {
    echo $numero_aleatorio . "<br>";
}

if ($mayor_usu == $mayor) {
    echo "<h1>HAS ACERTADO</h1>";
}else{
    echo "<h1>HAS FALLADO</h1>";
}

?>

</body>
</html>