<?php
    include('modelo/conexion.php');
    if (isset($_POST['id_persona'])) {
        $id = $_POST['id_persona'];
    
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }
    
        $sql = "UPDATE `prueba_cu` SET `aprobado`= 0 WHERE id = " . $id;
    
        if ($conn->query($sql) === TRUE) {
            $filas_afectadas = $conn->affected_rows;
                header("Location: index.php");
                exit;            
        } else {
            echo "Error en la consulta: " . $conn->error;
        }    
        $conn->close();
    } else {
        echo "No se proporcionó un parámetro 'id'.";
    }
?>