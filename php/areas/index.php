
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <title>Plan de Tratamientos</title>
</head>
<br>
<div class="container is-fluid">
<div class="col-xs-12">
  		<h1>Bienvenido  </h1>
      <br>
		<h1>Lista de tratamientos</h1>
    <br>
    
    <div class="container-fluid">
    <form action="insertar.php" method="post">
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Nueva Area</label>
        <input name="nombre" type="text" class="form-control" id="" >
    </div>
    <button type="submit" class="btn btn-dark">Insertar Areas clinicas</button>
    </form>
  <?php
include '../../modelo/conexion.php';



?>
           <br>


			</form>
      <div class="container-fluid">
  <form class="d-flex">
      <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" 
      placeholder="Buscar algun plan de tratamiento">
      <hr>
      </form>
  </div>

  <br>
      <table class="table table-striped table-dark table_id ">
                         <thead>    
                         <tr>
                        <th>tratamiento</th>
                        </tr>
                        </thead>
                        <tbody>
				<?php

$SQL="SELECT * FROM areas;";
$dato = mysqli_query($conn, $SQL);

if($dato -> num_rows >0){
    while($fila=mysqli_fetch_array($dato)){
    
?>
<tr>
<td><?php echo $fila['nombre']; ?></td>


<td>
<a class="btn btn-warning" href="editar.php?id=<?php echo $fila['idareas']?> ">Editar </a>

</td>
</tr>


<?php
}
}else{

    ?>
    <tr class="text-center">
    <td colspan="16">No existen registros</td>
    </tr>
    <?php
}
?>
	</tbody>
  </table>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="../js/user.js"></script>
<script src="../js/acciones.js"></script>
<script src="../../js/buscador.js"></script>
</html>