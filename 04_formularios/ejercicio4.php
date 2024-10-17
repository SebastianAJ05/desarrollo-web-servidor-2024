<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
    <?php include("../detector_errores.php"); ?>
</head>
<body>
<form action="" method="post">
        <label>Cantidad de grados a convertir: </label>
        <input type="text" name="c_grados">
        <br><br><label>De grados </label>
        <select name="grados_usu" id="grados_usu">
            <option value="CELSIUS">CELSIUS</option>
            <option value="KELVIN">KELVIN</option>
            <option value="FAHRENHEIT">FAHRENHEIT</option>
        </select><label> a grados </label>
        <select name="grados_conv" id="grados_conv">
            <option value="CELSIUS">CELSIUS</option>
            <option value="KELVIN">KELVIN</option>
            <option value="FAHRENHEIT">FAHRENHEIT</option>
        </select>
        <input type="submit" value="Convertir">
        <br><br>
    </form>
<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $grados = (int)$_POST["c_grados"];
        define("CELSIUS_KELVIN", 274.15);
        define("CELSIUS_FARENHEIT", 33.8);
        define("CELSIUS_CELSIUS", 1);
        define("KELVIN_KELVIN", 1);
        define("KELVIN_FARENHEIT", -457.87);
        define("KELVIN_CELSIUS", -272.15);
        define("FARENHEIT_KELVIN", 255.928);
        define("FARENHEIT_FARENHEIT", 1);
        define("FARENHEIT_CELSIUS", -17.2222);

        $grados_usu = $_POST["grados_usu"];
        $grados_conv = $_POST["grados_conv"];

        $grados_convertidos = 0;

        if($grados_usu == "CELSIUS" &&  $grados_conv == "KELVIN")  $grados_convertidos = (float)$grados*CELSIUS_KELVIN;
        elseif($grados_usu == "CELSIUS" &&  $grados_conv == "FARENHEIT")  $grados_convertidos = (float)$grados*CELSIUS_FARENHEIT;
        elseif($grados_usu == "CELSIUS" &&  $grados_conv == "CELSIUS")    $grados_convertidos = (float)$grados*CELSIUS_CELSIUS;
        //-----------------------------CELSIUS-------------------------
        elseif($grados_usu == "KELVIN" &&  $grados_conv == "KELVIN")    $grados_convertidos = (float)$grados*KELVIN_KELVIN;
        elseif($grados_usu == "KELVIN" &&  $grados_conv == "FARENHEIT") $grados_convertidos = (float)$grados*KELVIN_FARENHEIT;
        elseif($grados_usu == "KELVIN" &&  $grados_conv == "CELSIUS")    $grados_convertidos = (float)$grados*KELVIN_CELSIUS;
        //-----------------------------KELVIN-------------------------
        elseif($grados_usu == "FARENHEIT" &&  $grados_conv == "KELVIN")    $grados_convertidos = (float)$grados*FARENHEIT_KELVIN;
        elseif($grados_usu == "FARENHEIT" &&  $grados_conv == "FARENHEIT") $grados_convertidos =  (float)$grados*FARENHEIT_FARENHEIT;
        elseif($grados_usu == "FARENHEIT" &&  $grados_conv == "CELSIUS") $grados_convertidos = (float)$grados*FARENHEIT_CELSIUS;
        //-----------------------------FARENHEIT-------------------------
        
        echo "<p>$grados grados en grados $grados_usu equivalen a $grados_convertidos grados en grados $grados_conv</p>";
    }

?>
</body>
</html>