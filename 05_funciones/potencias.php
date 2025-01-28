<?php 
function calcularPotencia($base, $exponente){
    if ($base != '' && $exponente != '') {
        echo "<h2>$base elevado a $exponente es " . ($base**$exponente) . "</h2>";
    }else {
        echo "<p>Introduce la base y el exponente</p>";
    }
    
}

?>