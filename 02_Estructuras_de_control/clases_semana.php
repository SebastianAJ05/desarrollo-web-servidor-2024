<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clases de la semana</title>
</head>
<body>
    <?php
        $dia = date("l");
        
        echo "<h1>Hoy es día $dia</h1>";
        /*
            HACER UN SWITCH QUE MUESTRE POR PANTALLA
            SI HOY HAY CLASES DE WEB SERVIDOR
        */
        # Forma 1 de hacerlo
        switch ($dia) {
            case 'Tuesday':
            case 'Wednesday':
            case 'Friday':
                echo "<p>Hoy hay clases de Web Servidor</p>";
                break;
            default:
                echo "<p>Hoy no hay clases de Web Servidor</p>";
                break;
        }
        # Forma 2 de hacerlo

        switch ($dia):
            case 'Tuesday':
            case 'Wednesday':
            case 'Friday':
                echo "<p>Hoy día $dia hay clases de Web Servidor</p>";
                break;
            default:
                echo "<p>Hoy día $dia no hay clases de Web Servidor</p>";
                break;
        endswitch;

        /*
        1 - CREAR UN SWITCH QUE SEGÚN EL DÍA EN EL QUE ESTEMOS
        ALMACENE EN UNA VARIABLE EL DÍA EN ESPAÑOL.

        2 - REESCRIBIR EL SWTICH DE LA ASIGNATURA CON LOS DÍAS
        EN ESPAÑOL
        */
        switch ($dia) {
            case 'Monday':
                $dia = 'Lunes';
                break;
            case 'Tuesday':
                $dia = 'Martes';
                break;
            case 'Wednesday':
                $dia = 'Miércoles';
                break;
            case 'Thursday':
                $dia = 'Jueves';
                break;
            case 'Friday':
                $dia = 'Viernes';
                break;
            case 'Saturday':
                $dia = 'Sábado';
            case 'Sunday':
                $dia = 'Domingo';
                break;
        }
        echo "<h1>Hoy es día $dia</h1>";
        switch ($dia) {
            case 'Martes':
            case 'Miércoles':
            case 'Viernes':
                echo "<p>Hoy día $dia hay clases de Web Servidor</p>";
                break;
            default:
                echo "<p>Hoy día $dia no hay clases de Web Servidor</p>";
                break;
        }

        //ESTRUCTURA MATCH

        $resultado = match($dia) {
        "Martes","Miércoles","Viernes"=> "<p>Hoy día $dia hay clases de Web Servidor</p>",
        default => "<p>Hoy día $dia hay clases de Web Servidor</p>"
        };
        echo $resultado;
 
        //Número aleatorio con match
        $n = rand(1,10);
        $resto = $n % 2;
        $res = match($resto) {
            0 => "<p>El número $n es par</p>",
            1 => "<p>El número $n es impar</p>"
            };
        echo $res;

        //Rangos con match

        $numero = rand(-10,20);
        $resultado = match (true) {
            $numero >= -10 && $numero < 0 => "El número está en el rango [-10, 0)",
            $numero >= 0 && $numero < 10 => "El número está en el rango [0, 10)",
            $numero >= 10 && $numero < 20 => "El número está en el rango [10, 20]",
        }
       
    ?>
    
</body>
</html>