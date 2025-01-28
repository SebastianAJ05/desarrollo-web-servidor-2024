<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar categoria</title>
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
             $nombre_categoria = $_GET["categoria"];
             $tmp_descripcion = $_GET["descripcion"];

            echo "<h1>Descripción de la categoría: $nombre_categoria</h1>";

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
                            /* $sql = "SELECT * FROM categorias WHERE descripcion = '$tmp_descripcion'";
                            $resultado = $_conexion->query($sql); */

                            # 1. Prepare
                            $sql = $_conexion -> prepare("SELECT * FROM categorias WHERE descripcion = ?");

                            # 2. Binding
                            $sql -> bind_param("s",$tmp_descripcion);

                            # 3. Execute
                            $sql -> execute();

                            # 4. Retrieve
                            $resultado = $sql -> get_result();

                            $categoria = $resultado -> fetch_assoc();
                            
                            if ($resultado -> num_rows > 0) {
                                $err_categoria = "Esta descripción ya existe en otra categoría.";
                            }else{
                                $descripcion = $tmp_descripcion;
                            }
                        }
                    }
                }

            if (isset($nombre_categoria) && isset($descripcion)) {
                /* $sql = "UPDATE categorias SET
                descripcion = '$descripcion'
                WHERE categoria = '$nombre_categoria'";

                $_conexion -> query($sql); */

                function manejarPut($_conexion, $entrada){
                    echo json_encode(["método" => "put"]);
                    $sql = "UPDATE categorias SET descripcion = :descripcion
                    WHERE categoria = :categoria";
    
                    $stmt = $_conexion -> prepare($sql);
                    $stmt -> execute([
                        "categoria" => $entrada["categoria"],
                        "descripcion" => $entrada["descripcion"]
                    ]);
                    if ($stmt) {
                        echo json_encode(["mensaje" => "la categoria se ha modificado"]);
                    }else{
                        echo json_encode(["mensaje" => "error al modificar la categoria"]);
                    }
                }
    
                manejarPut($_conexion, $entrada);

                echo "<h1 class='exito'>Todo Correcto!! La categoría $nombre_categoria se ha modificado!!</h1>";
            }
        ?>
        <form action="" method="get" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Descripción: </label><br>
                <textarea class="form-control" name="descripcion"><?php echo $tmp_descripcion?></textarea>
                <?php if(isset($err_descripcion)) echo "<span class='error'>$err_descripcion</span>"?>
            </div>
            <div class="mb-3">
                <input type="hidden" name="categoria" value="<?php echo $nombre_categoria?>">
                <input class="btn btn-primary" type="submit" value="Modificar">
                <a class="btn btn-secondary" href="index.php">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>