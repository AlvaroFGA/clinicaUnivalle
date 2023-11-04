<?php
include '../../modelo/conexion.php';

// Consulta para el primer select
$sql_select_1 = "SELECT idtratamientos, nombre FROM tratamientos";
$result_select_1 = $conn->query($sql_select_1);

// Consulta para el segundo select
$sql_select_2 = "SELECT p.idpacientes as idp, concat(pr.nombres, ' ', pr.apellidos) as nombComp FROM 
personas pr inner join pacientes p on pr.ci = p.personas_ci;";
$result_select_2 = $conn->query($sql_select_2);
?>

<form method="POST" action="procesar.php">
    <label for="tratamiento">Seleccione un Paciente:</label>
    <select name="tratamiento" id="select1" required class="form-select" aria-label="Default select example">
    <option value=''>Elija una opcion</option>
        <?php
        while ($row = $result_select_1->fetch_assoc()) {
         ?>
           <option value='<?php echo $row['idtratamientos'];?>'><?php echo $row["nombre"]?></option>";
            <?php
        }
        ?>
    </select>
<br>
    <label for="paciente">Seleccione un tratamiento</label>
    <select name="paciente" id="select2" class="form-select" aria-label="Default select example" required>
    <option value=''>Elija una opcion</option>
        <?php
        while ($row = $result_select_2->fetch_assoc()) {
            echo "<option value='" . $row["idp"] . "'>" . $row["nombComp"] . "</option>";
        }
        ?>
    </select>
    <br>
    <label for="exampleInputEmail1" class="form-label">Descripcion</label>
        <input required name="desc" type="text" class="form-control" id="" >

    <button type="submit" class="btn btn-dark">Insertar Tratamiento</button>
</form>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
