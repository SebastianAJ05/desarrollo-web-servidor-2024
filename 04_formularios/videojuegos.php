<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuegos</title>
    <?php   
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $tmp_titulo = $_POST["titulo"];
                $tmp_descripcion = $_POST["descripcion"];
                $tmp_fecha_lanzamiento = $_POST["fecha_lanzamiento"];

                if ($tmp_titulo == '') {
                    $err_titulo = "El título es obligatorio";
                }else{
                    if (strlen($tmp_titulo) > 60) {
                        $err_titulo = "El título debe tener entre 1 y 60 caracteres";
                    }else{
                        $patron = "/^[a-zA-Z0-9 ]+$/";
                        if (!preg_match($patron, $tmp_titulo)) {
                            $err_titulo = "El título solo puede contener letras,
                            números y espacios en blanco";
                        }else{
                            $titulo = $tmp_titulo;
                        }
                    }
                }
                if (isset($_POST["consola"])){
                    $tmp_consola = $_POST["consola"];
                    if ($tmp_consola == "") {
                        $err_consola = "La consola es obligatoria";
                    }else{
                        $consolas_validas = ["ps4","ps5","switch","pc","xboxsx"];
                        if (!in_array($tmp_consola, $consolas_validas)) {
                            $err_consola = "ELige una consola válida";
                        }
                    }
                } 
                else{
                    $err_consola = "La consola es obligatoria";
                } 
               
                if (strlen($tmp_descripcion) > 255) {
                    $err_descripcion = "La descripción no puede tener más de 255 caracteres";
                }else{
                    $patron = "/^[A-Za-z0-9 .,]+$/";
                    if (!preg_match($patron, $tmp_descripcion)) {
                        $err_descripcion = "La descripción solo puede contener letras, números, comas, puntos
                        y espacios en blanco";
                    }else{
                        $descripcion = $tmp_descripcion;
                    }
                }
                if ($tmp_fecha_lanzamiento == '') {
                    $err_fecha_lanzamiento = "La fecha de lanzamiento es obligatoria";
                }else{
                    $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
                    if(!preg_match($patron,$tmp_fecha_lanzamiento)) {
                        $err_f_lanzamiento = "El formato de la fecha es incorrecto";
                    } else {
                        $fecha_actual = date("Y-m-d");  //  2024 25 10
                        list($anno_actual,$mes_actual,$dia_actual) = explode('-',$fecha_actual);
                        list($anno_lanzamiento, $mes_lanzamiento, $dia_lanzamiento) = explode("-",$tmp_fecha_lanzamiento);
                        $edad = $anno_lanzamiento - $anno_actual;
                        if ($edad > 10) {
                            if ($mes_lanzamiento - $mes_actual > 0) {
                                $err_fecha_lanzamiento = "El videojuego o puede lanzarse dentro de más de 10 años";
                            }else{
                                if ($dia_lanzamiento - $dia_actual <= 0) {
                                    $err_fecha_lanzamiento = "El videojuego o puede lanzarse dentro de más de 10 años";
                                }else{
                                    $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                                }
                            }
                        }elseif ($anno_lanzamiento < 1947) {
                            $err_fecha_lanzamiento = "Fecha de lanzamiento imposible, el primer juego se lanzó el 1 de enero de 1947";
                        }else{
                            $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                        }
                        
                    }
                }
            }
        ?>
<!-- Content here -->
    <h1>Formulario de Videojuegos</h1>
    <form class="col-6" action="" method="post">
        <div class="mb-3">
            <label class="form-label">Título</label>
            <input class="form-control" type="text" name="titulo">
            <?php if(isset($err_titulo)) echo "<span class='error'>$err_titulo</span>"; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Consola</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="consola" value="ps4">
                <label class="form-check-label">PlayStation 4</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="consola" value="ps5">
                <label class="form-check-label">PlayStation 5</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="consola" value="switch">
                <label class="form-check-label">Nintendo Switch</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="consola" value="xboxsx">
                <label class="form-check-label">Xbox Series X/S</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="consola" value="switch">
                <label class="form-check-label">PC</label>
            </div>
            <?php if(isset($err_consola)) echo "<span class='error'>$err_consola</span>"; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea class="form-control" name="descripcion"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha de lanzamiento</label>
            <input class="form-control" name="fecha_lanzamiento" type="date">
            <?php if(isset($err_fecha_lanzamiento)) echo "<span class='error'>$err_fecha_lanzamiento</span>"; ?>
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Enviar">
        </div>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php 
    
    if (isset($titulo) && isset($consola) && isset($fecha_lanzamiento)) {
        echo "<h1>Toda la información está bien validada!</h1>";
        echo "Título: ";
        echo $titulo;
        echo "<br>";
        echo "Consola: ";
        echo $consola;
        echo "<br>";
        if (isset($descripcion)) {
            echo "<br>";
            echo $descripcion;
            echo "<br>";
        }
        echo "Fecha de lanzamiento: ";
        echo $fecha_lanzamiento;
        echo "<br>";
    }
    
    ?>
</body>
</html>