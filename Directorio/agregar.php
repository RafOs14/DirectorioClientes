<?php
    session_start();
    include_once('conexion.php');    
    if(isset($_POST['add'])){
        $database = new ConectarDB();
        $db = $database->open();
        try{
            $stmt = $db->prepare("INSERT INTO clientes (Cedula, Nombre, Apellido, Direccion, Telefono, Correo) VALUES
             (:cedula, :nombreCliente, :apellidoCliente, :direccion, :telefono, :email)");
            $_SESSION['message']=($stmt->execute(array(':cedula' => $_POST['cedula'],
            ':nombreCliente' => $_POST['nombreCliente'],':apellidoCliente' => $_POST['apellidoCliente'],
            ':direccion' => $_POST['direccion'],':telefono' => $_POST['telefono'],':email' => $_POST['email']))) ? 
            'Cliente insertado correctamente' : 'Algo salio mal, no fue posible agregar el contacto';

        }catch (PDOException $e){

            $_SESSION['message']= $e->getMessage();

        }

        $database->close();

    }else{

        $_SESSION['message']= 'Debe completar los campos del formulario';

    }
  
    header('location: index.php');
?>