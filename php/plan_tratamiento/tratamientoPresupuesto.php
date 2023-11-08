<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Recibos</title>
    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    
</head>
<body>
    <h2>Recibos</h2>
    <div class="container-fluid">
    <table class="table table-striped table-dark table_id ">
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
        $idplantrat = $_GET['id'];
        include '../../modelo/conexion.php';
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

    <form action="insertarRecibos.php" method="post">
    <input type="hidden" name="idRecibo" value="<?php echo $idplantrat;?>">
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Concepto</label>
        <input name="concepto" type="text" class="form-control" id="" >
    </div>
    <div class="mb-2">
        <label for="exampleInputPassword1" class="form-label">Debe</label>
        <input name="debe" type="number" class="form-control" id="">
    </div>
    <div class="mb-2">
        <label for="exampleInputPassword1" class="form-label">Haber</label>
        <input name="haber" type="number" class="form-control" id="">
    </div>
    <div class="mb-2">
        <label for="exampleInputPassword1" class="form-label">E. Material</label>
        <input name="ematerial" type="text" class="form-control" id="">
    </div>
    <button type="submit" class="btn btn-dark">Insertar Recibo</button>
    </form>
    </div>
</body>
</html>
