<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de categorías</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('../util/conexion.php');

        session_start();
        if (!isset($_SESSION["usuario"])) {
            header("location: ../usuario/iniciar_sesion.php");
            exit;
        }
    ?>
    <style>
        
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de categorias</h1>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $categoria = $_POST["categoria"];
                //echo "<h1>$categoria</h1>";
                $sql = "DELETE FROM categorias WHERE categoria = '$categoria'";
                $_conexion -> query($sql);
            }

            $sql = "SELECT * FROM categorias";
            $resultado = $_conexion -> query($sql);
        ?>
        <a class="btn btn-secondary" href="nueva_categoria.php">Nueva categoria</a><br><br>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Categoría</th>
                    <th>Descripción</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($fila = $resultado -> fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $fila["categoria"] . "</td>";
                        echo "<td>" . $fila["descripcion"] . "</td>";
                        ?>
                        <td>
                            <a class="btn btn-primary" 
                               href="editar_categoria.php?categoria=<?php echo $fila["categoria"]?>&descripcion=<?php echo $fila["descripcion"]?>">Editar</a>
                        </td>
                        <td>
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="categoria" value="<?php echo $fila["categoria"] ?>">
                                <input class="btn btn-danger" type="submit" value="Borrar">
                            </form>
                        </td>
                        <?php
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <h3>Volver a Productos</h3>
        <a href="../productos/index.php" class="btn btn-info">Ir a productos</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>