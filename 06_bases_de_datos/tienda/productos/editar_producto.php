<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('../util/conexion.php');
    ?>
</head>
<body>
    <div class="container">
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $id_producto = $_POST["id_producto"];
                $nombre = $_POST["nombre"];
                $descripcion = $_POST["descripcion"];
                $categoria = $_POST["categoria"];
                $stock = $_POST["stock"];
                $precio = $_POST["precio"];

                $direccion_temporal = $_FILES["imagen"]["tmp_name"];
                $nombre_imagen = $_FILES["imagen"]["name"];
                move_uploaded_file($direccion_temporal, "../imagenes/$nombre_imagen");

                $sql = "UPDATE productos SET
                            nombre = '$nombre',
                            descripcion = '$descripcion',
                            categoria = '$categoria',
                            stock = $stock,
                            precio = $precio,
                            imagen = '../imagenes/$nombre_imagen'
                        WHERE id_producto = $id_producto";

                $_conexion -> query($sql);
            }

            $sql = "SELECT * FROM categorias ORDER BY categoria";
            $resultado = $_conexion -> query($sql);

            echo "<h1>" . $_GET["id_producto"] . "</h1>";

            $categorias = [];

            while($fila = $resultado -> fetch_assoc()) {
                array_push($categorias, $fila["categoria"]);
            }

            $id_producto = $_GET["id_producto"];
            $sql = "SELECT * FROM productos WHERE id_producto = '$id_producto'";
            $resultado = $_conexion -> query($sql);
            $producto = $resultado -> fetch_assoc();
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input class="form-control" name="nombre" type="text" 
                    value="<?php echo $producto["nombre"] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <select class="form-select" name="categoria">
                   
                    <?php foreach($categorias as $categoria) { 
                        if ($categoria == $producto["categoria"]) {?>
                            <option value="<?php echo $producto["categoria"] ?>" selected>
                            <?php echo $producto["categoria"] ?>
                        </option>
                        <?php
                        }else{?>
                            <option value="<?php echo $categoria ?>">
                            <?php echo $categoria ?>
                        </option>
                        <?php
                        }
                        
                    } ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input class="form-control" name="stock" type="text"
                    value="<?php echo $producto["stock"] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input class="form-control" name="precio" type="text"
                    value="<?php echo $producto["precio"] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input class="form-control" name="imagen" type="file">
            </div>
            <div class="mb-3">
                <label class="form-label">Descripcion</label>
                <input class="form-control" name="descripcion" type="text" 
                    value="<?php echo $producto["descripcion"] ?>">
            </div>
            <div class="mb-3">
                <input type="hidden" name="id_producto" value="<?php echo $producto["id_producto"] ?>">
                <input class="btn btn-primary" type="submit" value="Modificar">
                <a class="btn btn-secondary" href="index.php">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>