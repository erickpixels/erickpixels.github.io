<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit();
}

$appointment_id = $_GET['appointment_id'] ?? null;
$appointment = null;

if ($appointment_id) {
    // Consulta preparada para obtener detalles de la cita
    $stmt = $conn->prepare("
        SELECT appointments.*, 
               doctors.name AS doctor_name, 
               doctors.specialty AS doctor_specialty 
        FROM appointments 
        JOIN doctors ON appointments.doctor_id = doctors.id 
        WHERE appointments.id = ?
    ");
    $stmt->bind_param("i", $appointment_id); // Usar "i" para enteros
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $appointment = $result->fetch_assoc();
    }
    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Confirmación de Cita Médica</title>
</head>
<body>
    <div class="confirmation-container">
        <?php if ($appointment): ?>
            <h3>Registro Exitoso</h3>
            <p>Su cita ha sido registrada exitosamente. A continuación, los detalles de su cita:</p>
            <div class="appointment-details">
                <p><strong>Doctor:</strong> <?= htmlspecialchars($appointment['doctor_name']) ?> (<?= htmlspecialchars($appointment['doctor_specialty']) ?>)</p>
                <p><strong>Fecha y Hora:</strong> <?= date("d-m-Y H:i", strtotime($appointment['appointment_time'])) ?></p>
            </div>
        <?php else: ?>
            <p>No se ha encontrado la información de la cita.</p>
        <?php endif; ?>
        <a href="dashboard.php" class="button">Volver al inicio</a>
    </div>
</body>
</html>
