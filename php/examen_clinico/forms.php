<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario1</title>
    <link rel="stylesheet" href="../style.css" type="text/css" media="all">

    <style>
    
    </style>
</head>
<body>
    <div class="container">
        <form class="form" method="post" action="./insertar.php">
        <div class="container">
        <p class="title">PACIENTE</p>
        <div class="flex">
            <label for="id_paciente">
                Nombre del paciente
            </label>
            <select id="id_paciente" name="id_paciente">
            <?php
            require('../conn.php');
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
    </div>
    <div class="container">
    <label>
                Motivo Consulta
            </label>
            <input required="" placeholder="" type="text" class="input" name="motivo_consulta">
            <label>
                Enfermedad Actual
            </label>
            <input required="" placeholder="" type="text" class="input" name="enfermedad_actual">
    </div>
            <p class="title">EXAMEN CLINICO</p>
            <!-- <div class="flex">
                <label>
                    Estado de salud:
                </label>
                <input required="" placeholder="" type="text" class="input" name="EstadoSalud"> 
                <label>
                    Actitud:
                </label>
                <input required="" placeholder="" type="text" class="input">
                <label>
                    Marcha:
                </label>
                <input required="" placeholder="" type="text" class="input">
            </div>
            <div class="flex">
                <label>
                    Biotipologia:
                </label>
                <input required="" placeholder="" type="text" class="input"> 
        
                <label>
                    Peso:
                </label>
                <input required="" placeholder="" type="number" class="input"> 

                <label>
                    Talla:
                </label>
                <input required="" placeholder="" type="number" class="input"> 
            </div>
            -->
            <!--
            <label>
                Habito postural:
            </label>
            <input required="" placeholder="" type="text" class="input"> 
            -->
            <label>
                Examen de craneo:
            </label>
            <div class="flex">
                <label>
                    Tipo:
                </label>
                <input required="" placeholder="" type="text" class="input" name="tipo"> 
        
                <label>
                    Tamaño:
                </label>
                <input required="" placeholder="" type="text" class="input" name="tamano"> 

                <label>
                    Forma:
                </label>
                <input required="" placeholder="" type="text" class="input" name="forma">

            </div>
            <label>
                Examen Facial:
            </label>

            <div class="flex">
                <label>
                    Tipo Facial:
                </label>
                <input required="" placeholder="" type="text" class="input" name="tipo"> 
        
                <label>
                    Expresion Facial:
                </label>
                <input required="" placeholder="" type="text" class="input" name="expresion"> 

                <label>
                    Perfil Facil:
                </label>
                <input required="" placeholder="" type="text" class="input" name="perfil">

                <label>
                    Facies:
                </label>
                <input required="" placeholder="" type="text" class="input" name="facies"> 
            </div>
            <!--
            <input required="" placeholder="" type="text" class="input">
            <label>
                Examen de A.T.M.:
            </label>
            <input required="" placeholder="" type="text" class="input">
            <label>
                Dx:
            </label>
            <input required="" placeholder="" type="text" class="input">
            <label>
                Examen de Ganglios:
            </label>
            <input required="" placeholder="" type="text" class="input">
            <label>
                Dx:
            </label>
            <input required="" placeholder="" type="text" class="input">
            -->
            <p class="title">EXAMEN ESTOMATOLOGICO</p>
            <label>
                Labios: (Frenillos)
            </label>
            <input required="" placeholder="" type="text" class="input" name="labios">
            <label>
                Mucosa Yugal:
            </label>
            <input required="" placeholder="" type="text" class="input" name="mucosa_yugal">
            <label>
                Lengua:
            </label>
            <input required="" placeholder="" type="text" class="input" name="lengua">
            <label>
                Piso boca:
            </label>
            <input required="" placeholder="" type="text" class="input" name="piso_boca">
            <label>
                Paladar:
            </label>
            <input required="" placeholder="" type="text" class="input" name="paladar">
            <label>
                Amigdalas: 
            </label>
            <input required="" placeholder="" type="text" class="input" name="amigdalas">
            <label>
                Encias:
            </label>
            <input required="" placeholder="" type="text" class="input" name="encias">
            <label>
                Rebordes Alveolares:
            </label>
            <input required="" placeholder="" type="text" class="input" name="rebordes_alveolares">
            <!--
            <p class="title">HIGIENE BUCAL</p>

            <div class="flex">
                <label>
                    <b>Tartaro</b> 
                 </label>
                 Presente <input required="" placeholder="" type="checkbox"> 
                 Ausente <input required="" placeholder="" type="checkbox">
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                   <b>Placa Bacteriana</b> 
                </label>
                Presente <input required="" placeholder="" type="checkbox"> 
                Ausente <input required="" placeholder="" type="checkbox">
                 
            </div>
            
            <div class="flex">
                <label>
                    <b>Halitosis</b> 
                 </label>
                 Presente <input required="" placeholder="" type="checkbox"> 
                 Ausente <input required="" placeholder="" type="checkbox">
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <label>
                    <b>Materia Alba</b> 
                 </label>
                 Presente <input required="" placeholder="" type="checkbox"> 
                 Ausente <input required="" placeholder="" type="checkbox">
            </div>
            <div class="flex">
                <label>
                    <b>Saburra</b> 
                 </label>
                 Presente <input required="" placeholder="" type="checkbox"> 
                 Ausente <input required="" placeholder="" type="checkbox">
            </div>
            
            </br>
            </br>
            <p class="title">EVALUACION DE LA OCLUSION</p>
            </br>
            <label>
                <b>DERECHA</b> 
             </label>
            <div class="flex">
                <label>
                    RELACION MOLAR
                 </label>
                 &nbsp;&nbsp;&nbsp;
                 I <input required="" placeholder="" type="checkbox">
                 &nbsp;&nbsp;&nbsp; 
                 II <input required="" placeholder="" type="checkbox">
                 &nbsp;&nbsp;&nbsp;
                 III <input required="" placeholder="" type="checkbox">
                 &nbsp;&nbsp;&nbsp; 
                 Ausente <input required="" placeholder="" type="checkbox">
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <label>
                    RELACION CANINA
                 </label>
                 &nbsp;&nbsp;&nbsp;
                 I <input required="" placeholder="" type="checkbox">
                 &nbsp;&nbsp;&nbsp; 
                 II <input required="" placeholder="" type="checkbox">
                 &nbsp;&nbsp;&nbsp;
                 III <input required="" placeholder="" type="checkbox">
                 &nbsp;&nbsp;&nbsp; 
                 Ausente <input required="" placeholder="" type="checkbox">
            </div>
        </br>
            <div class="flex">
                <label>
                    RELACION ANTERIOR
                </label>
                Overjet<input required="" placeholder="" type="text" class="input">mm.
            </div>
            <div class="flex">
                <label>
                    LINEA MEDIA DENTRARIA 
                </label>&nbsp;&nbsp;&nbsp;
                <input required="" placeholder="" type="text" class="input">
            </div>
            <div class="flex">
                <label>
                    RELACION MOLAR BAUME 
                </label>
                Desviacion<input required="" placeholder="" type="text" class="input">mm.
            </div>
            <br>
            <div class="flex">
                <label>
                    <b>DERECHA</b> 
                 </label>&nbsp;&nbsp;&nbsp;
                 P.T.R. <input required="" placeholder="" type="checkbox"> 
                 E.D. <input required="" placeholder="" type="checkbox">
                 E.M. <input required="" placeholder="" type="checkbox">
            </div>
            <br><br>


            <label>
                <b>IZQUIERDA</b> 
             </label>
            <div class="flex">
                <label>
                    RELACION MOLAR
                 </label>
                 &nbsp;&nbsp;&nbsp;
                 I <input required="" placeholder="" type="checkbox">
                 &nbsp;&nbsp;&nbsp; 
                 II <input required="" placeholder="" type="checkbox">
                 &nbsp;&nbsp;&nbsp;
                 III <input required="" placeholder="" type="checkbox">
                 &nbsp;&nbsp;&nbsp; 
                 Ausente <input required="" placeholder="" type="checkbox">
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <label>
                    RELACION CANINA
                 </label>
                 &nbsp;&nbsp;&nbsp;
                 I <input required="" placeholder="" type="checkbox">
                 &nbsp;&nbsp;&nbsp; 
                 II <input required="" placeholder="" type="checkbox">
                 &nbsp;&nbsp;&nbsp;
                 III <input required="" placeholder="" type="checkbox">
                 &nbsp;&nbsp;&nbsp; 
                 Ausente <input required="" placeholder="" type="checkbox">
            </div>
        </br>
            <div class="flex">
                <label>
                    RELACION ANTERIOR
                </label>
                Overjet<input required="" placeholder="" type="text" class="input">mm.
            </div>
            <div class="flex">
                <label>
                    LINEA MEDIA DENTRARIA 
                </label>&nbsp;&nbsp;&nbsp;
                <input required="" placeholder="" type="text" class="input">
            </div>
            <div class="flex">
                <label>
                    RELACION MOLAR BAUME 
                </label>
                Desviacion<input required="" placeholder="" type="text" class="input">mm.
            </div>
            <br>
            <div class="flex">
                <label>
                    <b>IZQUIERDA</b> 
                 </label>&nbsp;&nbsp;&nbsp;
                 P.T.R. <input required="" placeholder="" type="checkbox"> 
                 E.D. <input required="" placeholder="" type="checkbox">
                 E.M. <input required="" placeholder="" type="checkbox">
            </div>
            <br><br>

            <label>
                TIPO MORDIDA
            </label>
            <input required="" placeholder="" type="text" class="input">
            <div class="flex">
                <label>
                    TIPO DE ARCO DE BAUME 
                 </label>&nbsp;&nbsp;&nbsp;
                 I <input required="" placeholder="" type="checkbox"> 
                 II <input required="" placeholder="" type="checkbox">
            </div>
            <label>
                DIATEMAS
            </label>
            <input required="" placeholder="" type="text" class="input">
            <label>
                PERDIDAS DE ESPACIO
            </label>
            <input required="" placeholder="" type="text" class="input">
            <label>
                DIAGNOSTICO DE LESIONES Y ANOMALIAS DENTARIAS
            </label>
            <input required="" placeholder="" type="text" class="input">

            <div class="flex">
                <label>
                    <b>TIPO DE DENTICION</b> 
                    &nbsp;&nbsp;&nbsp;
                 </label>
                 Temporal<input required="" placeholder="" type="radio" class="input" name="dete">
                 Mixta<input required="" placeholder="" type="radio" class="input" name="dete">
                 Permanente<input required="" placeholder="" type="radio" class="input" name="dete">
            </div>
        -->

            
            <button class="submit" name="Enviar">ENVIAR</button>
           
        </form>
    </div>

</body>

</html>