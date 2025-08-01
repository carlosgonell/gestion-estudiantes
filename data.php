<?php
function conectar() {
    $host = "localhost";
    $user = "root";
    $pass = "060305";
    $db = "gestion_estudiantes";

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("❌ Conexión fallida: " . $conn->connect_error);
    }

    return $conn;
}
?>
