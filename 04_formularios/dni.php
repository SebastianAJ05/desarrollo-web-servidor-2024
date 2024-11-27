<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación de formularios</title>
    <?php   
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_dni = $_POST["dni"];
            $tmp_nombre = $_POST["nombre"];
            $tmp_apellido1 = $_POST["apellido1"];
            $tmp_apellido2 = $_POST["apellido2"];
            $tmp_fecha_nacimiento = $_POST["f_nacimiento"];
            $tmp_correo = $_POST["correo"];
            if($tmp_dni == '') {
                $err_dni = "El DNI es obligatorio";
            }else{
                if (strlen($tmp_dni) != 9) {
                    $err_dni = "El DNI no cumple con la cantidad de caracteres adecuada";
                }else{
                    $patron = "/^[0-9]{8}[A-Z]{1}/";
                    $tmp_dni = strtoupper($tmp_dni);
                    if (!preg_match($patron,$tmp_dni)) {
                        $err_dni = "El DNI tiene que tener ocho dígitos y una letra";
                    }else{
                        $p_numerica = substr($tmp_dni,0,8);
                        $resto = (int)$p_numerica % 23;

                        $letra_resto = [
                            "T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E"
                        ];
                        $letra_tmp_dni = substr($tmp_dni,-1);

                        if ($letra_tmp_dni !== $letra_resto[$resto]) {
                            $err_dni = "Letra incorrecta para este DNI";
                        }else {
                            $err_dni = "DNI Correcto";
                            $dni = $tmp_dni;
                        }
                    }
                }
            }
            if ($tmp_nombre == '') {
                $err_nombre = "El nombre es obligatorio";
            }else{
                $patron = "/^[A-Za-zÁÉÍÓÚáéíóúÑñ ]/";
                if (!preg_match($patron, $tmp_nombre)) {
                    $err_nombre = "El nombre no puede contener caracteres especiales ni números";
                }else{
                    $err_nombre = "Nombre correcto";
                    $nombre = $tmp_nombre;
                }
            }


            if ($tmp_apellido1 == '') {
                $err_apellido1 = "El primer apellido es obligatorio";
            }else{
                $patron = "/^[A-Za-zÁÉÍÓÚáéíóúÑñ ]/";
                if (!preg_match($patron, $tmp_apellido1)) {
                    $err_apellido1 = "El primer apellido no puede contener caracteres especiales ni números";
                }else{
                    $err_apellido1 = "Primer Apellido correcto";
                    $apellido1 = $tmp_apellido1;
                }
            }


            if ($tmp_apellido2 == '') {
                $err_apellido2 = "El segundo apellido es obligatorio";
            }else{
                $patron = "/^[A-Za-zÁÉÍÓÚáéíóúÑñ ]/";
                if (!preg_match($patron, $tmp_apellido2)) {
                    $err_apellido2 = "El segundo apellido no puede contener caracteres especiales ni números";
                }else{
                    $err_nombre = "Segundo apellido correcto";
                    $apellido2 = $tmp_apellido2;
                }
            }


            if ($tmp_fecha_nacimiento == '') {
                $err_fecha_nacimiento = "La fecha de nacimiento es obligatoria";
            }else{
                $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
                if(!preg_match($patron,$tmp_fecha_nacimiento)) {
                    $err_fecha_nacimiento = "El formato de la fecha es incorrecto";
                } else {
                    $fecha_actual = date("Y-m-d");  //  2024 25 10
                    list($anno_actual,$mes_actual,$dia_actual) = explode('-',$fecha_actual);
                    list($anno_nacimiento, $mes_nacimiento, $dia_nacimiento) = explode("-",$tmp_fecha_nacimiento);
                    $edad = $anno_actual - $anno_nacimiento;
                    if ($mes_actual >= $mes_nacimiento) {
                        if ($dia_actual < $dia_nacimiento) {
                            $edad--;
                        }
                    }else{
                        $edad--;
                    }
                    echo $edad;
                    if($edad > 120 || $edad < 0){
                        $err_fecha_nacimiento = "Tú fecha de nacimiento no es esa";
                    }else{
                        $fecha_nacimiento = $tmp_fecha_nacimiento;
                    }
                }
            }

            if ($tmp_correo == "") {
                $err_correo = "El correo es obligatorio";
            }else{
                if (!str_contains($tmp_correo, "@")) {
                    $err_correo = "El correo no está bien escrito";
                }else{
                    $correo = $tmp_correo;
                }
                
            }

        }

    ?>
    <form action="" method="post">
        <label>DNI:</label>
        <input type="text" name="dni"><br><br>
        <?php if(isset($err_dni)) echo "<span class='error'>$err_dni</span>"; ?>
        <label>Nombre: </label>
        <input type="text" name="nombre"><br><br>
        <?php if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>"; ?>
        <label>Apellido 1: </label>
        <input type="text" name="apellido1"><br><br>
        <?php if(isset($err_apellido1)) echo "<span class='error'>$err_apellido1</span>"; ?>
        <label>Apellido 2: </label>
        <input type="text" name="apellido2"><br><br>
        <?php if(isset($err_apellido2)) echo "<span class='error'>$err_apellido2</span>"; ?>
        <label>Fecha de nacimiento: </label>
        <input type="date" name="f_nacimiento"><br><br>
        <?php if(isset($err_fecha_nacimiento)) echo "<span class='error'>$err_fecha_nacimiento</span>"; ?>
        <label>Correo electrónico: </label>
        <input type="text" name="correo"><br><br>
        <?php if(isset($err_correo)) echo "<span class='error'>$err_correo</span>"; ?>
        <input type="submit" value="ENVIAR">
    </form>

    <?php 
    
    if (isset($dni) && isset($nombre) && isset($apellido1) && isset($apellido2) && isset($fecha_nacimiento) && isset($correo)) {
        echo "<h1>Toda la información está bien validada!</h1>";
        echo $dni;
        echo "<br>";
        echo $nombre;
        echo "<br>";
        echo $apellido1;
        echo "<br>";
        echo $apellido2;
        echo "<br>";
        echo $fecha_nacimiento;
        echo "<br>";
        echo $correo;
    }
    
    ?>
</body>
</html>