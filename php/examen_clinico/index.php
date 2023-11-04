<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Anamnesis</title>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    <style>
        th,td{
            padding: 10px;
            margin: 5px;
        }
        a{
          color:white;  
          text-decoration: none;
        }
        a:hover{
            color:white;
        }

        
    </style>
</head>
<body>
    <h2>Tabla Anamnesis</h2>
    <a href="forms.php" class="btn btn-primary">Crear</a>
    <?php
    // Conexión a la base de datos (reemplaza con tus credenciales)
    require('../conn.php');

    // Consulta para obtener los datos de la tabla "anamnesis"
    $sql = "SELECT * FROM anamnesis";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>ID Paciente</th>
                    <th>Motivo de Consulta</th>
                    <th>Enfermedad Actual</th>
                    <th>Fecha</th>
                </tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["idanamnesis"]. "</td>
                    <td>" . $row["pacientes_idpacientes"]. "</td>
                    <td>" . $row["motivo_consulta"]. "</td>
                    <td>" . $row["enfermedad_actual"]. "</td>
                    <td>" . $row["fecha"]. "</td>
                </tr>";
        }
        echo "</table>";

    } else {
        echo "No se encontraron registros en la tabla anamnesis.";
    }

    ?>

    <!-- Botón para crear -->
</body>
</html>
