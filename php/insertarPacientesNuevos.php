<?php
include '../modelo/conexion.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopila los datos del formulario en variables
    $fecha_admision = $_POST["fecha_admicion"];
    $medico_id = $_POST["medico_id"];
    $practicante_id = $_POST["practicante_id"];
    $apellidos = $_POST["apellidos"];
    $nombres = $_POST["nombres"];
    $ci = $_POST["ci"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $fecha_nacimiento = $_POST["fecha_nac"];
    $sexo = $_POST["sexo"];
    $procedencia = $_POST["procedencia"];
    $estadoCivil = $_POST["estadoCivil"];
    $ocupacion = $_POST["ocupacion"];
    $gradoInstruccion = $_POST["gradoInstruccion"];
    $nombreFamiliar = $_POST["nombreFamiliar"];
    $telefonoFamiliar = $_POST["telefonoFamiliar"];
    $dispManiana = $_POST["dispManiana"];
    $dispTarde = $_POST["dispTarde"];

    $intQuirDesc = $_POST['intQuirDesc'];
    $tratMedDesc = $_POST['tratMedDesc'];
    $mediActDesc = $_POST['mediActDesc'];
    $reacAnesDesc = $_POST['reacAnesDesc'];
    $herHemDesc = $_POST['herHemDesc'];
    $cortHerDesc = $_POST['cortHerDesc'];
    $alerMedDesc = $_POST['alerMedDesc'];
    $desmFrecDesc = $_POST['desmFrecDesc'];
    $gestacion = $_POST['gestacion'];
    $upm = $_POST['upm'];

    $enfermedadesSeleccionadas = $_POST['enfermedadesSistemicas'];
    
    $dieta = $_POST["dieta"];
    $vivienda = $_POST["vivienda"];
    $suenio = $_POST["suenio"];
    $deporte = isset($_POST["deporte"]) ? $_POST["deporte"] : "ninguno"; // Puedes usar un operador ternario para manejar campos opcionales
    $habitos = isset($_POST["habitos"]) ? $_POST["habitos"] : "ninguno";
    

    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }
   
    $letra = extraerPrimeraLetra($apellidos);
// Llamada al procedimiento almacenado con el parámetro de entrada
    $stmt = $conn->prepare("CALL clinica_odontologica.ContarPacientes(?)");
    $stmt->bind_param("s", $letra);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $cant = $row['cantPacientes'] + 1;
        }
        $stmt->close();
    } else {
        echo "Error al ejecutar el procedimiento almacenado: " . $stmt->error;
    }

    $idhist= $letra.'-'.$cant;

    // Llamar al procedimiento almacenado
    $sql = "CALL InsertarHistoriaClinica('$idhist', $practicante_id, $medico_id)";

    if ($conn->query($sql) === TRUE) {
        echo "historila ok.";
        $conn->query("COMMIT;");
    } else {
        $conn->query("ROLLBACK;");
        echo "Error al llamar al procedimiento almacenado: " . $conn->error;
    }
    
    $sql1 = "CALL InsertarPersonaYPaciente($ci,'$nombres','$apellidos','$direccion','$telefono','$fecha_nacimiento','$procedencia','$sexo','$estadoCivil','$ocupacion','$gradoInstruccion','$nombreFamiliar',$telefonoFamiliar,'$dispManiana','$dispTarde','$idhist');";
    if ($conn->query($sql1) === TRUE) {
        echo "datos personales ok";
    } else {
        echo "Error al llamar al procedimiento almacenado: " . $conn->error;
    }
    
    if(empty($gestacion)){
        $sql2 = "CALL InsertarAntecedentesPatologicos($ci,'$intQuirDesc','$tratMedDesc','$mediActDesc','$reacAnesDesc','$herHemDesc','$cortHerDesc','$alerMedDesc','$desmFrecDesc','0',null,null);";
    }
    else{
        $sql2 = "CALL InsertarAntecedentesPatologicos($ci,'$intQuirDesc','$tratMedDesc','$mediActDesc','$reacAnesDesc','$herHemDesc','$cortHerDesc','$alerMedDesc','$desmFrecDesc','1','$gestacion','$upm');";
    }
    if ($conn->query($sql2) === TRUE) {
        echo "antecedentes ok";
    } else {
        echo "Error al llamar al procedimiento almacenado: " . $conn->error;
    }


    foreach($enfermedadesSeleccionadas as $enfermedad) {

        if(isset($_POST['especificacion'])){
            $especificacion = $_POST['especificacion'];
            $sql3 = "call InsertarEnfermedadesSistemicas($enfermedad, $ci, '$especificacion');";
        }
        else{
            $sql3 = "call InsertarEnfermedadesSistemicas($enfermedad, $ci, null);";
        }
        if ($conn->query($sql3) === TRUE) {
            echo "enf ok";
        } else {
            echo "Error al llamar al procedimiento almacenado: " . $conn->error;
        }
    }

    $sql4 = "call InsertarAntecedentesNoPatologicos($ci, '$dieta','$vivienda', '$suenio', '$deporte', '$habitos');";
    if ($conn->query($sql4) === TRUE) {
        echo "ant no pat ok";
    } else {
        echo "Error al llamar al procedimiento almacenado: " . $conn->error;
    }

    if (isset($_POST['habitosCostumbres']) && !empty($_POST['habitosCostumbres'])) {
        $habitosCostumbres = $_POST['habitosCostumbres'];
        
        $descripciones = array();

        foreach ($habitosCostumbres as $id) {
            $descripcion = $_POST['descripcion_' . $id];
            $descripciones[$id] = $descripcion;
        }
    
        // Mostrar los datos con echo
        foreach ($habitosCostumbres as $id) {

            $sql5 = "call InsertarHabitosPacientes($ci, $id, '$descripciones[$id]');";
            if ($conn->query($sql5) === TRUE) {
                echo "habitosok";
            } else {
                echo "Error al llamar al procedimiento almacenado: " . $conn->error;
            }
        }
    } else {
        // El array 'habitosCostumbres' está vacío o no se ha enviado.
        echo "No se han seleccionado hábitos o costumbres.";
    }
    

    $conn->close();
}
else{
    echo 'ya valio';
}

function extraerPrimeraLetra($cadena) {
    if (empty($cadena)) {
        return false; // Devolver false si la cadena está vacía
    }
    $primeraLetra = mb_substr($cadena, 0, 1); // Extraer la primera letra
    return $primeraLetra;
}

?>