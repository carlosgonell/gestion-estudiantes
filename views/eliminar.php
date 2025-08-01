<?php
// Conexión a la base de datos
include_once '../data.php';

// Verificar si viene un ID por GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar el estudiante por ID
    $query = "DELETE FROM estudiantes WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "✅ Estudiante eliminado correctamente.";
    } else {
        echo "❌ Error al eliminar el estudiante.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "⚠️ ID no proporcionado.";
}
?>
<br><br>
<a href="../index.php">← Volver al listado</a>
