<!DOCTYPE html>
<html>
<head>
    <title>Actualizar datos</title>
</head>
<body>

<div style="float: left; width: 50%;" id="datosPersonales">
    <h2>Datos Personales</h2>
</div>

<?php
    include('modelo/conexion.php');
    $sql = "SELECT id, nombre FROM prueba_cu WHERE aprobado = 1";
    $result = $conn->query($sql);

    echo '<div style="float: right; width: 50%;">';
    echo '<h2>Menú</h2>';

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $nombre = $row['nombre'];
            echo '<button onclick="cargarDatos(' . $id . ')">' . $nombre . '</button>';
        }
    } else {
        echo 'No se encontraron datos que necesiten revision';
    }

    echo '</div>';

$conn->close();
?>

<script>
function cargarDatos(idBoton) {
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            // Actualiza los datos en la parte izquierda con la respuesta obtenida
            document.getElementById("datosPersonales").innerHTML = this.responseText;
        }
    };

    xhttp.open("GET", "prueba.php?id=" + idBoton, true);
    xhttp.send();
}
</script>

</body>
</html>

