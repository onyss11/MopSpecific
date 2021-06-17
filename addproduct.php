<?php  

    require_once 'functions/conexion.php';
    require_once 'functions/function.php';
    session_start();

    /*if (!isset($_SESSION['user'])){
        header('Location: pages/signC.php');
    }else{
        */if(isset($_POST['submit'])){
            $db=getConn();

            $marca = strtolower($_POST['marca']);
            $model = strtolower($_POST['model']);
            $description = $_POST['description'];
            $preparation = $_POST['preparation'];
            $config = $_POST['config'];
            $relation = $_POST['relation'];
            $presion = $_POST['presion'];
            $aplication = $_POST['aplication'];
            $time = $_POST['time'];

            $errors = [];

            $query = $db -> prepare("SELECT * FROM modelo WHERE namMdelo = :modelo");
            $query -> bindParam(":modelo", $model);
            $query -> execute();
            $getidmodel = $query -> fetch(PDO::FETCH_ASSOC);

            if ($getidmodel) {
                $_SESSION['error'] = "Ese modelo ya ha sido introducido :(";
                $_SESSION['marca'] = $marca;
                $_SESSION['model'] = $model;
                $_SESSION['description'] = $description;
                $_SESSION['preparation'] = $preparation;
                $_SESSION['config'] = $config;
                $_SESSION['relation'] = $relation;
                $_SESSION['presion'] = $presion;
                $_SESSION['aplication'] = $aplication;
                $_SESSION['time'] = $time;

                header("Location: addproduct.php");
                exit();
            }else{
            
                $query = $db -> prepare("SELECT * FROM marca WHERE naMarca = :marca");
                $query -> bindParam(":marca", $marca);
                $query -> execute();
                $getidmarca = $query->fetch(PDO::FETCH_ASSOC);

                if($getidmarca){
                
                    $query = $db -> prepare("INSERT INTO modelo(id_marca, namMdelo) VALUES (:id_marca, :modelo)");
                    $query -> bindParam(":id_marca", $getidmarca['id_marca']);
                    $query -> bindParam(":modelo", $model);
                    $query -> execute();

                    $query = $db -> prepare("SELECT * FROM modelo WHERE namMdelo = :modelo");
                    $query -> bindParam(":modelo", $model);
                    $query -> execute();
                    $getidmodel = $query -> fetch(PDO::FETCH_ASSOC);

                    $query = $db -> prepare ("INSERT INTO especificacion(id_modelo, descripcion,preparacionS, configP, relacionM, presionA, aplicacion, tiempoV) VALUES (:id_modelo, :descripcion, :preparacionS, :configP, :relacionM, :presionA, :aplicacion, :tiempoV)");
                    $query -> bindParam(":id_modelo", $getidmodel['id_modelo']);
                    $query -> bindParam(":descripcion", $description);
                    $query -> bindParam(":preparacionS", $preparation);
                    $query -> bindParam(":configP", $config);
                    $query -> bindParam(":relacionM", $relation);
                    $query -> bindParam(":presionA", $presion);
                    $query -> bindParam(":aplicacion", $aplication);
                    $query -> bindParam(":tiempoV", $time);
                    $query -> execute();
                }else{
                
                    $query = $db -> prepare("INSERT INTO marca(naMarca) VALUES (:marca)");
                    $query -> bindParam(":marca", $marca);
                    $query -> execute();

                    $query = $db -> prepare("INSERT INTO modelo(id_marca, namMdelo) VALUES (:id_marca, :modelo)");
                    $query -> bindParam(":id_marca", $getidmarca['id_marca']);
                    $query -> bindParam(":modelo", $model);
                    $query -> execute();

                    $query = $db -> prepare("SELECT * FROM modelo WHERE namMdelo = :modelo");
                    $query -> bindParam(":modelo", $model);
                    $query -> execute();
                    $getidmodel = $query -> fetch(PDO::FETCH_ASSOC);

                    $query = $db -> prepare ("INSERT INTO especificacion(id_modelo, descripcion,preparacionS, configP, relacionM, presionA, aplicacion, tiempoV) VALUES (:id_modelo, :descripcion, :preparacionS, :configP, :relacionM, :presionA, :aplicacion, :tiempoV)");
                    $query -> bindParam(":id_modelo", $getidmodel['id_modelo']);
                    $query -> bindParam(":descripcion", $description);
                    $query -> bindParam(":preparacionS", $preparation);
                    $query -> bindParam(":configP", $config);
                    $query -> bindParam(":relacionM", $relation);
                    $query -> bindParam(":presionA", $presion);
                    $query -> bindParam(":aplicacion", $aplication);
                    $query -> bindParam(":tiempoV", $time);
                    $query -> execute();
                    
                }
                $_SESSION['message'] = "Se ha agregado correctamente :)";
                $_SESSION['marca'] = NULL;
                $_SESSION['model'] = NULL;
                $_SESSION['description'] = NULL;
                $_SESSION['preparation'] = NULL;
                $_SESSION['config'] = NULL;
                $_SESSION['relation'] = NULL;
                $_SESSION['presion'] = NULL;
                $_SESSION['aplication'] = NULL;
                $_SESSION['time'] = NULL;
            }
        }


	//}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/stylesAdminUser.css">
    <title>Perfil</title>
