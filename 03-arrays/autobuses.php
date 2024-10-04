<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autobuses</title>
    <link href="./estilos.css" rel="stylesheet" type="text/css">
    <?php include("../detector_errores.php"); ?>
</head>
<body>
    <?php
    # Origen, Destino, Duración (min), Precio(€)
    $autobuses = [
        ["Málaga", "Ronda",90,10],
        ["Churriana","Málaga",20,3],
        ["Málaga", "Granada",120,15],
        ["Torremolinos","Málaga",30,3.5]
    ];

    /**
     * Ejercicio 1: Añadir dos líneas de autobús
     * 
     * Ejercicio 2: Ordenar por duración de más duración a menos
     * 
     * Ejercicio 3: Mostrar las líneas en una tabla
     */

    # Ej 1
    array_push($autobuses, ["Plaza Bailén", "Carlinda", 20, 1.5]);
    array_push($autobuses, ["M.de la Rosa", "Ciudad Jardín", 30, 1.5]);

    #Ej 2

    $_duracion = array_column($autobuses, 2);
    array_multisort($_duracion, SORT_DESC, $autobuses);

    #Ej 3

    ?>
    <table>
        <thead>
            <th>Origen</th>
            <th>Destino</th>
            <th>Duración (min)</th>
            <th>Precio (€)</th>
        <tbody>

    <?php

    $_origen = array_column($autobuses, 0);
    $_duracion = array_column($autobuses, 2);
    array_multisort($_origen, SORT_ASC, $_duracion, SORT_ASC,$autobuses);
    foreach($autobuses as $autobus){
        list($origen, $destino, $duracion, $precio) = $autobus;
        echo "<tr>";
        echo "<td>$origen</td>";
        echo "<td>$destino</td>";
        echo "<td>$duracion</td>";
        echo "<td>$precio</td>";
        echo "</tr>";
    }


    /**
     * Ejercicio 4: Insertar 3 autobuses más
     * 
     * Ejercicio 5: Ordenar, primero por el origen, luego por el destino
     * 
     * Ejercicio 6: Ordenar, primero por la duración, luego por el precio
     * 
     */

    # Ej 4

    array_push($autobuses,["Málaga","Casabermeja", 25, 5]);
    array_push($autobuses, ["Antequera","Colmenar", 45, 8]);
    array_push($autobuses,["Torrox","Nerja",15 , 6]);

    # Ej 5

    $_origen = array_column($autobuses, 0);
    $_destino = array_column($autobuses, 1);

    array_multisort($_origen, SORT_ASC, $_destino, SORT_ASC,$autobuses);

    ?>
    <table>
        <thead>
            <th>Origen</th>
            <th>Destino</th>
            <th>Duración (min)</th>
            <th>Precio (€)</th>
        <tbody>

    <?php
    foreach($autobuses as $autobus){
        list($origen, $destino, $duracion, $precio) = $autobus;
        echo "<tr>";
        echo "<td>$origen</td>";
        echo "<td>$destino</td>";
        echo "<td>$duracion</td>";
        echo "<td>$precio</td>";
        echo "</tr>";
    }

    ?>

        </tbody>
    </table>
    <?php
    # Ej 6

    $_duracion = array_column($autobuses, 2);
    $_precio = array_column($autobuses, 3);

    array_multisort($_duracion, SORT_ASC, $_precio, SORT_ASC,$autobuses);
    ?>
    <table>
        <thead>
            <th>Origen</th>
            <th>Destino</th>
            <th>Duración (min)</th>
            <th>Precio (€)</th>
        <tbody>

    <?php
    foreach($autobuses as $autobus){
        list($origen, $destino, $duracion, $precio) = $autobus;
        echo "<tr>";
        echo "<td>$origen</td>";
        echo "<td>$destino</td>";
        echo "<td>$duracion</td>";
        echo "<td>$precio</td>";
        echo "</tr>";
    }

    ?>

        </tbody>
    </table>

    <?php 
    
    for ($i=0; $i < count($autobuses); $i++) { 
        $autobuses[$i][4] = "X";
    }
    print_r($autobuses);
    ?>
    <table>
        <thead>
            <th>Origen</th>
            <th>Destino</th>
            <th>Duración (min)</th>
            <th>Precio (€)</th>
            <th>Tipo</th>
        <tbody>

    <?php
    array_push($autobuses,["Madrid","Barcelona", 180, 20, ""]);
    foreach($autobuses as $autobus){
        list($origen, $destino, $duracion, $precio, $tipo) = $autobus;
        echo "<tr>";
        echo "<td>$origen</td>";
        echo "<td>$destino</td>";
        echo "<td>$duracion</td>";
        echo "<td>$precio</td>";
        if ($duracion <= 30) {
            $tipo = "Corta distancia";
        }
        elseif ($duracion > 30 && $duracion <= 120) {
            $tipo = "Media distancia";
        }else{
            $tipo = "Larga distancia";
        }
        echo "<td>$tipo</td>";
        echo "</tr>";
    }
    ?>
        </tbody>
    </table>
</body>
</html>