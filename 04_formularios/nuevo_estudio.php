<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Estudio</title>
    <style>
        .error{
            color: red;
        }
    </style>
    <?php   
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );   
        
    ?>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            //Compruebo el nombre del estudio
            $tmp_nombre_estudio = $_POST["nombre_estudio"];
            if ($tmp_nombre_estudio == "") {
                $err_nombre_estudio = "El nombre del estudio es obligatorio";
            }else{
                $patron = "/^[A-Za-z0-9 ]/";
                if (!preg_match($patron,$tmp_nombre_estudio)) {
                    $err_nombre_estudio = "Solo puede contener letras, números y espacios en blanco";
                }else{
                    $nombre = $tmp_nombre_estudio;
                }
            }

            //Compruebo la ciudad

            $tmp_ciudad = $_POST["ciudad"];

            if ($tmp_ciudad == "") {
                $err_ciudad = "La ciudad es obligatoria";
            }else{
                $patron = "/^[A-Za-z ]/";
                if (!preg_match($patron,$tmp_ciudad)) {
                    $err_ciudad = "La ciudad solo puede contener letras y espacios en blanco";
                }else{
                    $ciudad = $tmp_ciudad;
                }
            }

        }

    ?>
    <form action="" method="post">
        <label>Nombre del estudio: </label>
        <input type="text" name="nombre_estudio">
        <?php if(isset($err_nombre_estudio)) echo "<span class='error'>$err_nombre_estudio</span>";?>
        <br><br>
        <label>Ciudad: </label>
        <input type="text" name="ciudad">
        <?php if(isset($err_ciudad)) echo "<span class='error'>$err_ciudad</span>";?>
        <br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>