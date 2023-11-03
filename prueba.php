<?php
// Conexión a la base de datos
$servername = "207.244.255.46";
$username = "ratiosof74bo_user_ddt";
$password = "cek-g~f]w!XV";
$dbname = "ratiosof74bo_localizador";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$idBoton = $_GET['id'];

// Consulta para obtener los datos según el botón presionado
$sql = "SELECT nombre, ci, aprobado FROM prueba_cu WHERE id = $idBoton"; // Asumiendo que tienes una columna 'id' en la tabla

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo 'Nombre: ' . $row['nombre'] . '<br>';
        echo 'ci: ' . $row['ci'] . '<br>';
        echo 'estado: ' . $row['aprobado'] . '<br>';
        ?>
        <form action="aprobacion.php" method="post" onsubmit="return confirm('¿Estás seguro de enviar la aprobación?');">
            <input type="hidden" name="id_persona" value="<?php echo $idBoton; ?>">
            <button type="submit">Enviar Aprovacion</button>
        </form>
    <?php
    }
} else {
    echo 'No se encontraron datos.';
}

$conn->close();
?>
