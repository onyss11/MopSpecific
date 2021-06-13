<?php  

    require_once 'functions/function.php';
    session_start();

    if (!isset($_SESSION['user'])){
        header('Location: pages/signC.php');
    }elseif($_SESSION['user']['id_permissions'] != 1){
        header('Location: dashUser.php');
    }else{
		require_once 'functions/conexion.php';
		$db = getConn();

		if(isset($_REQUEST)){
			$tuserFound = $db->prepare("SELECT * FROM users");
			$tuserFound->execute();
			$userFound = $tuserFound->fetchAll(PDO::FETCH_ASSOC);
		}
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
    <title>Dash</title>
</head>
<body>
<?php include 'includes/header.php' ?>

    <div class="container containerSearch">
        <div class="card bg-light">
            <div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Añadir usuarios</strong> <!--<a href="actions/addUser.php" class="float-end btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Agregar usuario</a>--></div>
            <div class="card-body">
				<?php if (isset($_SESSION['update'])){ ?>
					<div class="alert alert-warning" role="alert">
					<?=$_SESSION['update'];?>
					</div>
				<?php } ?>
				<?php if (isset($_SESSION['delete'])){ ?>
					<div class="alert alert-success" role="alert">
					<?=$_SESSION['delete'];?>
					</div>
				<?php } ?>
				<?php if (isset($_SESSION['error'])){ ?>
					<div class="alert alert-danger" role="alert">
					<?=$_SESSION['error'];?>
					</div>
				<?php } ?>
				<?php if(isset($_SESSION['message'])){?>
					<div class="alert alert-success" role="alert">
					<?=$_SESSION['message'];?>
					</div>
				<?php }?>
                <div class="col-ms-12">
                    <!-- <h5 class="card-title"><i class="fa fa-fw fa-search"></i> Find User</h5> -->
                    <form method="POST" action="actions/addUser.php" class="aligth-center">
                        <div class="row">
                            <div class="col-md-3">
								<div class="form-group">
									<label>Nombre</label>
									<input type="text" name="username" id="username" class="form-control" value="<?php echo isset($_SESSION['username'])?$_SESSION['username']:''?>" placeholder="Ingresa el nombre">
								</div>
							</div>
                            <div class="col-md-2">
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="useremail" id="useremail" class="form-control" value="<?php echo isset($_SESSION['useremail'])?$_SESSION['useremail']:''?>" placeholder="Ingresa el email">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>Contraseña</label>
									<input type="pass" name="userpass" id="userpass" class="form-control" value="<?php echo isset($_SESSION['userpass'])?$_SESSION['userpass']:''?>" placeholder="Ingresa la contraseña">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>Tipo</label>
									<select name="usertype" id="usertype" class="form-select" aria-label="Default select example">
										<!-- <option selected>Selecciona el tipo</option> -->
										<option value="1">Administrador</option>
										<option value="2">Usuario</option>
									</select>
									<!-- <input type="text" name="userphone" id="userphone" class="form-control" value="<?php echo isset($_REQUEST['userphone'])?$_REQUEST['userphone']:''?>" placeholder="Ingresa el tipo"> -->
								</div>
							</div>
                            <div class="col-md-3">
								<div class="form-group" align="center">
									<label>&nbsp;</label>
									<div>
										<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i>  Agregar</button>
										<a href="<?php clearForm();?>" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i>  Limpiar</a>
									</div>
								</div>
							</div>
                        </div>
                    </form>
					<?php clearErrors(); ?>
                </div>
            </div>
        </div>
		<div>
			<table class="table table-hover">
				<thead>
					<tr class="table-secondary text-black">
						<th>ID</th>
						<th>Nombre</th>
						<th>Email</th>
						<th>Permisos</th>
						<th class="text-center">Acción</th>
					</tr>
				</thead>
				<tbody class="table-light ">
					<?php 
						if($userFound){
							$s	=	'';
						foreach($userFound as $userData){
							$s++;
					?>
					<tr>
						<td><?php echo $s;?></td>
						<td><?php echo $userData['name'];?></td>
						<td><?php echo $userData['email'];?></td>
						<td><?php echo $userData['id_permissions'];?></td>
						<td align="center">
							<a href="editUser.php?editId=<?php echo $userData['id_user'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Editar</a> | 
							<a href="actions/deleteUser.php?delId=<?php echo $userData['id_user'];?>" class="text-danger" onClick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i> Eliminar</a>
						</td>

					</tr>
					<?php 
						}
					}else{
					?>
					<tr><td colspan="5" align="center">No Record(s) Found!</td></tr>
					<?php } ?></tbody>
			</table>
		</div>
    </div>

    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<script src="assets/js/script.js"></script>
</body>
</html>