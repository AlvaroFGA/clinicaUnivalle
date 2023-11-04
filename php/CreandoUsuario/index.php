<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Ver Usuario</title>
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
    <h2>Lista de Usuarios</h2>
    <button class='submit' ><a href='registrPersona.html'>Crear</a></button>
    <span></span>
    <button class='submit' ><a href='../../index.html'>Volver</a></button>
    
    <table class = 'striped'>
        <thead>
            <tr>
                <th>ID</th>
                <th>CI</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Fecha de Nacimiento</th>
                <th>Procedencia</th>
                <th>Usuario</th>
                <th>ID Areas</th>
                <th>Nombre del Area</th>
              

            </tr>
        </thead>
        
        <tbody>
            <?php
                require("../conn.php");
                $sql = "SELECT idusuario, per.nombres, per.apellidos, per.direccion, per.telefono, per.fecha_nac, per.procedencia, usuario,
                are.idareas, are.nombre, per.ci 
                FROM usuarios usu 
                JOIN personas per ON usu.personas_ci = per.ci
                JOIN areas are ON usu.areas_idareas = are.idareas";
                $result = mysqli_query($conexion, $sql);
                
                // Verificar si la consulta se ejecutó correctamente
                if (!$result) {
                    
                    die("Error de consulta: " . mysqli_error($conn));
                }

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["idusuario"] . "</td>";
                        echo "<td>" . $row["ci"] . "</td>";
                        echo "<td>" . $row["nombres"] . "</td>";
                        echo "<td>" . $row["apellidos"] . "</td>";
                        echo "<td>" . $row["direccion"] . "</td>";
                        echo "<td>" . $row["telefono"] . "</td>";
                        echo "<td>" . $row["fecha_nac"] . "</td>";
                        echo "<td>" . $row["procedencia"] . "</td>";
                        echo "<td>" . $row["usuario"] . "</td>";
                        echo "<td>" . $row["idareas"] . "</td>";
                        echo "<td>" . $row["nombre"] . "</td>";
                        
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
