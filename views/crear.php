<?php
session_start();

// Si no existe el array de estudiantes, lo creamos
if (!isset($_SESSION['estudiantes'])) {
  $_SESSION['estudiantes'] = [];
}

// Cuando se envía el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nombre = $_POST["nombre"];
  $matricula = $_POST["matricula"];
  $carrera = $_POST["carrera"];

  // Agregar estudiante al array
  $_SESSION['estudiantes'][] = [
    "nombre" => $nombre,
    "matricula" => $matricula,
    "carrera" => $carrera
  ];

  // Redirigir al index
  header("Location: ../index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Agregar Estudiante</title>
</head>
<body>
  <h1>Agregar Estudiante</h1>
  <form method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" required><br><br>

    <label>Matrícula:</label>
    <input type="text" name="matricula" required><br><br>

    <label>Carrera:</label>
    <input type="text" name="carrera" required><br><br>

    <button type="submit">Guardar</button>
  </form>
  <br>
  <a href="../index.php">Volver a la lista</a>
</body>
</html>
