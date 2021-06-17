<?php  

    require_once '../functions/function.php';
    session_start();

    if (isset($_SESSION['user'])){
        header('Location: ../index.php');
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styleSignin.css">
    <title>Sign</title>
</head>
<body>
    
    <div class="bodySignin">
        <div class="signin_container">
            <div class="signin_blueBg">
                <div class="signinBox signin">
                    <h2>Ya tienes cuenta activa?</h2>
                    <button class="signinBtn">Ingresar</button>
                </div>
                <div class="signinBox signup">
                    <h2>No tienes cuenta?</h2>
                    <button class="signupBtn">Registrar</button>
                </div>
            </div>
            <div class="formBx">
                <div class="form signinForm">
                    <?php if (isset($_SESSION['status_errorL'])): ?>
                    <div class="alert alertError">
                        <?=$_SESSION['status_errorL']?>
                    </div>
                    <?php endif;?>
                    <form action="../actions/loginUsers.php" method="POST">
                        <h3>Ingresar</h3>
                        <input type="email" name="emailL" placeholder="Email">
                        <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'emailL') : ''; ?>

                        <input type="password" name="passwordL" placeholder="Contraseña">
                        <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'passwordL') : ''; ?>

                        <input type="submit" name="submit" value="Ingresar">
                        <!--<a href="#" class="forgot">Recuperar contraseña</a>-->
                    </form>
                </div>

                <div class="form signupForm">
                    <?php if (isset($_SESSION['status_success'])) : ?>
                        <div class="alert alertSuccess">
                            <?= $_SESSION['status_success'] ?>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['status_error'])) : ?>
                        <div class="alert alertError">
                            <?= $_SESSION['status_error'] ?>
                        </div>
                    <?php endif; ?>
                    <form action="../actions/registerUsers.php" method="POST">
                        <h3>Registrar</h3>
                        <input type="text" name="nameR" placeholder="Nombre">
                        <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'nameR') : ''; ?>
                        
                        <input type="text" name="emailR" placeholder="Email">
                        <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'emailR') : ''; ?>
                        
                        <input type="password" name="passwordR" placeholder="Contraseña">
                        <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'passwordR') : ''; ?>
                        
                        <input type="password" name="passwordRC" placeholder="Confirmar contraseña">
                        <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'passwordRC') : ''; ?>
                        
                        <input type="submit" name="submit" value="Registrar">
                    </form>
                    <?php clearErrors(); ?>
                </div>


                <!-- <div class="form signupForm">
                    <form id="formulary">
                        <h3>Registrar</h3>
                        <input type="text" name="nameR" placeholder="Ingresa tu nombre">
                        <input type="email" name="emailR" placeholder="Email">
                        <input type="password" name="passwordR" placeholder="Contraseña">
                        <input type="password" name="passwordRC" placeholder="Confirmar contraseña">
                        
                        <button type="submit">Registrar</button>                    
                    </form>
                </div> -->

            </div>
        </div>
    </div>

    <!-- <script src="../assets/js/fetch.js"></script> -->
    <script src="../assets/js/login.js"></script>

</body>
</html>