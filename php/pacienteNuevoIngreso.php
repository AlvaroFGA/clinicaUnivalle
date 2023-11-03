<?php
session_start();
$_SESSION['usuario'] = '7';

include '../modelo/conexion.php';
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

$idusuario = $_SESSION['usuario'];
$resultado = $conn->query("CALL ObtenerNombreCompleto($idusuario)");

if (!$resultado) {
    die("Error al llamar a la función almacenada: " . $conexion->error);
}

$fila = $resultado->fetch_assoc();
$nombre_completo = $fila['nombre_completo'];


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes de Nuevo Ingreso</title>
    <link rel="stylesheet" href="stylelog.css" type="text/css" media="all">
    <script src="../js/antecedentesPatologicos.js"></script>
    
</head>
<body>
    <?php
    include '../modelo/conexion.php';
    ?>
    <div class="container">
        <form class="form" method="post" action="insertarPacientesNuevos.php">
            <h1 class="title">HISTORIA CLINICA DE ESTOMATOLOGIA</h1>
            <h2>HOJA DE ADMISION</h2>
                <div class="flex">

                    <label>
                        Fecha de Admision: <?php echo date('d-m-Y');?>
                    </label>
                    <input type="hidden" value="<?php echo date('d-m-Y'); ?>" name="fecha_admicion" >
                    <label>
                        Confeccionado por: <?php echo $nombre_completo; ?>
                    </label>
                    <input type="hidden" value="<?php echo $idusuario;?>" name="medico_id">
                </div>

                <div class="flex">
                    <label>
                        Asignado a: <?php echo $nombre_completo; ?>
                    </label>
                    <input type="hidden" value="<?php echo $idusuario;?>" name="practicante_id">
                </div>
                
                 <h3 class="title">ANAMNESIS REMOTA</h3>
                 <h2>DATOS PERSONALES</h2>

                 <div class="flex">
                    <label>
                        Apellidos:
                    </label>
                    <input name="apellidos" required placeholder="" type="text" class="input">
                    <label>
                        Nombres:
                    </label>
                    <input name="nombres" required type="text" class="input">
                    
                    <label>
                        CI:
                    </label>
                    <input required name="ci" placeholder="" type="number" class="input">
                    <label>
                        Direccion:
                    </label>
                    <input name="direccion" required type="text" class="input">
                </div>
                <div class="flex">
                    <label>
                        Telefono:
                    </label>
                    <input name="telefono" required placeholder="" type="number" class="input">
                    <label>
                        Fecha de Nacimiento:
                    </label>
                    <input name="fecha_nac" required placeholder="" type="date" class="input">
                    <label>
                        Sexo:
                    </label>
                    <label>
                        <input type="radio" name="sexo" value="M" required> Masculino
                    </label>
                    <label>
                         <input type="radio" name="sexo" value="F" required> Femenino
                    </label>                    
                    <label>
                        Procedencia:
                    </label>
                    <input required name="procedencia" placeholder="" type="text" class="input">
                </div>
                <div class="flex">
                    <label>
                        Estado Civil:
                    </label>
                    <select name="estadoCivil" required>
                        <option value="soltero">Soltero/a</option>
                        <option value="casado">Casado/a</option>
                        <option value="divorciado">Divorciado/a</option>
                        <option value="viudo">Viudo/a</option>
                        <option value="unionLibre">Unión de Hecho</option>
                    </select>                    
                    <label>
                        Ocupacion:
                    </label>
                    <input required name="ocupacion" placeholder="" type="text" class="input">
                    <label>
                        Grado de Instrucción:
                    </label>
                    <select id="gradoInstruccion" name="gradoInstruccion">
                        <option value="educacionInicial">Educación Inicial</option>
                        <option value="educacionPrimaria">Educación Primaria</option>
                        <option value="educacionSecundaria">Educación Secundaria</option>
                        <option value="educacionSuperior">Educación Superior</option>
                        <option value="postgrado">Postgrado</option>
                        <option value="otros">Otros</option>
                    </select>

                </div>
                <div class="flex">
                    <label>
                        Nombre de familiar mas cercano:
                    </label>
                    <input name="nombreFamiliar" required placeholder="" type="text" class="input">
                    <label>
                        Telefono:
                    </label>
                    <input name="telefonoFamiliar" required placeholder="" type="number" class="input">
                </div>
                
                <div class="flex">
                    <label>
                        Disponibilidad de tiempo:
                    </label>
                    Mañana Horas: <input required name="dispManiana" placeholder="" type="text" class="input">
                    Tardes Horas: <input required name="dispTarde" placeholder="" type="text" class="input">
                </div>
                
                <hr size="2px" color="black" />
                <br>
                <label>
                    <b>ANTECEDENTES FAMILIARES</b>
                </label>
                <b>ANTECEDENTES PERSONALES PATOLOGICOS:</b>
                <div class="flex">
                    <label>
                        Fue sometido a interveciones quirurgicas?
                    </label>
                    <div>
                        <label>
                            SI <input required type="radio" name="intQuir" value="si" onclick="antPat1()"> 
                        </label>
                        <label>
                            NO <input required type="radio" name="intQuir" value="no" onclick="antPat1()">
                        </label>
                        <input required type="text" id="intQuirDesc" name="intQuirDesc" style="display: none;" placeholder="Descripcion">
                    </div>
                </div>
                <div class="flex">
                    <label>
                        Esta actualmente en tratamiento medico?
                    </label>
                    <div>
                        <label>
                            SI <input required type="radio" name="tratMed" value="si" onclick="antPat2()"> 
                        </label>
                        <label>
                            NO <input required type="radio" name="tratMed" value="no" onclick="antPat2()">
                        </label>
                        <input required type="text" id="tratMedDesc" name="tratMedDesc" style="display: none;" placeholder="Descripcion">
                    </div>
                </div>
                <div class="flex">
                    <label>
                        Tuvo algun medicamento actualmente?
                    </label>
                    <div>
                        <label>
                            SI <input required type="radio" name="mediAct" value="si" onclick="antPat3()"> 
                        </label>
                        <label>
                            NO <input required type="radio" name="mediAct" value="no" onclick="antPat3()">
                        </label>
                        <input required type="text" id="mediActDesc" name="mediActDesc" style="display: none;" placeholder="Descripcion">
                    </div>
                </div>
                <div class="flex">
                    <label>
                        Tuvo alguna vez reaccion inusitada a la anestesia local?
                    </label>
                    <div>
                        <label>
                            SI <input required type="radio" name="reacAnes" value="si" onclick="antPat4()"> 
                        </label>
                        <label>
                            NO <input required type="radio" name="reacAnes" value="no" onclick="antPat4()">
                        </label>
                        <input required type="text" id="reacAnesDesc" name="reacAnesDesc" style="display: none;" placeholder="Descripcion">
                    </div>
                </div>
                <div class="flex">
                    <label>
                        Posterior a heridas o exodoncias tuvo hemorragias?
                    </label>
                    <div>
                        <label>
                            SI <input required type="radio" name="herHem" value="si" onclick="antPat5()"> 
                        </label>
                        <label>
                            NO <input required type="radio" name="herHem" value="no" onclick="antPat5()">
                        </label>
                        <input required type="text" id="herHemDesc" name="herHemDesc" style="display: none;" placeholder="Descripcion">
                    </div>
                </div>
                <div class="flex">
                    <label>
                        Los cortes y heridas tardan en cicatrizar ahora mas que antes?
                    </label>
                    <div>
                        <label>
                            SI <input required type="radio" name="cortHer" value="si" onclick="antPat6()"> 
                        </label>
                        <label>
                            NO <input required type="radio" name="cortHer" value="no" onclick="antPat6()">
                        </label>
                        <input required type="text" id="cortHerDesc" name="cortHerDesc" style="display: none;" placeholder="Descripcion">
                    </div>
                </div>
                <div class="flex">
                    <label>
                       Presento alergia o le dijeron que no tome algun medicamento?
                    </label>
                    <div>
                        <label>
                            SI <input required type="radio" name="alerMed" value="si" onclick="antPat7()"> 
                        </label>
                        <label>
                            NO <input required type="radio" name="alerMed" value="no" onclick="antPat7()">
                        </label>
                        <input required type="text" id="alerMedDesc" name="alerMedDesc" style="display: none;" placeholder="Descripcion">
                    </div>
                </div>
                <div class="flex">
                    <label>
                        Sufre desmayos con frecuencia?
                    </label>
                    <div>
                        <label>
                            SI <input required type="radio" name="desmFrec" value="si" onclick="antPat8()"> 
                        </label>
                        <label>
                            NO <input required type="radio" name="desmFrec" value="no" onclick="antPat8()">
                        </label>
                        <input required type="text" id="desmFrecDesc" name="desmFrecDesc" style="display: none;" placeholder="Descripcion">
                    </div>
                </div>
                <div class="flex">
                    <label>
                       Esta embarazada
                    </label>
                    <div>
                        <label>
                            SI <input required type="radio" name="emb" value="si" onclick="antPat9()"> 
                        </label>
                        <label>
                            NO <input required type="radio" name="emb" value="no" onclick="antPat9()">
                        </label>
                        <div id="embDesc" style="display: none;">
                            <label>Tiempo de Gestacion</label>
                            <input required id="gestacion" type="number" name="gestacion" placeholder="Meses de gestacion" min="0" max="10">
                            <label>Fecha UPM</label>
                            <input id="upm" type="date" name="upm">
                        </div>
                        
                    </div>
                </div>
                
                <p class="title">ENFERMEDADES SISTEMICAS:</p>
                <div class="flex">
                <?php
                $sql = "CALL ObtenerEnfermedades();";
                if ($conn->multi_query($sql)) {
                    if ($result = $conn->store_result()) {
                        $enfermedades = $result->fetch_all(MYSQLI_ASSOC);
                        $result->free();
                    } else {
                        echo "No se encontraron resultados.";
                    }
                
                    foreach ($enfermedades as $enfermedad) {
                        $idenf = $enfermedad['idenfermedades'];
                        $nomenf = $enfermedad['nombre'];
                        echo '<label>';
                        echo "<input type='checkbox' name='enfermedadesSistemicas[]' value='$idenf'> $nomenf";
                        echo '</label>';
                    
                    }
                } else {
                    echo "Error al llamar al procedimiento almacenado: " . $conn->error;
                }
                ?>    
                    
                </div>
                 Especificaciones: <input name="especificacion" placeholder="Descripcion del padecimiento" class="input" type="text">
                
                
                 <p class="title">ANTECEDENTES PERSONALES NO PATOLOGICOS(Dieta, Vivienda, Sueño, Deporte, Habitos):</p>
                <div>
                    <label>Dieta: </label>
                    <input type="text" name="dieta" required id="">
                    <label>Vivienda: </label>
                    <input type="text" name="vivienda" required id="">
                    <label>Sueño: </label>
                    <input type="text" name="suenio" required id="">
                    <label>Deporte: </label>
                    <input type="text" name="deporte" id="">
                    <label>Habitos: </label>
                    <input type="text" name="habitos" id="">
                </div>
                <hr size="2px" color="black" />
                
                <h4>Habitos o costumbres</h4>
                <?php
                while ($conn->more_results()) {
                    $conn->next_result();
                    $conn->store_result();
                }
                $sql1 = "CALL ObtenerHabitos();";
                if ($conn->multi_query($sql1)) {
                    if ($result1 = $conn->store_result()) {
                        $habitos = $result1->fetch_all(MYSQLI_ASSOC);
                        $result1->free();
                    } else {
                        echo "No se encontraron resultados.";
                    }

                    foreach ($habitos as $habito) {
                        $idhab = $habito['idHabitos'];
                        $nomhab = $habito['nombre'];
                        echo '<label>';
                        echo "<input type='checkbox' name='habitosCostumbres[]' value='$idhab' onchange='mostrarDescripcion($idhab)'> $nomhab";
                        echo '</label>';
                        echo "<input type='text' placeholder='Freciuencia o descripcion' name='descripcion_$idhab' id='descripcion_$idhab' style='display:none;'>";
                    }
                } else {
                    echo "Error al llamar al procedimiento almacenado: " . $conn->error;
                }
                $conn->close();
                ?>
                
