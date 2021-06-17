<?php  

    require_once 'functions/function.php';
    session_start();

    if (!isset($_SESSION['user'])){
        header('Location: pages/signC.php');
    }else{
		require_once 'functions/conexion.php';
		//$db = getConn();
        $idUser = $_SESSION['user']['id_user'];

        //echo 'Hola'.$idUser;

        $db=getConn();
        $stmtUserFound = $db->prepare("SELECT * FROM users where id_user = :id_user");
        $stmtUserFound->bindParam(":id_user", $idUser);
        $stmtUserFound->execute();

        $userFound = $stmtUserFound->fetch(PDO::FETCH_OBJ);

        if(isset($_POST['submit'])){
            /*$name = $_POST['username'];
            $email = $_POST['useremail'];
            $type = $_POST['usertype'];*/

            $name = $_POST['username'];
            $email = $_POST['useremail'];
            if(!empty($_POST['password'])){
                $pass = $_POST['password'];
                $password = password_hash($pass, PASSWORD_BCRYPT, ['cost' => 4]);

            }else{
                $password = $userFound -> password;
            }
            $type = $userFound -> id_permissions;
            echo 'User: '.$name.'Pass: '.$password;
    
            $query = 'UPDATE users SET name=:name,password=:password, email=:email, id_permissions=:id_permissions WHERE id_user=:id_user';
            $statement = $db -> prepare($query);
            if($statement -> execute([':name' => $name, ':password' => $password, ':email' => $email, ':id_permissions' => $type, 'id_user' => $idUser])){
                //$_SESSION['update'] = 'Usuario Actualizado correctamente';
                header("Location: dashAdmin.php");
            }
        }

		/*if(isset($_REQUEST)){
			$tuserFound = $db->prepare("SELECT * FROM users");
			$tuserFound->execute();
			$userFound = $tuserFound->fetchAll(PDO::FETCH_ASSOC);
		}*/
	}

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
            <div class="card-header"><i class="fa fa-fw fa-edit"></i> <strong>Perfil Usuario</strong> <!--<a href="browse-users.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Users</a>--></div>
            <div class="card-body">
                
                <div class="col-sm-6">
                    <h5 class="card-title">Los campos <span class="text-danger"> * </span> son obligatorios</h5>
                    <form method="post">
                        <div class="form-group">
                            <label>Nombre <span class="text-danger">*</span></label>
                            <input type="text" name="username" id="username" class="form-control" value="<?= $userFound -> name;?>" placeholder="Ingresa un nombre" required>
                        </div>
                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span></label>
                            <input type="email" name="useremail" id="useremail" class="form-control" value="<?= $userFound -> email;?>" placeholder="Ingresa un email" required>
                        </div>
                        <div class="form-group">
                            <label>Contraseña <span class="text-danger">*</span></label>
                            <input type="password" name="password" id="password" minlength="6" class="form-control" placeholder="Ingresa tu nueva contraseña">
                        </div>
                        <br>
                        <!-- <div class="form-group">
                                    <label>Tipo</label>
                                    <select name="usertype" id="usertype" class="form-select" aria-label="Default select example">
                                        <option value="1" <?php if($userFound -> id_permissions == '1'){ ?> selected <?php } ?>>Administrador</option>
                                        <option value="2"<?php if($userFound -> id_permissions == '2'){ ?> selected <?php } ?>>Usuario</option>
                                    </select>
                                </div> -->
                        <div class="form-group">
                            <!-- <input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId']?>"> -->
                            <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Modificar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>