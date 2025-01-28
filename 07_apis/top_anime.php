<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Anime</title>
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
    <form action="" method="post">
        <input type="radio" name="opcion" value="todos">Todos
        <input type="radio" name="opcion" value="TV">Serie de TV
        <input type="radio" name="opcion" value="pelicula">Película
        <input type="submit" value="filtrar">
    </form>
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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!isset($_POST["opcion"])) {
            $opcion = "TV";
        }else{
            $opcion = $_POST["opcion"];
        }
        foreach ($animes as $anime) { 
            if ($anime["type"] == $opcion) {?>
            <tr>
                
            <td><?php echo $anime["rank"]?></td>
            <td><a href="anime.php?mal_id=<?php echo $anime['mal_id']?>"><?php echo $anime["title"]?></a></td>
            <td><?php echo $anime["score"]?></td>
            <td><img alt="imagen del anime" src="<?php echo $anime['images']['jpg']['image_url']?>"></td>
            </tr>
           <?php }
            ?>
            
        <?php }
    }
    ?>
        </tbody>
    </table>
</body>
</html>