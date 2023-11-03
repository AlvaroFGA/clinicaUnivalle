<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Recibos</title>
</head>
<body>
    <h2>Recibos</h2>
    <table border="1">
        <tr>
            <th>Fecha</th>
            <th>Nro de Recibo</th>
            <th>Concepto</th>
            <th>Debe</th>
            <th>Haber</th>
            <th>Saldo</th>
            <th>E.Material</th>
        </tr>

        <?php
        $idplantrat = 2;
        include '../modelo/conexion.php';
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        $sql = "SELECT fecha, idrecibos, concepto, debe, haber, saldo, ematerial FROM recibos WHERE idplantrat = '$idplantrat'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["fecha"] . "</td>";
                echo "<td>" . $row["idrecibos"] . "</td>";
                echo "<td>" . $row["concepto"] . "</td>";
                echo "<td>" . $row["debe"] . "</td>";
                echo "<td>" . $row["haber"] . "</td>";
                echo "<td>" . $row["saldo"] . "</td>";
                echo "<td>" . $row["ematerial"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "No se encontraron resultados.";
        }

        $conn->close();
        ?>
    </table>

    <h2>Insertar Nuevo Recibo</h2>
    <form action="insertarRecibos.php" method="post">
        <input type="hidden" name="idRecibo" value="<?php echo $idplantrat;?>">
        <label>Concepto:
            <input type="text" name="concepto" required>
        </label><br>
        <label>Debe:
            <input type="text" name="debe" required>
        </label><br>
        <label>Haber:
            <input type="text" name="haber" required>
        </label><br>
        <label>Saldo:
            <input type="text" name="saldo" required>
        </label><br>
        <label>E.Material:
            <input type="text" name="ematerial" required>
        </label><br>
        <input type="submit" value="Insertar Recibo">
    </form>
</body>
</html>
