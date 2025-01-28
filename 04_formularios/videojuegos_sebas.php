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
</head>
<body>
    

    <?php

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_titulo = $_POST["titulo"];
            $tmp_consola = $_POST["Consola"];
            $tmp_descripcion = $_POST["descripcion"];
            $tmp_f_lanzamiento = $_POST["f_lanzamiento"];

            //Comprobar el título

            if ($tmp_titulo == "") {
                $err_titulo = "Tienes que introducir el título";
            }else{
                $tmp_titulo = strtoupper($tmp_titulo);
                if (strlen($tmp_titulo) < 1 || strlen($tmp_titulo) > 60) {
                    $err_titulo = "Número de caracteres no válido (tiene que ser entre 1 60)";
                }else{
                    $patron = "/^[A-Z0-9 ]/";
                    if (!preg_match($patron, $tmp_titulo)) {
                        $err_titulo = "El título solo puede tener letras y números";
                    }else{
                        $titulo = $tmp_titulo;
                    }
                }
                
            }

            //Comprobar la consola

            if ($tmp_consola == "") {
                $err_consola = "Error: No se ha podido encontrar la consola";
            }else{
                $consola = $tmp_consola;
            }


            //Comprobar la descripción

            if (strlen($tmp_descripcion) > 255) {
                $err_descripcion = "No te pases, máximo 255 caracteres";
            }

            //Comprobar la fecha de laanzamiento

            if ($tmp_f_lanzamiento == '') {
                $err_f_lanzamiento = "La fecha de lanzamiento es obligatoria";
            }else{
                $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
                if(!preg_match($patron,$tmp_f_lanzamiento)) {
                    $err_f_lanzamiento = "El formato de la fecha es incorrecto";
                } else {
                    $fecha_actual = date("Y-m-d");  //  2024 25 10
                    list($anno_actual,$mes_actual,$dia_actual) = explode('-',$fecha_actual);
                    list($anno_lanzamiento, $mes_lanzamiento, $dia_lanzamiento) = explode("-",$tmp_f_lanzamiento);
                    $edad = $anno_actual - $anno_lanzamiento;
                    if ($edad < -10) {
                        $err_f_lanzamiento = "Fecha de lanzamiento imposible, no hay juegos anunciados de aquí a 10 años";
                    }elseif ($anno_lanzamiento < 1947) {
                        $err_f_lanzamiento = "Fecha de lanzamiento imposible, el primer juego se lanzó el 1 de enero de 1947";
                    }else{
                        $f_lanzamiento = $tmp_f_lanzamiento;
                    }
                    
                }
            }

        }

    ?>
<form action="" method="post">
        <label>Título: </label>
        <input type="text" name="titulo"><br><br>
        <?php if(isset($err_titulo)) echo "<span class='error'>$err_titulo</span>"; ?>
        <label>Consola: </label>
        <input type="radio" name="Consola" value="PC">PC
        <input type="radio" name="Consola" value="Nintendo Switch">Nintendo Switch
        <input type="radio" name="Consola" value="PS4">PlayStation 4
        <input type="radio" name="Consola" value="PS5">PlayStation 5
        <input type="radio" name="Consola" value="XBOX Series">XBOX Series<br><br>
        <?php if(isset($err_consola)) echo "<span class='error'>$err_consola</span>"; ?>
        <textarea name="descripcion" placeholder="Descripción"></textarea>
        <?php if(isset($err_descripcion)) echo "<span class='error'>$err_descripcion</span>"; ?>
        <br><br>
        <label>Fecha de lanzamiento: </label>
        <input type="date" name="f_lanzamiento">
        <?php if(isset($err_f_lanzamiento)) echo "<span class='error'>$err_f_lanzamiento</span>"; ?>
        <input type="submit" value="Buscar">
    </form>

    <?php 
    
    if (isset($titulo) && isset($consola) && isset($f_lanzamiento)) {
        echo "<h1>Toda la información está bien validada!</h1>";
        echo "Título: ";
        echo $titulo;
        echo "<br>";
        echo "Consola: ";
        echo $consola;
        echo "<br>";
        if ($tmp_descripcion != "") {
            echo "Descripción: <br>";
            echo $tmp_descripcion;
            echo "<br>";
        }
        echo "Fecha de lanzamiento: ";
        echo $f_lanzamiento;
        echo "<br>";
    }
    
    ?>
</body>
</html>