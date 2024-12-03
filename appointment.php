<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $doctor_id = $_POST['doctor_id'];
    $appointment_time = $_POST['appointment_time'];

    // Inserta la cita en la base de datos
    $stmt = $conn->prepare("INSERT INTO appointments (user_id, doctor_id, appointment_time) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $user_id, $doctor_id, $appointment_time);

    if ($stmt->execute()) {
        // Obtén el ID de la cita recién creada
        $appointment_id = $stmt->insert_id;

        // Cierra el statement para liberar recursos
        $stmt->close();

        // Redirige a la página de confirmación con el ID de la cita
        header("Location: http://localhost/appointment_manager/confirm_appointment.php?appointment_id=$appointment_id");
        exit();
    } else {
        // Manejo de errores
        echo "Error al reservar la cita. Intenta nuevamente.";
        $stmt->close();
    }
}
?>
