<?php
     include("database.php");
     $consola = new Database();
    if(isset($_POST) && !empty($_POST)){
        $id = $consola->sanitize($_POST["id"]);
        $nombre = $consola->sanitize($_POST["nombre"]);

        $res = $consola->insertarConsola($id, $nombre);
        if($res){
            header("Location: ../mostrarconsolas.php?msg=1");
        }else{
            header("Location: ../mostrarconsolas.php?msg=4");
        }
    }
?>