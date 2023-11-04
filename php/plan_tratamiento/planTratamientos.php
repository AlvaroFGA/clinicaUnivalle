<?php
session_start();
error_reporting(0);
$validar = 'juan';
?>
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
  		<h1>Bienvenido  <?php echo 'juan'; ?></h1>
      <br>
		<h1>Lista de tratamientos en curso</h1>
    <br><a href="insertarPlan.php"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#create">
				<span class="glyphicon glyphicon-plus"></span> Nuevo Plan de Tratamiento   <i class="fa fa-plus"></i>
      </button></a>


</div>



    <div class="container-fluid">
  
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
                        <th>descripcion</th>
                        <th>fecha diag</th>
                        <th>paceinte</th>
                        <th>ci</th>
                        </tr>
                        </thead>
                        <tbody>

				<?php

$SQL="SELECT pt.idplan_tratamientos as idpt ,t.nombre as tratamiento, pt.descripcion as desripcion, pt.fecha_diagnostico as fechaDiag, concat(pr.nombres,' ', pr.apellidos) as paciente, pr.ci as dni
FROM plan_tratamientos pt
INNER JOIN tratamientos t ON pt.tratamientos_idtratamientos = t.idtratamientos
INNER JOIN pacientes p ON pt.pacientes_idpacientes = p.idpacientes
INNER JOIN personas pr ON p.personas_ci = pr.ci;";
$dato = mysqli_query($conn, $SQL);

if($dato -> num_rows >0){
    while($fila=mysqli_fetch_array($dato)){
    
?>
<tr>
<td><?php echo $fila['tratamiento']; ?></td>
<td><?php echo $fila['desripcion']; ?></td>
<td><?php echo $fila['fechaDiag']; ?></td>
<td><?php echo $fila['paciente']; ?></td>
<td><?php echo $fila['dni']; ?></td>


<td>
<a class="btn btn-warning" href="tratamientoPresupuesto.php?id=<?php echo $fila['idpt']?> ">
Presupuesto </a>

  <a class="btn btn-danger"  href="eliminar_user.php?id=<?php echo $fila['idpt']?>">
Ficha Clinica</a>
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


	</body>
  </table>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="../js/user.js"></script>
<script src="../js/acciones.js"></script>
<script src="../js/buscador.js"></script>




</html>