<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos de fútbol</title>
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
    
<?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $tmp_nombre = $_POST["nombre"];
                $tmp_iniciales = $_POST["iniciales"];
                $tmp_liga = $_POST["liga"];
                $tmp_fecha_fundacion = $_POST["f_fundacion"];
                $tmp_n_jugadores = $_POST["n_jugadores"];

                //Nombre
                if ($tmp_nombre == '') {
                    $err_nombre = "El nombre es obligatorio";
                }else{
                    if (strlen($tmp_nombre) < 3 || strlen($tmp_nombre) > 20) {
                        $err_nombre = "El nombre debe tener entre 3 y 20 caracteres";
                    }else{
                        $patron = "/^[a-zA-Z .]+$/";
                        if (!preg_match($patron, $tmp_nombre)) {
                            $err_nombre = "El nombre solo puede contener letras,
                            puntos y espacios en blanco";
                        }else{
                            $nombre = $tmp_nombre;
                        }
                    }
                }

                //Iniciales

                if (strlen($tmp_iniciales) !== 3) {
                    $err_iniciales = "Las iniciales deben contener exactamente 3 caracteres";
                }else{
                    $patron = "/^[A-Za-z]{3}/";
                    if (!preg_match($patron, $tmp_iniciales)) {
                        $err_iniciales = "Las solo pueden contener letras";
                    }else{
                        $iniciales = $tmp_iniciales;
                    }
                }


                //Liga
                if (isset($_POST["liga"])){
                    $tmp_liga = $_POST["liga"];
                    if ($tmp_liga == "") {
                        $err_liga = "La liga es obligatoria";
                    }else{
                        $ligas_validas = ["divi_1","divi_2","divi_3"];
                        if (!in_array($tmp_liga, $ligas_validas)) {
                            $err_liga = "ELige una liga válida";
                        }else{
                            $liga = $tmp_liga;
                        }
                    }
                } 
                else{
                    $err_liga = "La liga es obligatoria";
                } 


                //Número de jugadores

                if ($tmp_n_jugadores == "") {
                    $err_n_jugadores = "El número de jugadores es obligatorio";
                }else{
                    if ($tmp_n_jugadores < 26 || $tmp_n_jugadores > 32) {
                        $err_n_jugadores = "El número de jugadores debe estar entre 26 y 32";
                    }else{
                        $n_jugadores = $tmp_n_jugadores;
                    }
                }
               
                //Fecha de fundación
                if ($tmp_fecha_fundacion == '') {
                    $err_fecha_fundacion = "La fecha de fundación es obligatoria";
                }else{
                    $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
                    if(!preg_match($patron,$tmp_fecha_fundacion)) {
                        $err_fecha_fundacion = "El formato de la fecha es incorrecto";
                    } else {
                        $fecha_actual = date("Y-m-d");  //  2024 06 11
                        list($anno_actual,$mes_actual,$dia_actual) = explode('-',$fecha_actual);
                        list($anno_fundacion, $mes_fundacion, $dia_fundacion) = explode("-",$tmp_fecha_fundacion);
                        if ($anno_fundacion < 1889) {
                            $err_fecha_fundacion = "El año no puede ser anterior a 1889";
                        }elseif ($anno_fundacion > $anno_actual) {
                            $err_fecha_fundacion = "El año no puede ser superior a hoy";
                        }else{
                            $fecha_fundacion = $tmp_fecha_fundacion;
                        }
                        
                    }
                }
            }
        ?>
<!-- Content here -->

<h1>Formulario de Equipos de fútbol</h1>
    <form class="col-6" action="" method="post">
        <div class="mb-3">
            <label class="form-label">Nombre del equipo</label>
            <input class="form-control" type="text" name="nombre">
            <?php if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>"; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Iniciales</label>
            <input class="form-control" name="iniciales" type="text">
            <?php if(isset($err_iniciales)) echo "<span class='error'>$err_iniciales</span>"; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Liga</label>
            <div class="form-check">
                <select name="liga">
                    <option value="divi_1">Liga EA Sports</option>
                    <option value="divi_2">Liga Hypermotion</option>
                    <option value="divi_3">Primera RFEF</option>
                </select>
            </div>
            <?php if(isset($err_liga)) echo "<span class='error'>$err_liga</span>"; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Número de jugadores: </label>
            <input class="form-control" name="n_jugadores" type="number">
            <?php if(isset($err_n_jugadores)) echo "<span class='error'>$err_n_jugadores</span>"; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha de fundación</label>
            <input class="form-control" name="f_fundacion" type="date">
            <?php if(isset($err_fecha_fundacion)) echo "<span class='error'>$err_fecha_fundacion</span>"; ?>
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Enviar">
        </div>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php 
    
    if (isset($nombre) && isset($iniciales) && isset($fecha_fundacion) && isset($liga) && isset($n_jugadores)) {
        echo "<h1>Toda la información está bien validada!</h1>";
        echo "Nombre: ";
        echo $nombre;
        echo "<br>";
        echo "Inciales: ";
        echo $iniciales;
        echo "<br>";
        echo "Liga: ";
        echo $liga;
        echo "<br>";
        echo "Número de jugadores: ";
        echo $n_jugadores;
        echo "<br>";
        echo "Fecha de fundación: ";
        echo $fecha_fundacion;
        echo "<br>";
    }
    
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>