<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE username='$username'");
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: doctores.php');
    } else {
        echo "Invalid credentials!";
    }    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

<script>
        if ("serviceWorker" in navigator) {
    window.addEventListener("load", () => {
        navigator.serviceWorker
            .register("./sw.js")
            .then((registration) => {
                console.log("Service Worker registrado con éxito:", registration);
            })
            .catch((error) => {
                console.error("Error al registrar el Service Worker:", error);
            });
    });
}   
 </script>

    <link rel="manifest" href="./manifest.json">
    <meta name="theme-color" content="#1976d2">
    <link rel="stylesheet" href="css/styles.css">
    <title>Appointment Manager - Login</title>
    <script src="js/loading.js" defer></script>

</head>

<body>
    <!-- Pantalla de carga -->
    <div id="splash-screen">
        <h1>Cargando...</h1>
        <div class="spinner"></div>
    </div>

    <div id="login-form" style="display: none;">
        <form method="POST">
            <img src="doctores.png" alt="">
            <h2>Iniciar sesion</h2>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
            <p><a href="register.php">Registrarse</a></p>
        </form>
    </div>
</body>
</html>
