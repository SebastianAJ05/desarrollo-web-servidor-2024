<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edades</title>
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
        
        $nombre = $_POST["nombre"];
        $edad = (int)$_POST["edad"];

        if ($edad < 18) {
            echo $nombre . ", eres menor de edad";
        }elseif($edad >= 18 && $edad < 65){
            echo $nombre . ", eres mayor de edad";
        }else{
            echo $nombre . ", te has jubilado ya";
        }
        
    ?>
</body>
</html>