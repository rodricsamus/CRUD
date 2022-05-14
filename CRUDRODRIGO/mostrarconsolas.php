<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de consolas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<?php   include("menu/admin.html");  ?>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Listado de Consolas</h2></div>
                 </div>
                <?php include("logica/msg.php"); ?>
            </div>
             <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        
                        <th>Acciones</th>
                    </tr>
                </thead>
                 
                <tbody>    
                <?php
                          include("logica/database.php");
                          $consolas=new Database();
                          $listado=$consolas->mostrarConsolas(); 

                          while($row=mysqli_fetch_object($listado)){
                          $id=$row->id;
                          $nombre=$row->nombre;
                          
            ?>
            <tr>
                <td><?php echo $id; ?></td>

                <td><?php echo $nombre; ?></td>
                

                <td>
                     <a href="modificarconsola.php?id=<?php echo $id;?>&mod"><i class="fa fa-edit" style="font-size:24px"></i></a>
                     <a href="logica/eliminar_Consolas.php?id=<?php echo $id;?>"><i class="fa fa-trash" style="font-size:24px"></i></a>
                    
                </td>
    </tr>
    <?php
                          }
?>
                </tbody>
            </table>
        </div>
    </div>     
</body>
</html>