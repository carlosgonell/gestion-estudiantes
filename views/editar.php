<?php
session_start();

if (!isset($_SESSION['estudiantes'])) {
  $_SESSION['estudiantes'] = [];
}

// Validar si recibimos un ID válido
if (!isset($_GET['id']) || !isset($_SESSION['estudiantes'][$_GET['id']])) {
  header("Location: ../index.php");
  exit();
}

$id = $_GET['id'];
$estudiante = $_SESSION['estudiantes'][$id];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $_SESSION['estudiantes'][$id] = [
    "nombre" => $_POST["nombre"],
    "matricula" => $_POST["matricula"],
    "carrera" => $_POST["carrera"]
  ];
  header("Location: ../index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Estudiante</title>
</head>
<body>
  <h1>Editar Estudiante</h1>

  <form method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?= $estudiante['nombre'] ?>" required><br><br>

    <label>Matrícula:</label>
    <input type="text" name="matricula" value="<?= $estudiante['matricula'] ?>" required><br><br>

    <label>Carrera:</label>
    <input type="text" name="carrera" value="<?= $estudiante['carrera'] ?>" required><br><br>

    <button type="submit">Guardar Cambios</button>
  </form>

  <br>
  <a href="../index.php">Volver al inicio</a>
</body>
</html>
