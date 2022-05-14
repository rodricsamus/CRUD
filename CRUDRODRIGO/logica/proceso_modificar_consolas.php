<?php
    include("database.php");
    $consolas = new Database();
    if(isset($_POST) && !empty($_POST)){
        $id=$consolas->sanitize($_POST['id']);
        $nombre=$consolas->sanitize($_POST[ 'nombre']);
        
          
        $res=$consolas->ActualizarConsola($id, $nombre);
        if($res){
   header("Location: ../mostrarConsolas.php?msg=2");
        }else{
   header("Location: ../mostrarConsolas.php?msg=5");
        }
    }
?>