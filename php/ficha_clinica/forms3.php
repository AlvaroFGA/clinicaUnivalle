<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario4</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="style.css" type="text/css" media="all">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    
    </style>
</head>
<body>
    <?php
    require('../conn.php');
    ?>
    <div class="container">
        <form class="form" id="dataForm">
            <p class="title">PACIENTE</p>
            <div class="flex">
                <label for="id_paciente">
                    Nombre del paciente
                </label>
                <select id="id_paciente" name="id_paciente">
                <?php
                $sql = "SELECT idpacientes, p.nombres, p.apellidos FROM pacientes JOIN personas p WHERE (ci = personas_ci);";

                $result = mysqli_query($conexion, $sql);
                
                // Verificar si la consulta se ejecutó correctamente
                if (!$result) {
                    die("Error de consulta: " . mysqli_error($conn));
                }

                if (mysqli_num_rows($result) > 0) {
                    echo "<option value='" . "null" . "'>" . " "."</option>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row["idpacientes"] . "'>" . $row["nombres"] ." ".$row["apellidos"]."</option>";
                    }
                } else {
                    echo "No se encontraron resultados.";
                }
                ?>
                </select>
                
            </div>
        </form>
    </div>

    <div class="container">
        <form class="form" method="post" action="../envioFicha.php">
            <p class="title">FICHA CLINICA</p>
            
            <div class="flex">
                <label>
                    Plan tratamiento
                </label>
                <select id="id_Ptratamiento" name="id_Ptratamiento">
                    
                </select>
            </div>

            <!-- <div class="flex">
                <label>
                    Usuario
                </label>
                <select id="id_paciente" name="id_paciente">
                    <?php
                    $sql = "SELECT idpacientes, p.nombres, p.apellidos FROM pacientes JOIN personas p WHERE (ci = personas_ci);";

                    $result = mysqli_query($conexion, $sql);
                    
                    // Verificar si la consulta se ejecutó correctamente
                    if (!$result) {
                        die("Error de consulta: " . mysqli_error($conn));
                    }

                    if (mysqli_num_rows($result) > 0) {
                        echo "<option value='" . "null" . "'>" . " "."</option>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row["idpacientes"] . "'>" . $row["nombres"] ." ".$row["apellidos"]."</option>";
                        }
                    } else {
                        echo "No se encontraron resultados.";
                    }
                    ?>
                </select>
            </div> -->

            <div class="flex">
                <label>
                    FECHA:
                </label>
                <input required="" placeholder="" type="datetime-local" class="input" name="Fecha"> 
        
                <label>
                    AREA:
                </label>
                <input required="" placeholder="" type="text" class="input" name="Area"> 

                <label>
                    DIAGNOSTICO:
                </label>
                <input required="" placeholder="" type="text" class="input" name="Diagnostico"> 
            </div>
            <div class="flex">
                <label>
                    PZA:
                </label>
                <input required="" placeholder="" type="text" class="input" name="Pieza"> 

                <label>
                    RECOMENDACION, MEDICACION:
                </label>
                <input required="" placeholder="" type="text" class="input" name="Recomendacion">

                <label>
                    OBSERVACIONES Y/O EVALUCACIONES:
                </label>
                <input required="" placeholder="" type="text" class="input" name="Evaluacion">
                <label>
                    PROXIMA CITA:
                </label>
                <input required="" placeholder="" type="datetime-local" class="input" name="Proximacita"> 
                <label>
                    APROBACION DEL DOCENTE:
                </label>
                <input required="" placeholder="" type="text" class="input" name="Doc"> 
            </div>
            <script>
                $(document).ready(function() {
                $('#id_paciente').on('change', function() {
                    var selectedValue = $(this).val();
                    $.ajax({
                        type: 'POST',
                        url: 'procesar.php', // Ruta al archivo PHP que manejará la solicitud
                        data: { valor: selectedValue }, // Envia el valor seleccionado al servidor
                        success: function(response) {
                            $('#id_Ptratamiento').html(response); // Actualiza el contenido dinámicamente
                        }
                    });
                });
            });
            </script>
            <button class="submit" name="Enviar">ENVIAR</button>
           
        </form>
    </div>
</body>

</html>