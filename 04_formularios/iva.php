<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IVA</title>
</head>
<body>
    <form action="" method="post">
        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio">
        <br><br>
        <label for="iva">IVA</label>
        <select name="iva" id="iva">
            <option value="general">General</option>
            <option value="reducido">Reducido</option>
            <option value="supperreducido">Superreducdio</option>
        </select><br><br>
        <input type="submit" value="Calcular PVP">
    </form>
    <?php
    define("general",1.21);
    define("reducido",1.1);
    define("superreducido",1.04); 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $precio = $_POST["precio"];
        $iva = $_POST["iva"];

        $pvp = match ($iva) {
            "general" => $precio*general,
            "reducido" => $precio*reducido,
            "superreducido" => $precio*superreducido
        };

        echo "<p>Precio con IVA $iva: $pvp</p>";
    }
    
    
    ?>
</body>
</html>