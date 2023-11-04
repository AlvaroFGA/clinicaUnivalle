<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario2</title>
    <link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
    &nbsp;
</head>
<body>
    <div class="container">
        <form class="form" method="post" action="../Methods/enviarDatosPsi.php">
            <p class="title">EXAMEN PSIQUICO ELEMENTAL</p>

            <p> EXAMEN COMPLEMENTARIO RADIOGRAFICO</p>
                    <label><span><input type="checkbox" name="Periapical"></span>Periapical</label>
                    <label><span><input type="checkbox" name="mordida"></span>Aleta de mordida</label>
                    <label><span><input type="checkbox" name="Oclusal"></span>Oclusal</label>
                    <label><span><input type="checkbox" name="Panoramica"></span>Panoramica</label>
                    <label><span><input type="checkbox" id="otros_option" name="Rad"></span>Otros</label>
                    <div id="ischecked">
                        <input type="text" id="otros_text" name="otros_text_rad" style="display: none;">
                    </div>


            <p>EXAMEN COMPLEMENTARIOS DE TEJIDOS BLANCOS</p>
            <label><span><input type="checkbox" name="Biopsia"></span>Biopsia</label>
            <label><span><input type="checkbox" name="CitExfoliatica"></span>citologia exfoliatica</label>
            <label><span><input type="checkbox"  name="Tej"></span>Otros</label>
                    <div id="ischecked">
                        <input type="text" name="otros_text_tej" style="display: none;">
                    </div>
                <label>
                    Conciencia:
                </label>
                <input required="" placeholder="" type="text" class="input" name="conciencia"> 
                <label> 
                    Percepcion:
                </label>
                <input required="" placeholder="" type="text" class="input" name="percepcion">
                <label>
                    Memoria:
                </label>
                <input required="" placeholder="" type="text" class="input" name="memoria">
                <label>
                    Alteraciones Conductuales:
                </label>
                <input required="" placeholder="" type="text" class="input" name="altConductuales">
                <p>Estudiante a cargo</p>
                <select>
                    <option value='0'>Elija una opcion</option>
                    <?php
                    include "../conexion/conn.php";
                    $query = $conexion -> query("CALL usuarios_id()");
                    while ($row = mysqli_fetch_array($query)) {
                        $id = $row["idusuario"];
                        $nombreUsuario = $row["nombres"];
                        echo("<option value='$id'>$nombreUsuario</option>");
                        
                    }
                    ?>
                </select>
                    <p> PLAN DE TRATAMIENTO</p>
                    <label><span><input type="checkbox" name="Emergencia"></span>Emergencia</label>
                    <label><span><input type="checkbox" name="OpEndodoncia"></span>Operacion y Endodoncia</label>
                    <label><span><input type="checkbox" name="Preventiva"></span>Preventiva</label>
                    <label><span><input type="checkbox" name="ProtosisFija"></span>Protosis fija</label>
                    <label><span><input type="checkbox" name="Ortodoncia"></span>Ortodoncia</label>
                    <label><span><input type="checkbox" name="Odontopediatria"></span>Odontopediatria</label>
                    <label><span><input type="checkbox" name="ProtesisRemovible"></span>Protesis removible</label>
                    <label><span><input type="checkbox" name="Cirugia"></span>Cirugia</label>
                <br><br><br><br>
                    <p>Paciente</p><span>
                <div class="flex">
                    <?php
                        include "../../conn.php";
                        $query = $conexion -> query("CALL busca_paciente(22)");
                        while($row = mysqli_fetch_array($query)){
                            $nombre = $row["nombres"];
                            $Apellido = $row["apellidos"];
                            $id = $row["idpacientes"];
                            echo("<input type='text' value='$nombre' readonly>");
                            echo("<input type='text' value='$Apellido' readonly>");
                            echo("<input type='hidden' name='id_paciente' value='$id'>");
                        }
                    ?>
                    </span>
                </div>
                <label>Fecha de la atencion:<span><input type="datetime-local" name="fecha"></span></label>
                <button class="submit" type="submit" name="Enviar">ENVIAR</button>
        </form>
    </div>
    <script src="../js/ExamenPsi.js"></script>
</body>

</html>