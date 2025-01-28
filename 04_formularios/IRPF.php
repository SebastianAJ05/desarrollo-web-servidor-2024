<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IRPF</title>
</head>
<body>
    <form action="" method="post">
        <label>Salario Anual</label>
        <input type="Number" name="salario">
        <input type="submit" value="Calcular Porcentaje">
    </form>
    <?php 
    
        /**
         * Hasta 12.450€ --> 19%
         * De 12.450€ hasta 20.199€ --> 24%
         * De 20.200 hasta 35.199 --> 30%
         * Desde 35.200 hasta 59.999€ --> 37%
         * Desde 60.000€ hasta 299.999€ --> 45%
         * A partir de 300.000 € --> 47,0%
        */
    $salario = (int)$_POST["salario"];
    $sobras=0.0;
    $aniadido=0.0;
    $retencion=0.0;
    $resto = 0.0;
    if($salario < 12450) {
        $aniadido = ($salario * 19)/100;
    }if($salario >= 12450 && $salario <= 20199) {
        $sobras = (float)12450*0.19;
        $resto = $salario - 12450;
        $retencion = ($resto * 24)/100;
        $aniadido += $sobras + $retencion;
        
    }if ($salario >= 20200 && $salario <= 35199) {
        $sobras = (float)20200*0.24;
        $resto = $salario - 20200;
        $retencion = ($resto * 30)/100;
        $aniadido += $sobras + $retencion;
        
    }if ($salario >= 35200 && $salario <= 59999) {
        $sobras = (float)35200*0.30;
        $resto = $salario - 35200;
        $retencion = ($resto * 37)/100;
        $aniadido += $sobras + $retencion;
        
    }if ($salario >= 60000 && $salario <= 299999) {
        $sobras = (float)60000*0.37;
        $resto = $salario - 60000;
        $retencion = ($resto * 45)/100;
        $aniadido += $sobras + $retencion;
        
    }if($salario >= 300000){
        $sobras = (float)300000*0.45;
        $resto = $salario - 300000;
        $retencion = ($resto * 47)/100;
        $aniadido += $sobras + $retencion;
        
    }
    echo "Con $salario € anuales, te quedas con: " . ($salario-$aniadido) . "€";
    ?>
</body>
</html>