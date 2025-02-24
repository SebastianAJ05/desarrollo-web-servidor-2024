<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../util/estilos.css">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('../util/conexion.php');
    ?>
</head>
<body>
    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_usuario = $_POST["usuario"];
            $tmp_contrasena = $_POST["contrasena"];

            
            if ($tmp_usuario == "") {
                $err_usuario = "El usuario es obligatorio";
            }else{
                if (strlen($tmp_usuario) < 3 || strlen($tmp_usuario) > 15) {
                    $err_usuario = "El usuario debe tener entre 3 y 15 caracteres";
                }else{
                    $patron = "/^[A-Za-z0-9]/";
                    if (!preg_match($patron,$tmp_usuario)) {
                        $err_usuario = "El usuario solo puede tener letras y números";
                    }else{
                        $sql = "SELECT * FROM usuarios WHERE usuario = '$tmp_usuario'";
                        $resultado = $_conexion->query($sql);
                        if ($resultado -> num_rows > 0) {
                            $err_usuario = "Este usuario ya existe. Prueba a iniciar sesión o comprueba si lo has escrito bien";
                        }else{
                            $usuario = $tmp_usuario;
                        }
                        
                    }
                }
            }

            if ($tmp_contrasena == "") {
                $err_contrasena = "La contraseña es obligatoria";
            }else{
                if (strlen($tmp_contrasena) < 8 || strlen($tmp_contrasena) > 15) {
                    $err_contrasena = "La contraseña debe tener entre 8 y 15 caracteres";
                }else{
                    $patron = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,15}$/";
                    if (!preg_match($patron,$tmp_contrasena)) {
                        $err_contrasena = "La contraseña debe tener: <br>-Entre 8 y 15 caracteres<br>-Letras
                         en mayúsculas y minúsculas<br>-Algún número<br>-Algún caracter especial (opcional, pero recomendable)";
                    }else{
                        $contrasena = $tmp_contrasena;
                    }
                }
            }

            if (isset($usuario) && isset($contrasena)) {
                $contrasena_cifrada = password_hash($contrasena, PASSWORD_DEFAULT);
                $sql = "INSERT INTO usuarios VALUES ('$usuario', '$contrasena_cifrada')";
                $_conexion -> query($sql);
            }
        }
    ?>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data" class="col-4">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input class="form-control" name="usuario" type="text">
                <?php if(isset($err_usuario)) echo "<span class='error'>$err_usuario</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input class="form-control" name="contrasena" type="password">
                <?php if(isset($err_contrasena)) echo "<span class='error'>$err_contrasena</span>"; ?>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Registrarse">
            </div>
        </form>
    
        <h3>O, si ya tienes cuenta, inicia sesión</h3>
        <a class="btn btn-secondary" href="iniciar_sesion.php">Iniciar sesión</a>
        <a class="btn btn-success" href="../index.php">Volver a Inicio</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>