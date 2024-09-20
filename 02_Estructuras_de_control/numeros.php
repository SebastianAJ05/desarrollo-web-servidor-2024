<?php
    $numero = 3;
    /*
    //if con llaves
    $numero = 0;
    if($numero > 0){
        echo "<p>El número es positivo</p>";
    } elseif ($numero == 0){
        echo "<p>El número es cero</p>";
    }
    else{
        echo "<p>El número no es positvo</p>";
    }
    //if en una sola línea
    $numero = 7;
    if($numero > 0) echo "<p>El número es positivo</p>";
    elseif($numero == 0) echo "<p>El número es cero</p>";
    else echo "<p>El número no es positvo</p>";

    //if con :
        $numero = -6;
    if($numero > 0):
        echo "<p>El número es positivo</p>";
    elseif($numero == 0):
        echo "<p>El número es cero</p>";
    else: 
        echo "<p>El número no es positvo</p>";
    endif;
    */
    $numero = 3;

    # Rangos: [-10,0) , [0,10],(10,20]

    if($numero >= 10 && $numero < 0){
        echo "El número $numero está en el rango [-10,0)";
    }
    elseif($numero >= 0 && $numero <= 10){
        echo "El número $numero está en el rango [0,10]";
    }elseif($numero > 10 && $numero <= 20){
        echo "El número $numero está en el rango (10,20]";
    }else{
        echo "El número no está ninguno de los rangos";
    }
    echo "<br>";

    //if con :
    if($numero >= 10 && $numero < 0):
        echo "El número $numero está en el rango [-10,0)";
    elseif($numero >= 0 && $numero <= 10):
        echo "El número $numero está en el rango [0,10]";
    elseif($numero > 10 && $numero <= 20):
        echo "El número $numero está en el rango (10,20]";
    else:
        echo "El número no está ninguno de los rangos";
    endif;
    echo "<br>";
    /*
    $numero1 = 3;
    $numero2 = 4;

    ESCRIBIR UN IF QUE DECIDA CUÁL DE LOS NÚMEROS ES MAYOR, O SI
    SON IGUALES

    HACERLO DE DOS FORMAS DIFERENTES
    */

    $numero1 = 3;
    $numero2 = 4;

    //if con llaves
    if($numero1 > $numero2){
        echo $numero1 . " es mayor que " . $numero2;
    }
    elseif($numero1 == $numero2){
        echo $numero1 . " es igual a " . $numero2;
    }else{
        echo $numero2 . " es mayor que " . $numero1;
    }
    echo "<br>";
    
    //if con :

    if($numero1 > $numero2):
        echo $numero1 . " es mayor que " . $numero2;
    elseif($numero1 == $numero2):
        echo $numero1 . " es igual a " . $numero2;
    else:
        echo $numero2 . " es mayor que " . $numero1;
    endif;
    echo "<br>";
    //if en una sola línea

    if($numero1 > $numero2) echo $numero1 . " es mayor que " . $numero2;
    elseif($numero1 == $numero2) echo $numero1 . " es igual a " . $numero2;
    else echo $numero2 . " es mayor que " . $numero1;
    
    echo "<br>";
    ?>