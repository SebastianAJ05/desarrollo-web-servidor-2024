<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de multiplicar</title>
    <?php include("../detector_errores.php"); ?>
    <link rel="stylesheet" type="text/css" href="./estilos.css">
</head>
<body>
<!-- 
    Crear un formulario que reciba un número. Se mostrará
    en una tabla HTML la tabla de multiplicar de ese número.
    Ejemplo:

    3 x 1 = 3
    3 x 2 = 6
    3 x 3 = 9
    ...
    3 x 10 = 30
-->
    <form action="" method="post">
        <label for="maximo">Tabla del: </label>
        <input type="text" name="numero" id="numero"
         placeholder="Introduce el número de la tabla">
        <input type="submit" value="Multiplicar">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $numero = (int)$_POST["numero"];
        for ($i=1; $i <= 10; $i++) { 
            echo "<p>" . $numero . " x " . $i . " = " . ($numero*$i) . "</p>";
        }
    }
        ?>

    <table>
        <thead>
            <th>
                Número
            </th>
            <th>Por</th>
            <th>Es</th>
        </thead>
        <tbody>

    <?php
    for ($i=1; $i <= 10; $i++) { 
        echo "<tr>";
        echo "<td>$numero</td>";
        echo "<td>$i</td>";
        echo "<td>" . ($numero * $i). "</td>";
        echo "</tr>";
    }
    ?>
        </tbody>
    </table>
</body>
</html>