<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styleTablas.css" type="text/css" media="all">
    <link rel="stylesheet" href="../css/styleBotones.css" type="text/css" media="all">
</head>
<body>
    <div class="container">
    <h1 class="text-center">Examen Psiquico Elemental</h1>
    <a href="./ExamenPsiquicoElemental/views/ExamenPsiquicoElemental.php" class="center" ><button class="btn" id="btn1">Crear Examen</button></a>
    <span></span>
    &nbsp;
    <table class="table table-striped table-black" >
    <thead id="tablas">
        <tr>
            <th scope="col">Nombre Paciente</th>
            <th scope="col">conciencia</th>
            <th scope="col">percepcion</th>
            <th scope="col">memoria</th>
            <th scope="col">alteracion cultural</th>
            <th scope="col">fecha</th>
            <th scope="col">Accion</th>
        </tr>
    </thead>
    <tbody>
        <?php
            include("conn.php");
            $query = $conexion -> query("call mostrar_ex_psiquico()");
            while($row = mysqli_fetch_assoc($query)){
                $id = $row["idex_psiquico"];
                $conciencia = $row["conciencia"];
                $percepcion = $row['percepcion'];
                $nombre = $row['nombres'];
                $memoria = $row['memoria'];
                $alteracion = $row['alt_conductual'];
                $fecha = $row['fecha'];
                echo("<tr>
                <th scope='row'>$nombre</th>
                <th>$conciencia</th>
                <th>$percepcion</th>
                <th>$memoria</th>
                <th>$alteracion</th>
                <th>$fecha</th>
                <th><a href='./ExamenPsiquicoElemental/views/ExamenPsi_Actualizar.php?id=$id'><button class='btn' id='btn1'>Editar</button></a><span class='p-2'><a href='./ExamenPsiquicoElemental/Methods/eliminarDatosPsi.php?id=$id'><button class='btn btn-danger'>Eliminar</button<</a></span></th>
                </tr>");
            }
        ?>
        </tr>
    </tbody>
</table>
</div>
<h3 class="text-center">
    Examen Complementario de Tejidos Blancos
</h3>
<div class="container">
    <table class="table table-striped table-black" >
    <thead id="tablas">
        <tr>
            <th scope="col">Nombre Paciente</th>
            <th scope="col">biopsia</th>
            <th scope="col">citologia</th>
            <th scope="col">otros</th>
            <th scope="col">fecha</th>
            <th scope="col">Accion</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        include("conn.php");
        $query = $conexion -> query("call mostrar_tejidos_blancos()");
        while($row = mysqli_fetch_assoc($query)){
            $id = $row["idex_c_radiograficos"];
            $nombre = $row["nombres"];
            $biopsia =isset($row["biopsia"])? $row["biopsia"]: null;
            $citologia = isset($row["citologia_exfoliativa"])? $row["citologia_exfoliativa"]: null;
            $otros = isset($row["otros"])? $row["otros"]: null;
            $fecha = $row["fecha"];   
            echo("<tr>
                <th scope='row'>$nombre</th>
                <th>$biopsia</th>
                <th>$citologia</th>
                <th>$otros</th>
                <th>$fecha</th>
                <th><a href='./ExamenPsiquicoElemental/views/Tejidos_Actualizar.php?id=$id'><button class='btn' id='btn1'>Editar</button></a><span class='p-2'><a href='./ExamenPsiquicoElemental/Methods/eliminarDatosTej.php?id=$id'><button class='btn btn-danger'>Eliminar</button<</a></span></th>
                </tr>");
        }
        ?>
    </tbody>
    </table>
</div>
<h3 class="text-center">
    Examen Complementario Radiograficos
</h3>
<div class="container">
    <table class="table table-striped table-black">
    <thead id="tablas">
        <tr>
            <th scope="col">Nombre Paciente</th>
            <th scope="col">Periapical</th>
            <th scope="col">Panoramica</th>
            <th scope="col">ExTejidos</th>
            <th scope="col">Oclusa</th>
            <th scope="col">Otros</th>
            <th scope="col">Fecha</th>
            <th scope="col">Accion</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        include("conn.php");
        $query = $conexion -> query("call mostrar_radiografico()");
        while($row = mysqli_fetch_assoc($query)){
            $id = $row["idex_c_tejidos"];
            $nombre = $row["nombres"];
            $periapical =isset($row["periapical"])? $row["periapical"]: null;
            $panoramica = isset($row["panoramica"])? $row["panoramica"]: null;
            $ex_tejidos = isset($row["ex_c_tejidoscol"])? $row["ex_c_tejidoscol"]: null;
            $oclusal = isset($row["oclusal"])? $row["oclusal"]: null;
            $otros = isset($row["otros"])? $row["otros"]: null;
            $fecha = $row["fecha"];   
            echo("<tr>
                <th scope='row'>$nombre</th>
                <th>$periapical</th>
                <th>$panoramica</th>
                <th>$ex_tejidos</th>
                <th>$oclusal</th>
                <th>$otros</th>
                <th>$fecha</th>
                <th><a href='./ExamenPsiquicoElemental/views/Radiograficos_Actualizar.php?id=$id'><button class='btn' id='btn1'>Editar</button></a><span class='p-2'><a href='./ExamenPsiquicoElemental/Methods/eliminarDatosTej.php?id=$id'><button class='btn btn-danger'>Eliminar</button<</a></span></th>
                </tr>");
        }
        ?>
    </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>