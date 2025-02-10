<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rick & Morty</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
    ?>
</head>
<body>
    <?php
   
  

   /*  $filtracion = "gender=$genero&species=$especie";
 */
    $url = "https://rickandmortyapi.com/api/character/";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);



    $datos = json_decode($respuesta, true);

    $personajes = $datos["results"];

           

            ?>
             <table>
        <thead>
            <th>Nombre</th>
            <th>Género</th>
            <th>Especie</th>
            <th>Origen</th>
            <th>Imagen</th>
        </thead>
        <tbody>

        <?php
    $vueltas = 1;
    if (isset($_GET["genero"]) && isset($_GET["especie"])) {
        $genero = $_GET["genero"];
        $especie = $_GET["especie"];
        foreach ($personajes as $personaje) { 
            if (isset($_GET["n_personajes"]) && $_GET["n_personajes"] != "") {
                $n_personajes = $_GET["n_personajes"];
                $n_personajes = (int)$n_personajes;
                if ($personaje["gender"] == $genero && $personaje["species"] == $especie && $vueltas <= $n_personajes) { ?>
                    <tr>
                    
                    <td><?php echo $personaje["name"]?></td>
                    <td><?php echo $personaje["gender"]?></td>
                    <td><?php echo $personaje["species"]?></td>
                    <td><?php echo $personaje["origin"]["name"]?></td>
                    <td><img alt="imagen del personaje" src="<?php echo $personaje['image']?>"></td>
                    </tr>
                <?php
                 $vueltas++;
                }
            }else{
                if ($personaje["gender"] == $genero && $personaje["species"] == $especie) { ?>
                    <tr>
                    
                    <td><?php echo $personaje["name"]?></td>
                    <td><?php echo $personaje["gender"]?></td>
                    <td><?php echo $personaje["species"]?></td>
                    <td><?php echo $personaje["origin"]["name"]?></td>
                    <td><img alt="imagen del personaje" src="<?php echo $personaje['image']?>"></td>
                    </tr>
                <?php
                }
            }
        
       }
    
            
               
                ?>
                
            <?php }
        
    ?>
        </tbody>
        </table>

    <form action="" method="get">
        <label>Cantidad de personajes: </label>
        <input type="text" name="n_personajes"><br>
        <select name="genero">
            <option value="Male">Male</option>
            <option value="Female">Female</option>

        </select>

        <select name="especie">
            <option value="Human">Human</option>
            <option value="Alien">Alien</option>
            
        </select>
        <br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>