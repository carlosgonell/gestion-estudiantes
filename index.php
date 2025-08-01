<?php
session_start();

// Si no existe el array, lo creamos vacío (por si no hay BD)
if (!isset($_SESSION['estudiantes'])) {
  $_SESSION['estudiantes'] = [];
}

$estudiantes = $_SESSION['estudiantes'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Gestión de Estudiantes</title>
</head>
<body>
  <h1>Gestión de Estudiantes</h1>

  <a href="views/crear.php">➕ Agregar estudiante</a> |
  <a href="views/buscar.php">🔍 Buscar estudiante</a>

  <table border="1" cellpadding="5" style="margin-top: 20px;">
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>Matrícula</th>
      <th>Carrera</th>
      <th>Acciones</th>
    </tr>
    <?php foreach ($estudiantes as $i => $est): ?>
      <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $est['nombre'] ?></td>
        <td><?= $est['matricula'] ?></td>
        <td><?= $est['carrera'] ?></td>
        <td>
          <a href="views/editar.php?id=<?= $i ?>">✏️ Editar</a> |
          <a href="views/eliminar.php?id=<?= $i ?>" onclick="return confirm('¿Eliminar estudiante?')">🗑️ Eliminar</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>
