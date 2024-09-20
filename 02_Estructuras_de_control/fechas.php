<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fechas</title>
</head>
<body>
    <?php
        //echo date("j");
        $dia = date("j");
        if($dia % 2 == 0){
            echo "El día $dia es par";
        }else{
            echo "El día $dia es impar";
        }
    ?>
</body>
</html>