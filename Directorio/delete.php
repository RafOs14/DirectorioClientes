<?php
       session_start();
       include_once('conexion.php');    
       if(isset($_GET['id'])){
           $database = new ConectarDB();
           $db = $database->open();
           try{   
               $sql = "DELETE FROM clientes WHERE Cedula = '".$_GET['id']."' ";
               $_SESSION['message']= ($db->exec($sql)) ? 'Se ha eliminado el cliente correctamente' : 'Algo salio mal, no fue posible eliminar el registro, reintente o pongase en contacto con soporte';
   
           }catch (PDOException $e){
   
               $_SESSION['message']= $e->getMessage();
   
           }
   
           $database->close();
   
       }else{
   
           $_SESSION['message']= 'Seleccione un cliente a eliminar por favor';
   
       }
   
       header('location: index.php');