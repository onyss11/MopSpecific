<?php
if(isset($_GET['editId'])){
    require_once 'functions/conexion.php';
    if(!isset($_SESSION)){
        session_start();
    }
    $especific=$_GET['editId'];
    $db = getConn();
    $query2 = $db->prepare("SELECT * FROM especificacion WHERE id_especificacion = :id ");
    $query2->bindParam(":id", $especific);
    $query2->execute();
    $row = $query2->fetch(PDO::FETCH_ASSOC);
    
}

if (isset($_POST['submit'])){

    require_once 'functions/conexion.php';

    if(!isset($_SESSION)){
        session_start();
    }

    //$marca = $_POST['cbx_marca'];
    $modelo = $_POST['cbx_modelo'];
    
    $db=getConn();
    $queryM = $db->prepare("SELECT * FROM especificacion WHERE id_modelo = :id_modelo ");
    $queryM->bindParam(":id_modelo", $modelo);
    $queryM->execute();
    $row = $queryM->fetch(PDO::FETCH_ASSOC);

}


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Specifics</title>
</head>
<body>
    <?php include 'includes/header.php' ?>

    <div class="specificSection">
        <div class="specificSection__container">
            <div class="cardS">
                <img src="assets/img/des.svg" alt="" class="specificImg"></img>
                <h2 class="card__title">Descripcion</h2>
                <p class="card__description"><?php echo $row['descripcion']; ?>
                </p>
            </div>
            <div class="cardS">
                <img src="assets/img/limpiar.svg" alt="" class="specificImg"></img>
                <h2 class="card__title">Preparacion superficie</h2>
                <p class="card__description"><?php echo $row['preparacionS']; ?>
                </p>
            </div>
            <div class="cardS">
                <img src="assets/img/pistola.svg" alt="" class="specificImg"></img>
                <h2 class="card__title">Configuracion Pistola</h2>
                <p class="card__description"><?php echo $row['configP']; ?>
                </p>
            </div>
            <div class="cardS">
                <img src="assets/img/bol.svg" alt="" class="specificImg"></img>
                <h2 class="card__title">Relacion de mezcla</h2>
                <p class="card__description"><?php echo $row['relacionM']; ?>
                </p>
            </div>
            <div class="cardS">
                <img src="assets/img/aire.svg" alt="" class="specificImg"></img>
                <h2 class="card__title">Presion aire</h2>
                <p class="card__description"><?php echo $row['presionA']; ?>
                </p>
            </div>
            <div class="cardS">
                <img src="assets/img/pintura.svg" alt="" class="specificImg"></img>
                <h2 class="card__title">Aplicacion</h2>
                <p class="card__description"><?php echo $row['aplicacion']; ?>
                </p>
            </div>
            <div class="cardS">
                <img src="assets/img/tiempo.svg" alt="" class="specificImg"></img>
                <h2 class="card__title">Tiempo de vida</h2>
                <p class="card__description"><?php echo $row['tiempoV']; ?>
                </p>
            </div>
        </div>

        <div class="iconLog iconito">
            <?php if (isset($_SESSION['user'])){ ?>
                <?php  if(isset($_GET['editId'])){ ?>

                <?php }else{ ?>
                    <a href="actions/saveSpecific.php?saveId=<?php echo $row['id_especificacion'];?>" class="navLink__Log">Guardar</a>
                <?php }?>
                
            <?php }else{ ?>
                <a href="pages/signC.php" class="navLink__Log">Guardar</a>
            <?php } ?>
        </div> 
    </div>

    <script src="assets/js/script.js"></script>
</body>
</html>