<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <?php include("../detector_errores.php"); ?>
    <link rel="stylesheet" type="text/css" href="./estilos.css">
</head>
<body>
    <?php
    $productos = [
        ["Nintendo Switch", 300],
        ["Playstation 5 Slim", 450],
        ["Playstation 5 Pro", 800],
        ["XBOX Series S", 300],
        ["XBOX Series X", 400]
    ];

    /**
     * 
     * Añadir al array una tercera columna que será el stock,
     * y se generará con un rand entre 0 y 5
     * 
     * Mostrar en una tabla cada producto junto a su precio y su stock
     * 
     * Crear un formulario donde se introduzca el nombre de un producto, y:
     * 
     *  - Si hay stock, decimos que está disponible y su precio
     *  - Si no hay, decimos que está agotado
     */

    for ($i=0; $i < count($productos); $i++) { 
        $productos[$i][2] = rand(0,5);

    }
    ?>

    <table>
        <caption>Productos</caption>
        <thead>
            <th>Consola</th>
            <th>Precio</th>
            <th>Stock</th>
        </thead>
        <tbody>
    <?php

        foreach($productos as $producto){
            list($consola, $precio, $stock) = $producto;
            echo "<tr>";
            echo "<td>$consola</td>";
            echo "<td>$precio</td>";
            echo "<td>$stock</td>";
            echo "</tr>";
        }

    ?>
        </tbody>
    </table>

    <br><br><br>

    <form action="" method="post">
        <label for="producto">Busca el producto: </label>
        <input type="text" name="producto" id="producto">
        <input type="submit" value="Buscar">
    </form>
    <?php

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $producto_buscado = $_POST["producto"];
            $encontrado = false;
            foreach ($productos as $producto) {
                list($consola, $precio, $stock) = $producto;
                if ($producto_buscado == $consola) {
                    if ($stock > 0) {
                        echo "<p>$producto_buscado está disponible tenemos $stock unidades en stock, y su precio es: $precio </p>";
                    }else{
                        echo "<p>$producto_buscado está agotado</p>";
                    }
                    $encontrado = true;
                    break;
                }
            }
            if (!$encontrado) {
                echo "<p>No se ha encontrado el producto: $producto_buscado</p>";
            }
        }

    ?>
</body>
</html>