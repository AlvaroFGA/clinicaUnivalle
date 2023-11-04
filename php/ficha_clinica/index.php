<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name=viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
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
    <link rel='stylesheet' href='style.css' type='text/css' media='all'>

    </head>
<body>
    <div class='container-fluid'>
    <h2>Tabla</h2>
    <button class='submit' ><a href='forms3.php'>Crear</a></button>
    <table class = 'striped'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombres Paciente</th>
                <th>Apellidos Paciente</th>
                <th>Tratamiento</th>
                <th>Descripcion</th>
                <th>Fecha diagnostico</th>
                <th>Fecha</th>
                <th>Area</th>
                <th>Nombre Usuario</th>
                <th>Apellido Usuario</th>
                <th>Diagnostico</th>
                <th>Pieza</th>
                <th>Recomendaciones</th>
                <th>Observacion / Evolucion</th>
                <th>Proxima Cita</th>
                <th>Aprobacion docente</th>
            </tr>
        </thead>
        
        <tbody>
            <?php
                require("../conn.php");
                $sql = "SELECT idficha_clinica, pac.nombres, pac.apellidos, tr.nombre, pt.descripcion, pt.fecha_diagnostico, fecha, AREA, us.nombres 'Nombres Usuario', us.apellidos 'Apellidos Usuario', diagnostico, pieza, indic_recom_medicacion, observacion_evolucion, proxima_cita, aprob_docente 
                FROM ficha_clinica fc 
                JOIN plan_tratamientos pt ON fc.plan_tratamientos_idplan_tratamientos = pt.idplan_tratamientos
                JOIN pacientes pc ON pt.pacientes_idpacientes = pc.idpacientes
                JOIN personas pac ON pc.personas_ci = pac.ci
                JOIN tratamientos tr ON pt.tratamientos_idtratamientos = tr.idtratamientos
                JOIN usuarios u ON fc.usuarios_idusuarios = u.idusuario
                JOIN personas us ON u.personas_ci = us.ci";
                $result = mysqli_query($conexion, $sql);
                
                // Verificar si la consulta se ejecutó correctamente
                if (!$result) {
                    
                    die("Error de consulta: " . mysqli_error($conn));
                }

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["idficha_clinica"] . "</td>";
                        echo "<td>" . $row["nombres"] . "</td>";
                        echo "<td>" . $row["apellidos"] . "</td>";
                        echo "<td>" . $row["nombre"] . "</td>";
                        echo "<td>" . $row["descripcion"] . "</td>";
                        echo "<td>" . $row["fecha_diagnostico"] . "</td>";
                        echo "<td>" . $row["fecha"] . "</td>";
                        echo "<td>" . $row["AREA"] . "</td>";
                        echo "<td>" . $row["Nombres Usuario"] . "</td>";
                        echo "<td>" . $row["Apellidos Usuario"] . "</td>";
                        echo "<td>" . $row["diagnostico"] . "</td>";
                        echo "<td>" . $row["pieza"] . "</td>";
                        echo "<td>" . $row["indic_recom_medicacion"] . "</td>";
                        echo "<td>" . $row["observacion_evolucion"] . "</td>";
                        echo "<td>" . $row["proxima_cita"] . "</td>";
                        echo "<td>" . $row["aprob_docente"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "No se encontraron resultados.";
                }
            ?>
        </tbody>
    </table>
    </div>
</body>
</html>
