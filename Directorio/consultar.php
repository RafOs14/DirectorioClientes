<!DOCTYPE html>
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
    <title>Directorio de Clientes</title>
</head>

<body>
    <div class="wrapper">
        <!-- Page Content  -->
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
        
        <div id="content">

           <?php 
                $criterio = "";
                $valor = "No se encontraron resultados, ingrese otra cédula para realizar la búsqueda o póngase en contacto con soporte.";
            ?>

            <div class="container">
                <div class="px-3 py-3 pb-md-4 mx-auto text-center">
                    <h1 class="page-header text-center fw-bold"> Buscar Usuario </h1>
                </div>             
                <form class="row g-3 form-search" method="POST">
                    <div class="col-auto">                        
                        <input type="text" class="form-control" name="busqueda" id="criterio" placeholder="Cédula" value="<?php echo $criterio; ?>">
                    </div> 
                    <div class="col-auto">
                    <input class="btn btn-primary" type="submit" name="boton-busqueda" value="Buscar" >
                    </div>             
                </form>

                <table class="table table-sm table-dark table-bordered table-striped table-hover" id="Agenda" style="margin-top: 20px">
                    <thead>
                        <th>ID</th>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Mail</th>                                                                  
                    </thead>
                    <tbody>
                       <?php
                            include_once('conexion.php');
                            $database = new ConectarDB();
                            $db = $database->open();
                            try{
                                if (isset($_POST['busqueda'])) {
                                    $criterio = $_POST['busqueda'];                                                             
                                    $sql = "SELECT * FROM clientes WHERE Cedula = $criterio";
                                    foreach ($db->query($sql) as $row) {
                                        ?>
                                    <tr>
                                        <td><?php echo $row['id_cliente']; ?></td>
                                        <td><?php echo $row['Cedula']; ?></td>
                                        <td><?php echo $row['Nombre']; ?></td>
                                        <td><?php echo $row['Apellido']; ?></td>
                                        <td><?php echo $row['Direccion']; ?></td>
                                        <td><?php echo $row['Telefono']; ?></td>
                                        <td><?php echo $row['Correo']; ?></td>
                                    </tr>
                                    <?php
                                    }
                                }
                             }catch (PDOException $e){
                                echo '<div class="px-3 py-3 pb-md-4 mx-auto text-center text-danger">'.
                                        '<h6 class="page-header text-center fw-bold"> ' . $valor . '</h6>'.
                                    '</div>';
                            }
                            $database->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
