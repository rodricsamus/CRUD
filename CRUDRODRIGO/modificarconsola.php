<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modificar Consola</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
<?php   
include("menu/admin.html"); 
include("logica/database.php");
 ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>modificar Consola</h3>
                <?php
                   $consola = new Database();
                   if(isset($_GET["id"]) &&  !empty($_GET["id"])){
                    $id = $consola->sanitize($_GET["id"]);   
                    $res = $consola->buscarConsolas($id);
                    if($res){

                    
                   
                ?>
               
                <form action="logica/proceso_modificar_consolas.php" method="POST">
                    <div class="form-group">
                        <label for="id">ID Consola</label>
                        <input id="id" name="id" type="text" value="<?php echo $res->id; ?>" required="required" readonly="" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input id="nombre" name="nombre" type="text" value="<?php echo $res->nombre; ?>" class="form-control" required="required" >
                    </div>
                    
                                  
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <button name="submit" type="submit" class="btn btn-primary">Modificar</button>
                            </div>
                        </form>
                <?php
                    }  else {
                        echo "<div class= 'alert alert-danger'>consola no encontrada</div>";

                    }
                }
                ?>
                    
                    
                    </div>
                   
                </form>
            </div>
        </div>
    </div>
</body>

</html>