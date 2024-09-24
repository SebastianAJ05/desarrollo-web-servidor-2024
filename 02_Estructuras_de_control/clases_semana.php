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
    ?>
    
</body>
</html>