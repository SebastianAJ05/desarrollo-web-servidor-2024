<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raza de perro</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
    ?>
</head>
<body>
<?php
        $url = "https://dog.ceo/api/breeds/list/all";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);



        $datos = json_decode($respuesta, true);

        $razas = $datos["message"];

        $select_razas = [];

        foreach ($razas as $clave => $valor) {
            array_push($select_razas, $clave);
        }

        
    ?>

<?php
        if (isset($_GET["raza"])) {
            $raza_elegida = $_GET["raza"];
            
            $url = "https://dog.ceo/api/breed/" . $raza_elegida . "/list/";

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $respuesta = curl_exec($curl);
            curl_close($curl);

            $datos = json_decode($respuesta, true);

            $subrazas = $datos["message"];

            if (count($subrazas) == 0) {
               $url = "https://dog.ceo/api/breed/$raza_elegida/images";

               $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $respuesta = curl_exec($curl);
                curl_close($curl);

                $datos = json_decode($respuesta, true);

                $subrazas = $datos["message"];



            }else{
                foreach ($subraza as $subrazas) {
                    
                }
            }

            var_dump($subrazas);

            $pos_random = rand(0,count($subrazas));
            ?>
                <img src="<?php echo $subrazas[$pos_random]?>" alt="Imagen del perro">
                <?php}      
            ?>
<form action="" method="get">
    <select name="raza">
        <?php
    foreach ($select_razas as $raza) {
        ?>
                <option value="<?php echo $raza?>"><?php echo ucwords($raza)?></option>
                <?php
            }
            ?>
        
    </select>
        <input type="submit" value="Perro Aleatorio">
    </form>
    
</body>
</html>