<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personaje</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
    ?>
    <style>
        img{
            width: 80px;
        }
    </style>
</head>
<body>
<?php
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    }else{
        header("location: index.php");
    }


    $url = "https://dragonball-api.com/api/characters/" . $id; 

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);



    $datos = json_decode($respuesta, true);

    $datos_personaje = $datos; 
    
?>
 <table>
    <thead>
        <th>Nombre</th>
        <th>Raza</th>
        <th>Género</th>
        <th>Imagen</th>
        <th>Descripción</th>
        
    </thead>
    <tbody>

        <tr>
            
        <td><?php echo $datos_personaje["name"]?></td>
        <td><?php echo $datos_personaje["race"]?></td>
        <td><?php echo $datos_personaje["gender"]?></td>
        <td><img alt="imagen del anime" src="<?php echo $datos_personaje['image']?>"></td>
        <td><?php echo $datos_personaje["description"]?></td>
        </tr>
    </tbody>
</table>
       
        
    <?php 
    $transformaciones = $datos_personaje["transformations"];

    if (count($transformaciones) > 0) {
        ?>
        <h3>Transformaciones</h3>
    <ol>

    <?php
        for ($i=0; $i < count($transformaciones); $i++) { ?>
        <li>
            <ul>
                <li><?php echo $transformaciones[$i]["name"]?></li>
                <img src="<?php echo $transformaciones[$i]["image"]?>">
            </ul>
        </li>
        <?php }



    ?>
    </ol>
    <?php
        }else{
            echo "<h3>Este personaje no tiene transformaciones</h3>";
        }

    ?>
  

</body>
</html>