</head>
<body>
    <?php include 'includes/header.php' ?>

    <div class="container containerSearch">
        <!-- <h1><a href="https://learncodeweb.com/php/php-crud-in-bootstrap-4-with-search-functionality/">PHP CRUD in Bootstrap with search and pagination</a></h1> -->
        <!-- <?php
        if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un"){
            echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User name is mandatory field!</div>';
        }elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ue"){
            echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User email is mandatory field!</div>';
        }elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="up"){
            echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User phone is mandatory field!</div>';
        }elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){
            echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';
        }elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
            echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';
        }
        ?> -->
        <div class="card">
            <div class="card-header"><i class="fa fa-fw fa-edit"></i> <strong>Agregar Producto</strong> <!--<a href="browse-users.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Users</a>--></div>
            <div class="card-body">
            <?php if (isset($_SESSION['message'])){ ?>
                <div class="alert alert-success" role="alert">
                <?=$_SESSION['message'];?>
                </div>
            <?php } ?>
            <?php if (isset($_SESSION['error'])){ ?>
                <div class="alert alert-danger" role="alert">
                <?=$_SESSION['error'];?>
                </div>
            <?php } ?>
                <div class="col-sm-6">
                    <h5 class="card-title">Los campos <span class="text-danger"> * </span> son obligatorios</h5>
                    <form method="post">
                        <div class="form-group">
                            <label>Marca <span class = "text-danger">*</span></label>
                            <input type="text" name = "marca" class = "form-control" value="<?php echo isset($_SESSION['marca'])?$_SESSION['marca']:''?>" placeholder = "Ingresa el nombre de la marca" required>
                        </div>
                        <div class="form-group">
                            <label>Modelo <span class="text-danger">*</span></label>
                            <input type="text" name="model" class="form-control" value="<?php echo isset($_SESSION['model'])?$_SESSION['model']:''?>" placeholder="Ingresa el nombre del modelo" required>
                        </div>
                        <div class="form-group">
                            <label>Descripcion <span class="text-danger">*</span></label>
                            <textarea name="description" id="" cols="5" rows="3" class ="form-control"><?php echo isset($_SESSION['description'])?$_SESSION['description']:''?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Preaparacion <span class="text-danger">*</span></label>
                            <textarea name="preparation" id="" cols="5" rows="3"  class ="form-control"><?php echo isset($_SESSION['preparation'])?$_SESSION['preparation']:''?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Configuracion <span class="text-danger">*</span></label>
                            <textarea name="config" id="" cols="5" rows="3" class ="form-control"><?php echo isset($_SESSION['config'])?$_SESSION['config']:''?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Relacion <span class="text-danger">*</span></label>
                            <textarea name="relation" id="" cols="5" rows="3"  class ="form-control"><?php echo isset($_SESSION['relation'])?$_SESSION['relation']:''?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Presion <span class="text-danger">*</span></label>
                            <textarea name="presion" id="" cols="5" rows="3" class ="form-control"><?php echo isset($_SESSION['presion'])?$_SESSION['presion']:''?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Aplicacion <span class="text-danger">*</span></label>
                            <textarea name="aplication" id="" cols="5" rows="3" class ="form-control"><?php echo isset($_SESSION['aplication'])?$_SESSION['aplication']:''?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Tiempo <span class="text-danger">*</span></label>
                            <textarea name="time" id="" cols="5" rows="3" class ="form-control"><?php echo isset($_SESSION['time'])?$_SESSION['time']:''?></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <button type = "submit" name = "submit" class="btn btn-success">Agregar</button>
                        </div>
                    </form>
                    <?php clearErrors(); clearForm(); ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>