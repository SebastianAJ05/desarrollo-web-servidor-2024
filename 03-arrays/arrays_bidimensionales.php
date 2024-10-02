<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays bidimensionales</title>
    <link href="./estilos.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php

        $videojuegos = [
            ["FIFA 24", "Deportes",70],
            ["Dark Souls","Soulslike",50],
            ["Hollow Knight","Plataformas",30]
        ];
        ?>

        <table>
            <thead>
                <th>Título</th>
                <th>Género</th>
                <th>Precio</th>
            <tbody>
    <?php
        foreach($videojuegos as $videojuego){
            list($titulo, $categoria, $precio) = $videojuego;
            echo "<tr>";
            echo "<td>Título: $titulo</td>";
            echo "<td>Género: $categoria</td>";
            echo "<td>Precio: $precio</td>";
            echo "</tr>";
        }
    ?>
        </tbody>
    </table>
</body>
</html>