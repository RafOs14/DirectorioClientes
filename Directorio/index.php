<!doctype html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/98ae0c7e8b.js"></script>
  <script src="https://use.fontawesome.com/e815fe86cc.js"></script>
  <script src="https://use.fontawesome.com/6a0e30cb02.js"></script>

  <!--Data Tables -->
  <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>

  <title>Directorio de Clientes</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="#">Directorio de Clientes</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="consultar.php">Consultar</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container" style="margin-top: 20px;">
    <h1 class="page-header text-center fw-bold">Directorio de Clientes</h1>    
    <div class="row">
      <div class="col-sm-12">
        <a href="#addNuevo" class="btn btn-primary" data-bs-toggle="modal"><span class="fa fa-plus"></span> Nuevo</a>

        <?php
          session_start();
          if(isset($_SESSION['message'])){?>            
            <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert" style="margin-top: 15px;">
              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
              <div>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>&nbsp;
                <?php echo $_SESSION['message']; ?>                
              </div>
            </div>
            
            <?php
            unset( $_SESSION['message']);
          }
        ?>
        <table class="table table-sm table-dark table-bordered table-striped table-hover" id="Agenda" style="margin-top: 20px">
          <thead>
            <th>ID</th>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Mail</th>
            <th>Acciones</th>
          </thead>
          <tbody>
            <?php
              include_once('conexion.php');
              $database = new ConectarDB();
              $db = $database->open();
              try{
                $sql = 'SELECT * FROM clientes';
                foreach ($db->query($sql) as $row){
                  ?>
                  <tr>
                    <td><?php echo $row['id_cliente']; ?></td>
                    <td><?php echo $row['Cedula']; ?></td>
                    <td><?php echo $row['Nombre']; ?></td>
                    <td><?php echo $row['Apellido']; ?></td>
                    <td><?php echo $row['Direccion']; ?></td>
                    <td><?php echo $row['Telefono']; ?></td>
                    <td><?php echo $row['Correo']; ?></td>                   
                    <td><a href="#edit_<?php echo $row['Cedula'];?>" class="btn btn-success btn-sm" data-bs-toggle="modal"><span class="fa fa-pencil"></span> Editar</a>
                    <a href="#delete_<?php echo $row['Cedula'];?>" class="btn btn-danger btn-sm" data-bs-toggle="modal"><span class="fa fa-trash"></span> Eliminar</a></td>
                    <?php include('EditarEliminarModal.php');?>
                  </tr>
                  <?php
                }
              }catch (PDOException $e){
                echo 'Se han presentado errores con  la conexion a la base de datos: '.$e ->getMessage();
              }
              $database->close();
            ?>
          </tbody>
        </table>
      <div>
    </div>
  </div>

  <!-- /.container -->
  <?php include('addModal.php'); ?>

  
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <script type="text/javascript" src="DataTables/datatables.min.js"></script>

  <script>

    $(document).ready( function () {
      $('#Agenda').DataTable();
    } );

  </script>

<script>
  var table = $('#Agenda').DataTable({
    language:{
      "decimal": "",
      "emptyTable": "No hay información",
      "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
      "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
      "infoFiltered": "(Filtrado de _MAX_ total entradas)",
      "infoPostFix": "",
      "thousands": ",",
      "lengthMenu": "Mostrar _MENU_ Entradas",
      "loadingRecords": "Cargando...",
      "processing": "Procesando...",
      "search": "Buscar", 
      "zeroRecords": "Sin resultados encontrados",
      "paginate":{
        "first": "Primero",
        "last": "Ultimo",
        "next": "Siguiente",
        "previous": "Anterior"
      }
    },
  });

</script>
</body>
</html>