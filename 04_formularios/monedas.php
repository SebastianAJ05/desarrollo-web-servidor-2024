<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monedas</title>
    <?php include("../detector_errores.php"); ?>
</head>
<body>
    <form action="" method="post">
        <label>Cantidad a convertir: </label>
        <input type="Number" name="cantidad"><br><br>
        <label>De </label>
        <select name="moneda_dada">
            <option value="€">Euros</option>
            <option value="$">Dólares</option>
            <option value="Y">Yenes</option>
        </select>

    <label> a </label>
        <select name="moneda_a_convertir">
            <option value="€">Euros</option>
            <option value="$">Dólares</option>
            <option value="Y">Yenes</option>
        </select>
        <input type="submit" value="Convertir">
    </form>
    <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        define("EUROS_DOLARES",1.09);
        define("EUROS_YENES", 163.38);
        define("DOLARES_EUROS", 0.92);
        define("DOLARES_YENES", 149.67);
        define("YENES_EUROS", 0.0061);
        define("YENES_DOLARES", 0.0067);

        $dinero = $_POST["cantidad"];
        $moneda_dada = $_POST["moneda_dada"];
        $moneda_a_convertir = $_POST["moneda_a_convertir"];
        $resultado = match(true){
            ($moneda_dada == "€" && $moneda_a_convertir == "$") => (float)$dinero*EUROS_DOLARES,
            ($moneda_dada == $moneda_a_convertir) => (float)$dinero*1,
            ($moneda_dada == "€" && $moneda_a_convertir == "Y") => (float)$dinero*EUROS_YENES,
            ($moneda_dada == "$" && $moneda_a_convertir == "€") => (float)$dinero*DOLARES_EUROS,
            ($moneda_dada == "$" && $moneda_a_convertir == "Y") => (float)$dinero*DOLARES_YENES,
            ($moneda_dada == "Y" && $moneda_a_convertir == "€") => (float)$dinero*YENES_EUROS,
            ($moneda_dada == "Y" && $moneda_a_convertir == "$") => (float)$dinero*YENES_DOLARES
        };
        echo "<p>$dinero unidades monetarias en $moneda_dada equivalen a $resultado en $moneda_a_convertir</p>";
    }
    
    ?>
</body>
</html>