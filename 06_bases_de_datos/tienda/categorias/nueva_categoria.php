<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Categoría</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../util/estilos.css" type="text/css">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('../util/conexion.php');

        include('../util/funciones.php');

        session_start();
        if (!isset($_SESSION["usuario"])) {
            header("location: ../usuario/iniciar_sesion.php");
            exit;
        }
    ?>
</head>
<body>
    <div class="container">
        <?php

            
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $tmp_categoria = $_POST["categoria"];
                $tmp_descripcion = $_POST["descripcion"];

                if (!isset($tmp_categoria)) {
                    $err_categoria = "ERROR: CATEGORÍA NO LEÍDA";
                }else{
                    if ($tmp_categoria == "") {
                        $err_categoria = "La categoría es obligatoria";
                    }else{
                        $tmp_categoria = sanear($tmp_categoria);
                        if (strlen($tmp_categoria) < 2 || strlen($tmp_categoria) > 30) {
                            $err_categoria = "Número de caracteres permitidos: Entre 2 y 30";
                        }else{
                            $patron = "/^[A-Za-z ]/";
                            if (!preg_match($patron, $tmp_categoria)) {
                                $err_categoria = "Caracteres permitidos para la categoría: Solo letras y espacios en blanco";
                            }else{
                                $sql = "SELECT * FROM categorias WHERE categoria = '$tmp_categoria'";
                                $resultado = $_conexion->query($sql);
                                if ($resultado -> num_rows > 0) {
                                    $err_categoria = "Esta categoría ya existe.";
                                }else{
                                    $categoria = $tmp_categoria;
                                }
                            }
                        }
                    }
                }

                if (!isset($tmp_descripcion)) {
                    $err_descripcion = "ERROR: DESCRIPCIÓN NO LEÍDA";
                }else{
                    if ($tmp_descripcion == "") {
                        $err_descripcion = "La descripción es obligatoria";
                    }else{
                        $tmp_descripcion = sanear($tmp_descripcion);
                        if (strlen($tmp_descripcion) > 255) {
                            $err_descripcion = "Número de caracteres permitidos: Máximo 255";
                        }else{
                                $sql = "SELECT * FROM categorias WHERE descripcion = '$tmp_descripcion'";
                                $resultado = $_conexion->query($sql);
                                if ($resultado -> num_rows > 0) {
                                    $err_categoria = "Esta descripción ya existe en otra categoría.";
                                }else{
                                    $descripcion = $tmp_descripcion;
                                }
                            }
                        }
                    }


                if (isset($categoria) && isset($descripcion)) {
                   /*  $sql = "INSERT INTO categorias 
                    (categoria, descripcion)
                    VALUES
                    ('$categoria','$descripcion')
                ";

                $_conexion -> query($sql); */

                # 1. Prepare
                $sql = $_conexion -> prepare("INSERT INTO categorias 
                    (categoria, descripcion)
                    VALUES (?,?)");

                # 2. Binding

                $sql -> bind_param("ss",$categoria, $descripcion);

                # 3. Execute

                $sql -> execute();

                echo "<h1 class='exito'>Todo Correcto!! La categoría $categoria se ha creado!!</h1>";
                }

                function manejarPost($_conexion, $entrada){
                    //echo json_encode(["método" => "post"]);
                    $sql = "INSERT INTO categorias (categoria, descripcion) VALUES (:categoria, :descripcion)";
                    $stmt = $_conexion -> prepare($sql);
                    $stmt -> execute([
                        "categoria" => $entrada["categoria"],
                        "descripcion" => $entrada["descripcion"]
                    ]);
                    if ($stmt) {
                        echo json_encode(["mensaje" => "el producto se ha creado"]);
                    }else{
                        echo json_encode(["mensaje" => "error al crear el producto"]);
                    }
                }

                manejarPost($_conexion, $entrada);
            }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <input class="form-control" name="categoria" type="text">
                <?php if(isset($err_categoria)) echo "<span class='error'>$err_categoria</span>"?>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripcion</label>
                <textarea class="form-control" name="descripcion"></textarea>
                <?php if(isset($err_descripcion)) echo "<span class='error'>$err_descripcion</span>"?>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Crear">
                <a class="btn btn-secondary" href="index.php">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>