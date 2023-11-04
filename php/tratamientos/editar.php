<?php
include '../../modelo/conexion.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];

    $sql = "UPDATE tratamientos SET nombre = '$nombre' WHERE idtratamientos = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tratamientos WHERE idtratamientos = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nombre = $row['nombre'];
    }
}
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

<form method="POST" action="">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Nombre del tratamiento: </label>
        <input type="text" name="nombre" value="<?php echo $nombre; ?>" required><br>
    </div>
    <button type="submit" class="btn btn-dark">Actualizar Tratamiento</button>
    <a class="btn btn-danger" href="index.php">Cancelar</a>
</form>
