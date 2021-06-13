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
    <title>Specific</title>
</head>
<body>
    <?php include 'includes/header.php' ?>

    <div class="container containerSearch">
        <div class="card bg-light">
            <div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Productos</strong> <a href="actions/addUser.php" class="float-end btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Agregar usuario</a></div>
            <div class="card-body">
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
							<a href="edit-users.php?editId=<?php echo $val['id_user'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> | 
							<a href="delete.php?delId=<?php echo $val['id_user'];?>" class="text-danger" onClick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i> Delete</a>
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<script src="assets/js/script.js"></script>
</body>
</html>