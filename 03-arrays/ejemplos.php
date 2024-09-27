<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>
    <?php include("../detector_errores.php"); ?>
</head>
<body>
    <?php 
    $frutas = array(
        'clave1' => "Manzana",
        'clave 2'=> "Naranja",
        'clave 3' => "Cereza"

    );
    echo $frutas["clave1"];
    echo "<br>";

    $frutas = [
        "Manzana",
        "Naranja",
        "Cereza",
    ];

    array_push($frutas, "Mango", "Melocotón");
    $frutas[] = "Sandía";
    $frutas[7] = "Uva";
    $frutas[] = "Melón";

    $frutas = array_values($frutas);

    unset($frutas[1]);

    print_r($frutas);

    //echo $frutas[1];
    
    echo "<br>";
    /*
        CREAR UN ARRAY CON UNA LISTA DE PERSONAS DOND LA CLAVE 
        SEA EL DNI Y EL VALOR EL NOMBRE

        QUE HAYA MÍNIMO 3 PERSONAS

        MOSTRAS EL ARRAY COMPLETO CON PRINT_R Y ALGUNA
        PERSONA INDIVIDUAL

        AÑADIR ELEMENTOS CON Y SIN CLAVE

        BORRAR ALGÚN ELEMENTO

        PROBAR A RESETEAR LAS CLAVES
    */

    $personas = [
        "12345678A" => "Sergio Martínez",
        "12345678B" => "Alberto García",
        "87654321A" => "Claudia Jiménez",
        "87654321" => "Amanda Rodríguez"
    ];
    print_r($personas);
    echo "<p>" . $personas["12345678A"] . "</p>";
    

    unset($personas["87654321A"]);
    $personas["94367285J"] = "Marta Moreno";
    array_push($personas, "euidghswduihg");
    $personas["99999999B"] = "Cristiano 'El bicho' Ronaldo";
    array_push($personas, "Messi 'La pulga'");
    print_r($personas);
    echo "<br>";
    unset($personas["87654323"]);
    print_r($personas);
    ?>
</body>
</html>