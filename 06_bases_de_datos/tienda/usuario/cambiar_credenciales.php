<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('../util/conexion.php');
    ?>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_nueva_contrasena = $_POST["contra_nueva"];
        if ($tmp_nueva_contrasena == "") {
            $err_contrasena = "La contraseña es obligatoria";
        }else{
            if (strlen($tmp_nueva_contrasena) < 8 || strlen($tmp_nueva_contrasena) > 15) {
                $err_contrasena = "La contraseña debe tener entre 8 y 15 caracteres";
            }else{
                $patron = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,15}$/";
                if (!preg_match($patron,$tmp_contrasena)) {
                    $err_contrasena = "La contraseña debe tener: <br>-Entre 8 y 15 caracteres<br>-Letras
                     en mayúsculas y minúsculas<br>-Algún número<br>-Algún caracter especial (opcional, pero recomendable)";
                }else{
                    $nueva_contrasena = $tmp_nueva_contrasena;
                }
            }
        }
        if (isset($nueva_contrasena)) {
            $sql = "UPDATE usuarios SET contrasena = '$nueva_contrasena' WHERE usuario = ";
        }
    }
    ?>
    <div class="mb-3">
        <form action="" method="post" class="col-4">
            <label>Nueva Contraseña: </label>
            <input type="password" name="contra_nueva"><br><br>
            <?php if(isset($err_contrasena)) echo "<span class='error'>$err_contrasena</span>"?>
            <input type="submit" value="Cambiar">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>