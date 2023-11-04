<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <h2>Editar Examen Tejidos</h2>
    <form method="post" class="form form-control" action="../Methods/actualizarDatostej.php">
        <?php
        $id = $_GET['id'];
        echo("<input type='hidden' value='$id' name='id_tej'>");
        ?>
        <label><span><input type="checkbox" name="biopsia"></span>Biopsia</label>
        <label><span><input type="checkbox" name="Cito"></span>citologia exfoliativa</label>
        <label><span><input type="datetime-local" name="fecha"></span>fecha</label>
        <label><span><input type="checkbox" id="otros_option" name="otros_tej"></span>Otros</label><span>
            <div id="ischecked">
                <input type="text" id="otros_text" name="Tej_text" style="display: none;">
            </div>
            </span>
        <button class="btn btn-primary my-2">Actualizar datos</button>
    </form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="../../../js/ExamenPsi.js"></script>
</body>
</html>