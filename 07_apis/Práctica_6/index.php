<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
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
    $salto = 5;
    if (!isset($_GET["max_id"])) {
        $max_id = 5;
    }else{
        $max_id = $_GET["max_id"];
    }
    
        $url = "https://dragonball-api.com/api/characters"; 

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);



        $datos = json_decode($respuesta, true);

        $personajes = $datos["items"];  //En items se encuentran todos los personajes

        
    ?>
     <table>
        <thead>
            <th>Nombre</th>
            <th>Raza</th>
            <th>Género</th>
            <th>Imagen</th>
        </thead>
        <tbody>

    
    <?php
 
       
        foreach ($personajes as $personaje) { 
            if ($max_id == 5) {        
                if ($personaje["id"] <= $max_id) {?>
                <tr>
                    
                <td><a href="personaje.php?id=<?php echo $personaje["id"]?>"><?php echo $personaje["name"]?></a></td>
                <td><?php echo $personaje["race"]?></td>
                <td><?php echo $personaje["gender"]?></td>
                <td><img alt="imagen del anime" src="<?php echo $personaje['image']?>"></td>
                </tr>
            <?php 
                }
            }else{
                if ($personaje["id"] > 5 && $personaje["id"] <= $max_id) {?>
                    <tr>
                        
                    <td><a href="personaje.php?id=<?php echo $personaje["id"]?>"><?php echo $personaje["name"]?></a></td>
                    <td><?php echo $personaje["race"]?></td>
                    <td><?php echo $personaje["gender"]?></td>
                    <td><img alt="imagen del anime" src="<?php echo $personaje['image']?>"></td>
                    </tr>
                <?php 
                    }
            }
            ?>
            
        <?php }
    
    ?>
        </tbody>
    </table>
    <?php 
    if ($max_id == 5) {
        ?>

<a href="<?php echo 'index.php?max_id= '. ($max_id+$salto)?>"><?php 
        echo "Siguiente"?></a>
<a href="<?php echo 'index.php?max_id='. ($max_id+$salto)?>"><?php 
    echo "Final"?></a>
    <?php    
    }else{
        ?>
        <a href="<?php echo 'index.php?max_id=' . ($max_id-$salto)?>"><?php 
        echo "Inicio"?></a>
        <a href="<?php echo 'index.php?max_id=' . ($max_id-$salto)?>"><?php 
        echo "Anterior"?></a>
        <?php
    }
    
    
    ?>
    
</body>
</html>