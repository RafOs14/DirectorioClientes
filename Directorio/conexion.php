<?php
    class ConectarDB{
        private $server= "mysql:host=localhost;dbname=directorio";
        private $usuario="root";
        private $pass="root";
        private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC);
        protected $conn;

        public function open(){
            try{
                $this->conn = new PDO($this->server,  $this->usuario, $this->pass, $this->options);
                return $this->conn;
            } catch (PDOException $e){
                echo "Ha ocurrido un error en la conexion con la base de datos: ".$e->getMessage();
            }
        }

        public function close(){
            $this->conn = null;
        }
    }
?>

