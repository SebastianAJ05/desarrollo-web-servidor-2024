<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Consola</title>
    <?php   
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );   
        
        require('conexion_consolas.php');
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $nombre = $_POST["nombre"];
                $fabricante = $_POST["fabricante"];
                $generacion = $_POST["generacion"];
                $unid_vendidas = $_POST["unidades_vendidas"];

                // $_FILES, QUE ES UN ARRAY DOBLE!!!
 
                $direccion_temporal = $_FILES["imagen"]["tmp_name"];
                $nombre_imagen = $_FILES["imagen"]["name"];
                $imagen = "./imagenes/" . $nombre_imagen;
                move_uploaded_file($direccion_temporal, "$imagen");
                /* $sql = "INSERT INTO consolas (nombre, 
                fabricante, generacion, 
                unidades_vendidas, imagen)
                VALUES ('$nombre', '$fabricante',
                $generacion, $unid_vendidas, './imagenes/$nombre_imagen')";

                $_conexion -> query($sql); */

                # 1. Prepare
                $sql = $_conexion -> prepare("INSERT INTO consolas (nombre, 
                fabricante, generacion, 
                unidades_vendidas, imagen)
                VALUES (?, ?, ?, ?, ?)");

                # 2. Binding

                $sql -> bind_param("ssiis",$nombre, $fabricante,$generacion, $unid_vendidas, $imagen);

                # 3. Execute

                $sql -> execute();

            }


        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input class="form-control" name="nombre" type="text">
            </div>
            <div class="mb-3">
                <label class="form-label">Fabricante</label>
                <input class="form-control" name="fabricante" type="text">
            </div>
            <div class="mb-3">
                <label class="form-label">Generación</label>
                <input class="form-control" name="generacion" type="text">
            </div>
            <div class="mb-3">
                <label class="form-label">Unidades vendidas</label>
                <input class="form-control" name="unidades_vendidas" type="text">
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input class="form-control" name="imagen" type="file">
            </div>
            <div class="mb-3">
            <input class="btn btn-primary"type="submit" value="Crear">
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>