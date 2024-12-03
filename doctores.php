<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctores</title>
    <style>
        /* General */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: #4a90e2;
            margin-top: 20px;
        }

        /* Lista de Doctores */
        .doctor-list {
            list-style: none;
            padding: 0;
            max-width: 600px;
            width: 100%;
        }

        .doctor-list li {
            background-color: #fff;
            margin: 15px 0;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-left: 5px solid #4a90e2;
        }

        .doctor-list h2 {
            color: #4a90e2;
            margin: 0;
            font-size: 1.5em;
        }

        .doctor-list p {
            margin: 5px 0;
            color: #666;
        }

        /* Botón de Dashboard */
        .dashboard-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4a90e2;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1em;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .dashboard-button:hover {
            background-color: #357ABD;
        }
    </style>
</head>
<body>
    <h1>Doctores</h1>

    <?php
    $doctores = [
        ["nombre" => "Dr. Jose Pérez", "especialidad" => "Cardiología", "telefono" => "555-1234", "direccion" => "Av. Salud #100"],
        ["nombre" => "Dra. Amely Rosas", "especialidad" => "Neurología", "telefono" => "555-5678", "direccion" => "Calle Bienestar #200"],
        ["nombre" => "Dra. Emilio Cortes", "especialidad" => "Pediatría", "telefono" => "555-5678", "direccion" => "Calle Bienestar #200"],

    ];
    ?>

    <ul class="doctor-list">
        <?php foreach ($doctores as $doctor): ?>
            <li>
                <h2><?php echo $doctor["nombre"]; ?></h2>
                <p>Especialidad: <?php echo $doctor["especialidad"]; ?></p>
                <p>Teléfono: <?php echo $doctor["telefono"]; ?></p>
                <p>Dirección: <?php echo $doctor["direccion"]; ?></p>
            </li>
        <?php endforeach; ?>
    </ul>

    <form action="dashboard.php" method="get">
        <button type="submit" class="dashboard-button">Agendar cita</button>
    </form>
</body>
</html>
