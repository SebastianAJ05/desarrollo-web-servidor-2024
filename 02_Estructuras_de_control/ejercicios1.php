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
    /* Con switch

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
        */

        $dia = match ($dia) {
            "Monday"  => "Lunes",
            "Tuesday" => "Martes",
            "Wednesday" => "Miércoles",
            "Thursday" => "Jueves",
            "Friday" => "Viernes",
            "Saturday" => "Sábado",
            "Sunday" => "Domingo"
        };
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
    echo "<br>";
    /**
     * HACER UN BUCLE QUE COMPRUEBE SI UN NÚMERO ES PRIMO
     * 
     * - Bucle desde 2 hasta N-1, si algun resto = 0, NO ES PRIMO
     */
    $n = 5;
    $esPrimo = true;
     for ($i = 2; $i <= $n-1 && $esPrimo; $i++){
        if($n % $i == 0):
            $esPrimo = false;
        endif;
     }
    if(!$esPrimo) echo "<p>" . $n . " no es primo </p>";
    else echo "<p>" . $n . " es primo </p>";

    //Forma de 50 primeros números
     
    $n = 50;
    $esPrimo = true;
    for($i = 1; $i <= $n; $i++){
        for($j = 2; ($j <= ($i-1)) && $esPrimo; $j++){
            if($i % $j == 0):
                $esPrimo = false;
            endif;
        }
        if(!$esPrimo) echo "<p>". $i . " no es primo </p>";
        else echo "<p>" . $i . " es primo </p>";
        $esPrimo = true;
    }

    $contador = 0;
    $num = 2;
    echo "<ol>";
    while($contador < 50){
        $esPrimo = true;
        
        for ($i=2; $i < $num; $i++) { 
            if($num % $i == 0){
                $esPrimo = FALSE;
                break;
            }
        }
        if($esPrimo){
            $contador++;
            echo "<li>$num es primo.</li>";
        }
        
        $num++;
    }
    echo "</ol>";

    /**
     * CALCULAR EL FIBONACCI DE UN NÚMERO
     * FIB(0) = 0
     * FIB (2) = 1  FIB(6) = 8
     * FIB(3) = 2   FIB(7) = 13
     */
    $aux1 = 0; #fib(0)
    $aux2 = 1; #fib(1)
    $fibn2 = null;

    $n = 4;

    for ($i=0; $i < $n; $i++) { 
        $fib = $aux1 + $aux2;
        $aux1 = $aux2;
        $aux2 = $fib;
    }
    echo "<h4>El fibonacci de $n es $fib</h4>";

    // Para los 10 primeros primos, calcular sus respectivos números
    //de fibonacci
    //Calcular: fib(2), fib(3), fib(5), etc...
     ?>
</body>
</html>