<?php

    //FUNCIÓN DEL IVA
    function calcular_IVA($precio, $iva){
        define("general",1.21);
        define("reducido",1.1);
        define("superreducido",1.04); 

        $pvp = match ($iva) {
            "general" => $precio*general,
            "reducido" => $precio*reducido,
            "superreducido" => $precio*superreducido
        };

        echo "<p>Precio con IVA $iva: $pvp</p>";
    
    }
    //FUNCION DEL IRPF
    function calcular_IRPF($salario){
        

        $salario_final = null;
        
        $tramo1 = (12450 * 0.19);
        $tramo2 = ((20200 - 12450) * 0.24);
        $tramo3 = ((35200 - 20200) * 0.30);
        $tramo4 = ((60000 - 35200) * 0.37);
        $tramo5 = ((300000 - 60000) * 0.45);

        if($salario <= 12450) {
            $salario_final = $salario - ($salario * 0.19);
        } elseif ($salario > 12450 && $salario <= 20200) {
            $salario_final = $salario 
                - $tramo1 
                - (($salario - 12450) * 0.24); 
        } elseif ($salario > 20200 && $salario <= 35200) {
            $salario_final = $salario
                - $tramo1
                - $tramo2
                - (($salario - 20200) * 0.30);
        } elseif ($salario > 35200 && $salario <= 60000) {
            $salario_final = $salario 
                - $tramo1
                - $tramo2 
                - $tramo3
                - (($salario - 35200) * 0.37);
        } elseif ($salario > 60000 && $salario <= 300000) {
            $salario_final = $salario 
                - $tramo1
                - $tramo2 
                - $tramo3
                - $tramo4
                - (($salario - 60000) * 0.45);
        } else {
            $salario_final = $salario
                - $tramo1
                - $tramo2 
                - $tramo3
                - $tramo4
                - $tramo5
                - (($salario - 300000) * 0.47);
        }

        echo "<h1>El salario neto de $salario" . "€ es $salario_final" . "€</h1>";
    }
    function rangoPrimo($num1, $num2){
        $primos = "";
        $esPrimo = TRUE; 
        for ($i=$num1; $i <= $num2; $i++) { 
            $esPrimo = TRUE;
            for ($j=2; $j < $i; $j++) { 
                
                if($i % $j == 0) {
                    $esPrimo = FALSE;
                    continue;
                }
            }
            if($esPrimo) $primos = $primos . " $i ";
        }
        echo "<p>Números primos entre $num1 y $num2:$primos</p>";
    }

    function temperaturas($grados, $grados_usu, $grados_conv){
        define("CELSIUS_KELVIN", 274.15);
        define("CELSIUS_FARENHEIT", 33.8);
        define("CELSIUS_CELSIUS", 1);
        define("KELVIN_KELVIN", 1);
        define("KELVIN_FARENHEIT", -457.87);
        define("KELVIN_CELSIUS", -272.15);
        define("FARENHEIT_KELVIN", 255.928);
        define("FARENHEIT_FARENHEIT", 1);
        define("FARENHEIT_CELSIUS", -17.2222);

        $grados_usu = $_POST["grados_usu"];
        $grados_conv = $_POST["grados_conv"];

        $grados_convertidos = 0;

        if($grados_usu == "CELSIUS" &&  $grados_conv == "KELVIN")  $grados_convertidos = (float)$grados*CELSIUS_KELVIN;
        elseif($grados_usu == "CELSIUS" &&  $grados_conv == "FARENHEIT")  $grados_convertidos = (float)$grados*CELSIUS_FARENHEIT;
        elseif($grados_usu == "CELSIUS" &&  $grados_conv == "CELSIUS")    $grados_convertidos = (float)$grados*CELSIUS_CELSIUS;
        //-----------------------------CELSIUS-------------------------
        elseif($grados_usu == "KELVIN" &&  $grados_conv == "KELVIN")    $grados_convertidos = (float)$grados*KELVIN_KELVIN;
        elseif($grados_usu == "KELVIN" &&  $grados_conv == "FARENHEIT") $grados_convertidos = (float)$grados*KELVIN_FARENHEIT;
        elseif($grados_usu == "KELVIN" &&  $grados_conv == "CELSIUS")    $grados_convertidos = (float)$grados*KELVIN_CELSIUS;
        //-----------------------------KELVIN-------------------------
        elseif($grados_usu == "FARENHEIT" &&  $grados_conv == "KELVIN")    $grados_convertidos = (float)$grados*FARENHEIT_KELVIN;
        elseif($grados_usu == "FARENHEIT" &&  $grados_conv == "FARENHEIT") $grados_convertidos =  (float)$grados*FARENHEIT_FARENHEIT;
        elseif($grados_usu == "FARENHEIT" &&  $grados_conv == "CELSIUS") $grados_convertidos = (float)$grados*FARENHEIT_CELSIUS;
        //-----------------------------FARENHEIT-------------------------
        
        echo "<p>$grados grados en grados $grados_usu equivalen a $grados_convertidos grados en grados $grados_conv</p>";
    }


?>