<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$doctors = $conn->query("SELECT * FROM doctors");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Programar Cita Médica</title>
    <script src="main.js" defer></script>
</head>
<body>
    <div class="appointment-form-container">
        <h3>Programe su Cita Médica</h3>
        <form action="appointment.php" method="POST" class="appointment-form">
            <label for="doctor_id">
                <i class="fas fa-user-md"></i> Doctor:
            </label>
            <select name="doctor_id" id="doctor_id" required>
                <?php while ($doctor = $doctors->fetch_assoc()): ?>
                    <option value="<?= $doctor['id'] ?>">
                        <?= $doctor['name'] ?> - <?= $doctor['specialty'] ?>
                    </option>
                <?php endwhile; ?>
            </select>
            
            <label for="appointment_time">
                <i class="fas fa-calendar-alt"></i> Fecha y Hora:
            </label>
            <input type="datetime-local" name="appointment_time" id="appointment_time" required>
            
            <button type="submit">
                <i class="fas fa-calendar-check"></i> Reservar Cita
            </button>
        </form>
        <a href="logout.php" class="logout-link">Cerrar sesión</a>
    </div>
</body>
</html>