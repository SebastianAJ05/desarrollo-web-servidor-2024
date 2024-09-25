<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios 1</title>
</head>
<body>
    <?php 
    /**
     * EJERCICIO 1
     * 
     * Calcula la suma de todos los números 
     * pares del 0 al 20
     *
     */
        $suma = 0;
        for($i = 1; $i <= 20; $i++){
            if ($i % 2 == 0) $suma += $i;
        }
        echo "<p>La suma de todos los números pares
        del 0 al 20 es: " . $suma . "</p>";
    /**
     * EJERCICIO 2
     * 
     * (Hay que investigar un poco)
     * 
     * Muestra por pantalla la fecha actual con el siguiente
     * formato:
     * "Miércoles 25 de septiembre de 2024"
     * 
     */
    $dia = date("l");
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
    $mes = date("F");
    switch($mes){
        case 'January':
            $mes = 'Enero';
        break;
        case 'February':
            $mes = 'Febrero';
        break;
        case 'March':
            $mes = 'Marzo';
        break;
        case 'April':
            $mes = 'Abril';
        break;
        case 'May':
            $mes = 'Mayo';
        break;
        case 'June':
            $mes = 'Junio';
        break;
        case 'July':
            $mes = 'Julio';
        break;
        case 'August':
            $mes = 'Agosto';
        break;
        case 'September':
            $mes = 'Septiembre';
        break;
        case 'October':
            $mes = 'Octubre';
        break;
        case 'November':
            $mes = 'Noviembre';
        break;
        case 'December':
            $mes = 'Diciembre';
        break;
    }
    $fecha = $dia . " " . date("j") . " de " . $mes
     . " de " . date("Y");
    echo $fecha;
    ?>
</body>
</html>