<!--
                
                <div class="flex">
                    Fecha de ultima visita Odontologica <input required placeholder="" type="datetime-local">
                    Tipo de trtamiento recibido <input required placeholder="" type="text">
                </div>
                <div class="flex">
                    <label>SE EFECTUARA INTERCONSULTA MEDICA: </label>
                    SI <input required placeholder="" type="radio" name="DESI"> 
                    NO <input required placeholder="" type="radio" name="DESI">
                </div>

                <p class="title">ANAMNESIS PRESENTE O PROXIMA</p>
                <label>MOTIVO DE CONSULTA</label>
                <input class="input" type="text">
                <label>ENFERMEDAD ACTUAL</label>
                <input class="input" type="text">
                <hr size="2px" color="black" />

                <div class="flex">
                    <label>Usa cepillo y pasta detal? </label>
                    Si <input type="radio" name="cepi">
                    No <input type="radio" name="cepi">
                    <label>Usa hilo dental? </label>
                    Si <input type="radio" name="hilo">
                    No <input type="radio" name="hilo">
                    <label>Usa mondadientes o escarbadientes? </label>
                    Si <input type="radio" name="mon">
                    No <input type="radio" name="mon">
                    <label>Fecuencia: </label>
                    <input type="text">
                    <label>Tecnica: </label>
                    <input type="text">
                    <label>Se cepilla la lengua? </label>
                    Si <input type="radio" name="len">
                    No <input type="radio" name="leng">
                    <label>Recibio Flour? </label>
                    Si <input type="radio" name="flou">
                    No <input type="radio" name="flou">
                    <label>Cuando: </label>
                    <input type="text">
                    <label>Via de Adm.: </label>
                    <input type="text">
                </div>

                <label>
                    <b>SIGNOS VITALES</b> 
                 </label>
                <div class="flex">
                    <label>P.S.A.</label>
                    <input required placeholder="" type="text">
                    <label>Temperatura bucal</label> 
                    <input required placeholder="" type="text">
                    <label>Frecuencua resp</label>
                    <input required placeholder="" type="text">
                </div>
            -->
                
            <br><input type="submit" value="Enviar">
        </form>
       
    </div>
    
</body>

</html>