<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../util/estilos.css">
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

            $sql = "SELECT * FROM categorias ORDER BY categoria";
            $resultado = $_conexion -> query($sql);
            $categorias = [];

            //var_dump($resultado);

            while($fila = $resultado -> fetch_assoc()) {
                array_push($categorias, $fila["categoria"]);
            }
            //print_r($estudios);
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $tmp_nombre = $_POST["nombre"];
                $tmp_precio = $_POST["precio"];
                $tmp_stock = $_POST["stock"];
                $tmp_descripcion = $_POST["descripcion"];
                // $_FILES, QUE ES UN ARRAY DOBLE!!!
                $direccion_temporal = $_FILES["imagen"]["tmp_name"];
                $nombre_imagen = $_FILES["imagen"]["name"];
                $imagen = "../imagenes/" . $nombre_imagen;
                move_uploaded_file($direccion_temporal, "$imagen");

                //Valido el nombre

                if (!isset($tmp_nombre)) {
                    $err_nombre = "ERROR: Nombre no leído";
                }else{
                    if ($tmp_nombre == "") {
                        $err_nombre = "El nombre es obligaotrio";
                    }else{
                        $tmp_nombre = sanear($tmp_nombre);

                        if (strlen($tmp_nombre) < 2 || strlen($tmp_nombre) > 50) {
                            $err_nombre = "El nombre debe tener entre 2 y 50 caracteres";
                        }else{
                            $patron = "/^[A-Za-z0-9 ñÑÁÉÍÓÚáéíóú]/";
                            if (!preg_match($patron, $tmp_nombre)) {
                                $err_nombre = "El nombre sólo puede tener letras, números y espacios en blanco";
                            }else{
                                $nombre = $tmp_nombre;
                            }
                        }
                    }
                }

                //Valido el precio

                if (!isset($tmp_precio)) {
                    $err_precio = "ERROR: Nombre no leído";
                }else{
                    if ($tmp_precio == "") {
                        $err_precio = "El precio es obligatorio";
                    }else{
                        $tmp_precio = sanear($tmp_precio);
                        $patron = "/^[0-9]{1,4}(\.[0-9]{1,2})?/";
                        if (!preg_match($patron, $tmp_precio)) {
                            $err_precio = "El precio debe tener la parte numérica y la parte decimal";
                        }else{
                            $precio = $tmp_precio;
                        }
                    }
                }

                //Valido la descripción

                if (!isset($tmp_descripcion)) {
                    $err_descripcion = "ERROR: Descripción no leída";
                }else{
                    if ($tmp_descripcion == "") {
                        $err_descripcion = "La descripción es obligaotria";
                    }else{
                        $tmp_descripcion = sanear($tmp_descripcion);
                        if (strlen($tmp_descripcion) > 255) {
                            $err_descripcion = "La descripción no puede tener más de 255 caracteres";
                        }else{
                            $descripcion = $tmp_descripcion;
                        }
                    }
                }

                //Valido el stock

                if (!isset($tmp_stock)) {
                    $err_stock = "ERROR: Stock no leido";
                }else{
                    if ($tmp_stock == "") {
                        $stock = 0;
                    }else{
                        if (filter_var($tmp_stock, FILTER_VALIDATE_INT) === FALSE) {
                            $err_stock = "El stock debe un número";
                        }else{
                            if ($tmp_stock >= 1000) {
                                $err_stock = "El stock no puede tener más de 3 cifras";
                            }else{
                                $stock = $tmp_stock;
                            }
                        }
                    }
                }

                //Valido la categoría

                if (!isset($_POST["categoria"])) {
                    $err_categoria = "ERROR: Categoría no leída";
                }else{
                    $categoria = $_POST["categoria"];
                }


                if (isset($nombre) && isset($precio) && isset($descripcion) && isset($stock) && isset($categoria)) {
                    $sql = "INSERT INTO productos 
                    (nombre, precio, categoria, stock, imagen, descripcion)
                    VALUES
                    ('$nombre', $precio, '$categoria', $stock, 
                            '$imagen', '$descripcion')
                    ";

                    $_conexion -> query($sql);

                    # 1. Prepare
                $sql = $_conexion -> prepare("INSERT INTO productos 
                    (nombre, precio, categoria, stock, imagen, descripcion)
                    VALUES
                    (?, ?, ?, ?, ?, ?)
                    ");

                    # 2. Binding

                    $sql -> bind_param("sisiss",$nombre, $precio,$categoria, $stock, $imagen, $descripcion);

                    # 3. Execute

                    $sql -> execute();

                    function manejarPost($_conexion, $entrada){
                        //echo json_encode(["método" => "post"]);
                        $sql = "INSERT INTO productos (nombre, precio, categoria, stock, descripcion) VALUES (:nombre, :precio, :categoria, :stock, :descripcion)";
                        $stmt = $_conexion -> prepare($sql);
                        $stmt -> execute([
                            "nombre" => $entrada["nombre"],
                            "precio" => $entrada["precio"],
                            "categoria" => $entrada["categoria"],
                            "stock" => $entrada["stock"],
                            "descripcion" => $entrada["descripcion"]
                        ]);
                        if ($stmt) {
                            echo json_encode(["mensaje" => "el producto se ha creado"]);
                        }else{
                            echo json_encode(["mensaje" => "error al crear el producto"]);
                        }
                    }

                    manejarPost($_conexion, $entrada);

                    echo "<h1 class='exito'>Todo está bien!! Campos insertados!!</h1>";
                }
                
                
            }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input class="form-control" name="nombre" type="text">
                <?php if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>"?>
            </div>
            <div class="mb-3">
                <label class="form-label">Precio: </label>
                <input class="form-control" name="precio" type="text">
                <?php if(isset($err_precio)) echo "<span class='error'>$err_precio</span>"?>
            </div>
            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <select class="form-select" name="categoria">
                    <option value="" selected disabled hidden>--- Elige una categoria ---</option>
                    <?php foreach($categorias as $categoria) { ?>
                        <option value="<?php echo $categoria ?>">
                            <?php echo $categoria ?>
                        </option>
                    <?php } ?>
                </select>
                <?php if(isset($err_categoria)) echo "<span class='error'>$err_categoria</span>"?>
            </div>            
            <div class="mb-3">
                <label class="form-label">Stock: </label>
                <input class="form-control" name="stock" type="text">
                <?php if(isset($err_stock)) echo "<span class='error'>$err_stock</span>"?>
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input class="form-control" name="imagen" type="file">
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