<?php

    session_start();
    include_once('conexion.php');    
    if(isset($_POST['edit'])){
        $database = new ConectarDB();
        $db = $database->open();
        try{
            $id = $_GET['id'];
            $cedulac = $_POST['cedula'];
            $nombrec = $_POST['nombreCliente'];
            $apellidoc = $_POST['apellidoCliente'];
            $direccionc = $_POST['direccion'];
            $telefonoc = $_POST['telefono'];
            $correoc = $_POST['email'];
            

            $sql = "UPDATE clientes SET Cedula='$cedulac', Nombre='$nombrec', Apellido='$apellidoc', Direccion='$direccionc', Telefono='$telefonoc', Correo='$correoc' WHERE Cedula = '$id' ";
            $_SESSION['message']= ($db->exec($sql)) ? 'Se modificaron los datos del cliente de forma satisfactoria' : 'Algo salio mal, no fue posible editar el cliente, reintente o pongas en contacto con soporte';

        }catch (PDOException $e){

            $_SESSION['message']= $e->getMessage();

        }

        $database->close();

    }else{

        $_SESSION['message']= 'Debe completar los campos del formulario para continuar';

    }

    header('location: index.php');

?>
