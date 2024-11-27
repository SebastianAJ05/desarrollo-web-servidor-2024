<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Anime</title>
    <style>
        .error{
            color: red;
        }
    </style>
    <?php   
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );   
        
    ?>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        
        //Compruebo el título
        $tmp_titulo = $_POST["titulo"];

        if ($tmp_titulo == "") {
            $err_titulo = "El título es obligatorio";
        }elseif(strlen($tmp_titulo) > 80){
            $err_titulo = "El título no puede tener más de 80 caracteres";
        }else{
            $titulo = $tmp_titulo;
        }

        //Compruebo el nombre del estudio
        $estudios_validos = ["Toei Animation", "Trigger","Madhouse", "Bones", "CloverWorks"]; //Declaro el array fuera para usarlo en el formulario
        if (isset($_POST["estudio"])) {
            $tmp_estudio = $_POST["estudio"];
            if ($tmp_estudio == "0") {
                $err_estudio = "El nombre del estudio es obligatorio";
            }else{
                if (!in_array($tmp_estudio, $estudios_validos)) {
                    $err_estudio = "Estudio $tmp_estudio no encontrado";
                }else{
                    $estudio = $tmp_estudio;
                }
            }
        }else{
            $err_estudio = "Selecciona un estudio";
        }
        //Compruebo el año de estreno

        $tmp_anno_estreno = $_POST["anno_estreno"];
        $anno = date("Y");
        if ($tmp_anno_estreno == "") {
            $err_anno_estreno = "Fecha de estreno no introducida";
            
        }elseif ($tmp_anno_estreno < 1960 || $tmp_anno_estreno > ($anno+5)) {
            $err_anno_estreno = "El año de estreno debe estar entre 1960 y dentro de 5 años inclusive";
        }
        else{
            $anno_estreno = $tmp_anno_estreno;
        }

        //Compruebo el número de temporadas

        $tmp_num_temporadas = $_POST["num_temporadas"];

        if ($tmp_num_temporadas == "") {
            $err_num_temporadas = "El número de temporadas es obligatorio";
        }else{
            if ($tmp_num_temporadas < 1 || $tmp_num_temporadas > 99) {
                $err_num_temporadas = "El número de temporadas debe estar entre 1 y 99";
            }else{
                $num_temporadas = $tmp_num_temporadas;
            }
        }
    }

    ?>
        
    <form action="" method="post">
        <label>Título: </label>
        <input type="text" name="titulo">
        <?php if (isset($err_titulo)) echo "<span class='error'>$err_titulo</span>";?>
        <br><br>
        <label>Nombre del estudio: </label>
        <select name="estudio">
            <option value="0" selected disabled>Elige un anime</option>
            <?php
                foreach ($estudios_validos as $estudio_valido) {
                    ?>
                        <?php echo "<option value='$estudio_valido'>$estudio_valido</option>";
                }


            ?>
        </select>
        <?php if (isset($err_estudio)) echo "<span class='error'>$err_estudio</span>";?>
        <br><br>
        <label>Año de estreno: </label>
        <input type="text" name="anno_estreno">
        <?php if (isset($err_anno_estreno)) echo "<span class='error'>$err_anno_estreno</span>";?>
        <br><br>
        <label>Número de temporadas: </label>
        <input type="text" name="num_temporadas">
        <?php if (isset($err_num_temporadas)) echo "<span class='error'>$err_num_temporadas</span>";?>
        <br><br>
        <input type="submit" value="Enviar">
    </form>
    
</body>
</html>