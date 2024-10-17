<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edades</title>
    <?php include("../detector_errores.php"); ?>
</head>
<body>
<!-- Crear un formulario que reciba dos valores: el nombre
 y la edad de una persona
 
 Si la persona tiene:
 < 18 años, se mostrará "X ES MENOR DE EDAD" (X es el nombre)
 >= 18 && 65, se mostrará "X ES MAYOR DE EDAD"
 >= 65, se mostrará "X SE HA JUBILADO"
 
 Hacer la lógica con la estructura MATCH-->

 <form action="" method="post">
    <label>Nombre:</label>
    <input type="text" name="nombre">
    <label>Edad:</label>
    <input type="text" name="edad">
    <input type="submit" value="Calcular">
</form>
    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            
        }
        $nombre = $_POST["nombre"];
        $edad = (int)$_POST["edad"];


        $resultado = match(true) {
            $edad >= 0 && $edad <= 18 => $nombre . ", eres menor de edad",
            $edad >= 18 && $edad < 65 => $nombre . ", eres mayor de edad",
            $edad >= 65 && $edad <= 120 => $nombre . ", te has jubilado ya",
            default => "Error"
            };

            echo "<p>$resultado</p>";
        
    ?>
</body>
</html>