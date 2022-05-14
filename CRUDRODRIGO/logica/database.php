<?php
    class Database{
        private $con;
        private $dbhost = "localhost";
        private $dbuser = "root";
        private $dbpass = "";
        private $dbname = "proyecto_juegos";

        public function conectar(){
            $this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
            if(mysqli_connect_error()){
                die("Conexion a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
            }
        }

        public function sanitize($var){
            $this->conectar();
            $varlimpia = mysqli_real_escape_string($this->con, $var);
            mysqli_close($this->con);
            return $varlimpia;
        }

        public function insertarJuego($id, $nombre, $fechalanzamiento, $descripcion, $consola){
            $this->conectar();
            $sql = "INSERT INTO `juegos` (`id`, `nombre`, `fechalanzamiento`, `descripcion`, `consola`) 
            VALUES ('$id', '$nombre', '$fechalanzamiento', '$descripcion', '$consola')";
            $res = mysqli_query($this->con, $sql);
            mysqli_close($this->con);
            if($res){
                return true;
            }else{
                return false;
            }
        }

        public function mostrarJuegos(){
            $this->conectar();
            $sql = "SELECT * FROM juegos";
            $res = mysqli_query($this->con, $sql);
            mysqli_close($this->con);
            return $res;
        }

        public function buscarJuego($id){
            $this->conectar();
            $sql = "SELECT * FROM juegos WHERE id = '$id'";
            $res = mysqli_query($this->con, $sql);
            $res2 = mysqli_fetch_object($res);
            mysqli_close($this->con);
            return $res2;
        }

        public function actualizarJuego($id, $nombre, $fechalanzamiento, $descripcion, $consola){
            $this->conectar();
            $sql = "UPDATE `juegos` SET 
            `nombre` = '$nombre', 
            `fechalanzamiento` = '$fechalanzamiento', 
            `descripcion` = '$descripcion', 
            `consola` = '$consola' 
            WHERE `juegos`.`id` = '$id'";
            $res = mysqli_query($this->con, $sql);
            mysqli_close($this->con);
            if($res){
                return true;
            }else{
                return false;
            }
        }

        public function eliminarJuego($id){
            $this->conectar();
            $sql = "DELETE FROM `juegos` WHERE `juegos`.`id` = '$id'";
            $res = mysqli_query($this->con, $sql);
            mysqli_close($this->con);
            if($res){
                return true;
            }else{
                return false;
            }
        }

        public function mostrarConsolas(){
            $this->conectar();
            $sql = "SELECT * FROM consolas";
            $res = mysqli_query($this->con, $sql);
            mysqli_close($this->con);
            return $res;
        }
        
         public function insertarConsola($id, $nombre){
            $this->conectar();
            $sql = "INSERT INTO `consolas` (`id`, `nombre`) 
            VALUES ('$id', '$nombre')";
            $res = mysqli_query($this->con, $sql);
            mysqli_close($this->con);
            if($res){
                return true;
            }else{
                return false;
            }
    
         }
         public function ActualizarConsola($id, $nombre){
            $this->conectar();
            $sql = "UPDATE `consolas` SET `id` = '$id',`nombre` = '$nombre' 
            WHERE `consolas`.`id` = '$id'";
            $res = mysqli_query($this->con, $sql);
            mysqli_close($this->con);
            if($res){
                return true;
            }else{
                return false;
            }
    
         }
         public function buscarConsolas($id){
            $this->conectar();
            $sql = "SELECT * FROM consolas WHERE id = '$id'";
            $res = mysqli_query($this->con, $sql); 
            $res2 = mysqli_fetch_object($res);
            mysqli_close($this->con);
            return $res2;
        }
    
        public function eliminarConsolas($id){
            $this->conectar();
            $sql = "DELETE FROM consolas WHERE `consolas`.`id` = '$id'";
            $res = mysqli_query($this->con, $sql);
           mysqli_close($this->con);
           if($res){
               return true;
           }else{
               return false;
           }
        }
    }
?>