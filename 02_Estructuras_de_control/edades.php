<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edades</title>
</head>
<body>
    <?php

        $edad = rand(0,120);
        echo $edad;
        /*

        CON IF Y MATCH:

        -SI LA PERSONA TIENE ENTRE 0 Y 4 AÑOS ES UN BEBÉ

        -SI LA PERSONA TIENE ENTRE 5 Y 17 AÑOS, ES MENOR DE EDAD

        -SI LA PERSONA TIENE ENTRE 18 Y 65 AÑOS, ES ADULTO

        -SI LA PERSONA TIENE ENTRE 66 Y 120 AÑOS, ES JUBILADO

        -SI LA EDAD ESTÁ FUERA DE RANGO, ES ERROR

        */

        //CON MATCH
        echo "<p>";
        $resultado = match (true) {
        $edad >= 0 && $edad <= 4 => "Eres un bebé",
        $edad >= 5 && $edad <= 17 => "Eres menor de edad",
        $edad >= 18 && $edad <= 65 => "Eres adulto",
        $edad >= 66 && $edad <= 120 => "Estás jubilado",
        default => "Error"
        };
        echo "</p>";
        echo $resultado;
        
        //Con if
        echo "<p>";
        if($edad >= 0  && $edad <= 4){
            echo "Eres un bebé";
        }
        elseif($edad >= 5 && $edad <= 17){
            echo "Eres menor de edad";
        }
        elseif($edad >= 18 && $edad <= 65){
            echo "Eres adulto";
        }
        else if($edad >= 66 && $edad <= 120){
            echo "Estás jubilado";
        }
        else{
            echo "Error";
        }
        echo "</p>";
    ?>
</body>
</html>