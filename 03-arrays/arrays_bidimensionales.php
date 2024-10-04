<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays bidimensionales</title>
    <link href="./estilos.css" rel="stylesheet" type="text/css">
    <?php include("../detector_errores.php"); ?>
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
    $nuevo_videojuego = ["Throne and Liberty", "MMO", 0];
    array_push($videojuegos, $nuevo_videojuego);

    $_titulo = array_column($videojuegos, 0);
    array_multisort($_titulo, SORT_ASC, $videojuegos);
    # SORT_ASC para orden ascendiente
    # SORT_DES para orden descendiente

    


        foreach($videojuegos as $videojuego){
            list($titulo, $categoria, $precio) = $videojuego;
            echo "<tr>";
            echo "<td>$titulo</td>";
            echo "<td>$categoria</td>";
            echo "<td>$precio</td>";
            echo "</tr>";
        }
    ?>
        </tbody>
    </table>
    <table>
            <thead>
                <th>Título</th>
                <th>Género</th>
                <th>Precio</th>
            <tbody>
    <?php
    # Ej rapido 1: Ordenar por el precio de más barato a más caro
    # Ej rápido 2: Ordenar por la categoría en orden alfabético inverso
    
    //Ej 1

    $_precio = array_column($videojuegos, 2);
    array_multisort($_precio, SORT_ASC, $videojuegos);



    foreach($videojuegos as $videojuego){
        list($titulo, $categoria, $precio) = $videojuego;
        echo "<tr>";
        echo "<td>$titulo</td>";
        echo "<td>$categoria</td>";
        echo "<td>$precio</td>";
        echo "</tr>";
    }

    ?>

    <table>
            <thead>
                <th>Título</th>
                <th>Género</th>
                <th>Precio</th>
            <tbody>

    <?php
    //Ej 2

    $_categoria = array_column($videojuegos, 1);
    array_multisort($_categoria, SORT_DESC, $videojuegos);



    foreach($videojuegos as $videojuego){
        list($titulo, $categoria, $precio) = $videojuego;
        echo "<tr>";
        echo "<td>$titulo</td>";
        echo "<td>$categoria</td>";
        echo "<td>$precio</td>";
        echo "</tr>";
    }
    ?>
        </tbody>
    </table>
</body>
</html>