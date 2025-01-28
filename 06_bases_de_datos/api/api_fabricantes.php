<?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 ); 

    header("Content-type: application/json");
    include("conexion_consolas.php");

    $metodo = $_SERVER["REQUEST_METHOD"];
    $entrada = json_decode(file_get_contents("php://input"),true);

    switch ($metodo) {
        case 'GET':
            manejarGet($_conexion);
            break;
        case 'POST':
            manejarPost($_conexion, $entrada);
            break;
        case 'PUT':
            manejarPut($_conexion, $entrada);
            break;
        case "DELETE":
            manejarDelete($_conexion, $entrada);
            break;
        default:
            echo json_encode(["mensaje" => "Petición no válida"]);
    }

    function manejarGet($_conexion){
        //echo json_encode(["método" => "get"]);
        $sql = "SELECT * FROM fabricantes";
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute();
        $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultado);
    }
    function manejarPost($_conexion, $entrada){
        //echo json_encode(["método" => "post"]);
        $sql = "INSERT INTO fabricantes VALUES (:fabricante, :pais)";
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute([
            "fabricante" => $entrada["fabricante"],
            "pais" => $entrada["pais"],
        ]);
        if ($stmt) {
            echo json_encode(["mensaje" => "el fabricante se ha creado"]);
        }else{
            echo json_encode(["mensaje" => "error al crear el fabricante"]);
        }
    }
    function manejarPut($_conexion, $entrada){
        echo json_encode(["método" => "put"]);
    }
    function manejarDelete($_conexion, $entrada){
        echo json_encode(["método" => "delete"]);
        
    }
?>