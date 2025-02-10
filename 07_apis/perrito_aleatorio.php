<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API de perros</title>
</head>
<body>
    
    <form action="" method="post">
        <input type="submit" value="Perro Aleatorio">
    </form>

    <?php
        $genero = $_GET["genero"];
        $especie = $_GET["especie"];

        $filtracion = "gender=$genero&species=$especie";

        $url = "https://dog.ceo/api/breed/hound/images";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);



        $datos = json_decode($respuesta, true);

        $perros = $datos["message"];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $pos_random = rand(0,count($perros));
            ?>
                <img src="<?php echo $perros[$pos_random]?>" alt="Imagen del perro">
            <?php
        }
        
    ?>
</body>
</html>