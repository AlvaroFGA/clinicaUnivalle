<?php
include '../conn.php';
// Recuperar valores del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Variables para almacenar los valores
    $id_paciente = $_POST['id_paciente'];
    $motivo_consulta = $_POST['motivo_consulta'];
    $enfermedad_actual = $_POST['enfermedad_actual'];
    $tipo_craneo = $_POST['tipo'];
    $tamano_craneo = $_POST['tamano'];
    $forma_craneo = $_POST['forma'];
    $tipo_facial = $_POST['tipo'];
    $expresion_facial = $_POST['expresion'];
    $perfil_facial = $_POST['perfil'];
    $facies_facial = $_POST['facies'];
    $labios_estomatologico = $_POST['labios'];
    $mucosa_yugal_estomatologico = $_POST['mucosa_yugal'];
    $lengua_estomatologico = $_POST['lengua'];
    $piso_boca_estomatologico = $_POST['piso_boca'];
    $paladar_estomatologico = $_POST['paladar'];
    $amigdalas_estomatologico = $_POST['amigdalas'];
    $encias_estomatologico = $_POST['encias'];
    $rebordes_alveolares_estomatologico = $_POST['rebordes_alveolares'];
    $ultimo_idest = "";
    $ultimo_idfac = "";
    $ultimo_idcra = "";

    $sql = "INSERT INTO ex_estomatologico (labios, mucosa_yugal, lengua, piso_boca, paladar, amígdalas, encías, rebordes_alveolares) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Preparar la sentencia
    $stmt = $conexion->prepare($sql);

    // Vincular los parámetros con los valores
    $stmt->bind_param("ssssssss", $labios_estomatologico, $mucosa_yugal_estomatologico, $lengua_estomatologico, $piso_boca_estomatologico, $paladar_estomatologico, $amigdalas_estomatologico, $encias_estomatologico, $rebordes_alveolares_estomatologico);

    // Ejecutar la inserción
    if ($stmt->execute()) {
        // Inserción exitosa, recupera el ID del último registro insertado
        $ultimo_idest = $conexion->insert_id;
        echo "Registro insertado con éxito. ID del registro insertado: " . $ultimo_idest;
    } else {
        echo "Error al insertar el registro: " . $stmt->error;
    }


    $sql = "INSERT INTO ex_facial (tipo, expresion, perfil, facies) VALUES (?, ?, ?, ?)";

    // Preparar la sentencia
    $stmt = $conexion->prepare($sql);

    // Vincular los parámetros con los valores
    $stmt->bind_param("ssss", $tipo_facial, $expresion_facial, $perfil_facial, $facies_facial);

    // Ejecutar la inserción
    if ($stmt->execute()) {
        // Inserción exitosa, recupera el ID del último registro insertado
        $ultimo_idfac = $conexion->insert_id;
        echo "Registro insertado con éxito. ID del registro insertado: " . $ultimo_idfac;
    } else {
        echo "Error al insertar el registro: " . $stmt->error;
    }


    // Preparar la consulta SQL de inserción
    $sql = "INSERT INTO ex_craneal (tipo, tamano, forma) VALUES (?, ?, ?)";

    // Preparar la sentencia
    $stmt = $conexion->prepare($sql);

    // Vincular los parámetros con los valores
    $stmt->bind_param("sss", $tipo_craneo, $tamano_craneo, $forma_craneo);

    // Ejecutar la inserción
    if ($stmt->execute()) {
        // Inserción exitosa, recupera el ID del último registro insertado
        $ultimo_idcra = $conexion->insert_id;
        echo "Registro insertado con éxito. ID del registro insertado: " . $ultimo_idcra;
    } else {
        echo "Error al insertar el registro: " . $stmt->error;
    }

    // Preparar la consulta SQL de inserción
    $sql = "INSERT INTO anamnesis (pacientes_idpacientes, motivo_consulta, enfermedad_actual, ex_facial_idex_facial, ex_craneal_idex_craneal, ex_estomatologico_idex_estomatologico) VALUES (?, ?, ?, ?, ?, ?)";

    // Preparar la sentencia
    $stmt = $conexion->prepare($sql);

    // Vincular los parámetros con los valores
    $stmt->bind_param("isssss", $id_paciente, $motivo_consulta, $enfermedad_actual, $ultimo_idfac, $ultimo_idcra, $ultimo_idest);

    // Ejecutar la inserción
    if ($stmt->execute()) {
        echo "Registro insertado con éxito.";
    } else {
        echo "Error al insertar el registro: " . $stmt->error;
    }

}
?>
