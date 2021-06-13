<?php  

    if(!isset($_SESSION)){
        session_start();
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Index</title>
</head>
<body>
    <?php include 'includes/header.php' ?>


    

    <section class="partHome">

        <div class="partHome__split partHome__splitLeft">
            <h1 class="partHome__titleLeft">Bienvenido</h1>
            <div class="partHome__textContainer">
                <p class="partHome__description">MopSpecific, selecciona la marca para solicitar las especificaciones de cada modelo de pintura. Cuenta con gran variedad de marcas como...</p>
            </div>
        </div>
    
        <div class="partHome__split partHome__splitRight">
        <form id="combo" name="combo" action="specifics.php" method="POST" class="form">
                <div class="partHome_sectionSelected">
                    <div class="partHome_sectionSelectedGroup">
                        <h1 class="partHome__subtitle">Marca</h1>
                        <select id="cbx_marca" name="cbx_marca" class="partHome__select"></select>

                    </div>
                    <div class="partHome_sectionSelectedGroup">
                        <h1 class="partHome__subtitle">Modelo</h1>
                        <select id="cbx_modelo" name="cbx_modelo" class="partHome__select"></select>
                    </div>
                </div>
                <div class="partHome__btnSearch">
                    <button type="submit" name="submit" class="partHome__btnForm">Buscar</button>
                </div>
              </form>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/fetchPaint.js"></script>
    
</body>
</html>