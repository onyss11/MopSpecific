<?php  

    //require_once '../functions/function.php';
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
                    <div id="errorLog"></div>
                    <form id="formLog">
                        <h3>Ingresar</h3>
                        <input type="email" name="emailL" placeholder="Email">
                        <div id="errorEmailL"></div>
                        <input type="password" name="passwordL" placeholder="Contraseña">
                        <div id="errorPasswordL"></div>

                        <input type="submit" name="submit" value="Ingresar">
                        <!--<a href="#" class="forgot">Recuperar contraseña</a>-->
                    </form>
                </div>

                <div class="form signupForm">
                    <div id="errorRegister"></div>
                    <form id="formulary">
                        <h3>Registrar</h3>
                        <input type="text" id="nameR" name="nameR" placeholder="Ingresa tu nombre">
                        <div id="errorNameR"></div>
                        <input type="email" id="emailR" name="emailR" placeholder="Email">
                        <div id="errorEmailR"></div>
                        <input type="password" id="passwordR" name="passwordR" placeholder="Contraseña">
                        <div id="errorPasswordR"></div>
                        <input type="password" id="passwordRC" name="passwordRC" placeholder="Confirmar contraseña">
                        <div id="errorPasswordRC"></div>
                        
                        <input type="submit" value="Registrar">

                        <!-- <button type="submit">Registrar</button>                     -->
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script src="../assets/js/fetch.js"></script>
    <script src="../assets/js/login.js"></script>

</body>
</html>