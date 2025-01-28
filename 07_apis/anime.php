<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
    ?>
    <style>
        body {

font-family: Arial, sans-serif;

background-color: #f4f4f4;

margin: 0;

padding: 20px;

}


.table-container {

max-width: 800px;

margin: auto;

overflow: hidden;

border-radius: 8px;

box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);

background-color: #fff;

}


table {

width: 100%;

border-collapse: collapse;

}


th, td {

padding: 15px;

text-align: left;

border-bottom: 1px solid #ddd;

}


th {

background-color: #4CAF50;

color: white;

}


td img {

border-radius: 50%;

width: 50px;

height: 50px;

}


tr:hover {

background-color: #f1f1f1;

}


tbody tr:nth-child(even) {

background-color: #f9f9f9;

}
    </style>
</head>
<body>
    <?php
        if (isset($_GET["mal_id"])) {
            $mal_id = $_GET["mal_id"];
        }else{
            header("location: top_anime.php");
        }

        $url = "https://api.jikan.moe/v4/anime/" . $mal_id . "/full";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);


        $datos = json_decode($respuesta, true);

        $anime = $datos["data"];

        // print_r($animes);

            ?>
    <table>
        <thead>
            <th>Titulo</th>
            <th>Sinopsis</th>
            <th>Imagen</th>
            <th>Año</th>
        </thead>
        <tbody>

            <tr>
            <td><?php echo $anime["title"]?></td>
            <td><?php echo $anime["synopsis"]?></td>
            <td><img src="<?php echo $anime['images']['jpg']['image_url']?>"></td>
            <td><?php echo $anime["year"]?></td>
            </tr>
      
        </tbody>
    </table>
    <br>
    <h3>Géneros</h3>
    <ul>
        <?php 
        
            foreach ($anime["genres"] as $genero) {
                echo "<li>" . $genero["name"] . "</li>";
            }

        ?>
        </ul>

        <h3>Productoras</h3>
    <ul>
        <?php 
        
            foreach ($anime["producers"] as $productora) {
                echo "<li>" . $productora["name"] . "</li>";
            }

        ?>
        </ul>

        <h3>Relaciones</h3>
    <ul>
        <?php 
        
            foreach ($anime["relations"] as $relacion) {
                echo "<li>" . $relacion["relation"] . "</li>";
            }

        ?>
        </ul>



    <iframe src="<?php echo $anime['trailer']['embed_url']?>" type="video/mp4">
     
</body>
</html>