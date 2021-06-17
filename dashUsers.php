<?php  

    //require_once '../functions/function.php';
    session_start();

    if (!isset($_SESSION['user'])){
        header('Location: pages/signC.php');
    }elseif($_SESSION['user']['id_permissions'] != 2){
        header('Location: dashAdmin.php');
    }else{
		require_once 'functions/conexion.php';
		$db = getConn();

		if(isset($_REQUEST)){
			$tuserFound = $db->prepare("SELECT guardado.id, guardado.id_especificacion, guardado.marca, guardado.modelo, marca.naMarca, modelo.namMdelo FROM guardado INNER JOIN marca ON guardado.marca = marca.id_marca INNER JOIN modelo ON guardado.modelo = modelo.id_modelo");
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

    <div class="containerSearch container">
			<table class="table table-hover">
				<thead>
					<tr class="table-secondary text-black">
						<th>N°</th>
						<!-- <th>ID</th> -->
						<th>Marca</th>
						<th>Modelo</th>
                        
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
						<!-- <td><?php echo $userData['id'];?></td> -->
						<td><?php echo $$userData['naMarca'];?></td>
						<td><?php echo $userData['namMdelo'];?></td>
						<td align="center">
							<a href="specifics.php?editId=<?php echo $userData['id_especificacion'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Ver</a> | 
							<a href="actions/deleteSpecific.php?delId=<?php echo $userData['id'];?>" class="text-danger" onClick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i> Eliminar</a>
						</td>

					</tr>
					<?php 
						}
					}else{
					?>
					<tr><td colspan="4" align="center">No existen datos</td></tr>
					<?php } ?></tbody>
			</table>
		</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<script src="assets/js/script.js"></script>
</body>
</html>