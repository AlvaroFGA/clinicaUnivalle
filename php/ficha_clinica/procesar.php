<?php
require("../conn.php");
if (isset($_POST['valor'])) {
    $selectedValue = $_POST['valor'];
    // Realiza una consulta basada en el valor seleccionado
    
    $sql = "SELECT idplan_tratamientos, nombre, descripcion FROM plan_tratamientos JOIN tratamientos
    WHERE tratamientos_idtratamientos = idtratamientos AND pacientes_idpacientes = " . $selectedValue;
    $result = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($result)>0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row["idplan_tratamientos"] . "'>" . $row["nombre"] ." ".$row["descripcion"]."</option>";
        }
    } else {
        echo "No se encontraron resultados.";
    }
}
?>