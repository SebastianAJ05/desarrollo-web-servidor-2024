<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Anime</title>
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
        $url = "https://api.jikan.moe/v4/top/anime";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        

        $datos = json_decode($respuesta, true);

        $animes = $datos["data"];

        // print_r($animes);


    ?>

    <table>
        <thead>
            <th>Posición</th>
            <th>Titulo</th>
            <th>Nota</th>
            <th>Imagen</th>
        </thead>
        <tbody>

    
    <?php
        foreach ($animes as $anime) { ?>
            <tr>
            <td><?php echo $anime["rank"]?></td>
            <td><a href="anime.php?mal_id=<?php echo $anime['mal_id']?>"><?php echo $anime["title"]?></a></td>
            <td><?php echo $anime["score"]?></td>
            <td><img alt="imagen del anime" src="<?php echo $anime['images']['jpg']['image_url']?>"></td>
            </tr>
        <?php }
    ?>
        </tbody>
    </table>
</body>
</html>