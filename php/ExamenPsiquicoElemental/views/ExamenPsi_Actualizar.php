<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <h2>Editar Examen Psiquico Elemental</h2>
    <form method="post" class="form form-control" action="../Methods/actualizarDatosPsi.php">
        <?php
        $id = $_GET['id'];
        echo("<input type='hidden' value='$id' name='id_psiquico'>");
        ?>
        <div class="mb-3 row">
            <label for="conciencia" class="col-sm-2 col-form-label">Conciencia</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="conciencia" name="conciencia">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="percepcion" class="col-sm-2 col-form-label">Percepcion</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="percepcion" name="percepcion">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="memoria" class="col-sm-2 col-form-label">Memoria</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="memoria" name="memoria">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="altConductuales" class="col-sm-2 col-form-label">Alteraciones Conductuales</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="altConductuales" name="altConductuales">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="fecha" class="col-sm-2 col-form-label">fecha</label>
            <div class="col-sm-10">
                <input type="datetime-local" class="form-control" id="fecha" name="fecha">
            </div>
        </div>
        <button class="btn btn-primary">Actualizar datos</button>
    </form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>