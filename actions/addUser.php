<?php

    if(isset($_POST['submit'])){

        require_once '../functions/conexion.php';

        if (!isset($_SESSION)) {
            session_start();
        }

        $name = isset($_POST['username']) ? trim($_POST['username']) : null;
        $password = isset($_POST['userpass']) ? trim($_POST['userpass']) : null;
        $email = isset($_POST['useremail']) ? trim($_POST['useremail']) : null;
        $type = isset($_POST['usertype']) ? trim($_POST['usertype']) : null;

        
        //echo 'hola '.$name.' '.$pass.' '.$email.' '.$type;

        $errors = [];
        if (empty($name) || is_numeric($name) || preg_match("/[0-9]/", $name)) {
            $errors['nameR'] = 'Es un NOMBRE no un usuario';
        }

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['emailR'] = "Eso no es un correo";
        }

        if (empty($password)) {
            $errors['passwordR'] = "Revisa tu contraseña";
        }

        if (count($errors) > 0) {
            //echo count($errors);
            $_SESSION['error'] = 'Error, Revisa los datos introducidos no pueden estar vacios!';
            $_SESSION['username'] = $name;
            $_SESSION['useremail'] = $email;
            $_SESSION['userpass'] = $password;
        }else {
            // TODO: Revisar si el usuario ya esta registrado
            $db=getConn();
            $stmtUserFound = $db->prepare("SELECT * FROM users where email = :email");
            $stmtUserFound->bindParam(":email", $email);
            $stmtUserFound->execute();
    
            $userFound = $stmtUserFound->fetch(PDO::FETCH_ASSOC);
            if ($userFound) {
                $_SESSION['error'] = "Ya esta registrado no mms";
                header("Location: ../dashAdmin.php");
                exit();
            }
    
            // insertar usuario
            $password_hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
   
            $stmt = $db->prepare("INSERT INTO users (name, password, email, id_permissions) VALUES (:name, :password, :email, :permission)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':password', $password_hash);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':permission', $type);
    
            $success = $stmt->execute();
    
            if ($success){
                $_SESSION['message'] = 'Hasta que haces algo bien, ya estas registrado';
                $_SESSION['username'] = null;
                $_SESSION['useremail'] = null;
                $_SESSION['userpass'] = null;
            }else{
                $_SESSION['error'] = 'No le muevas algo salio mal';
            } 
        }
        //$errors = [];

        /*if($name === ""){

        }*/

        /*if (empty($name) || is_numeric($name) || preg_match("/[0-9]/", $name)) {
            $errors['nameR'] = 'Es un NOMBRE no un usuario';
        }

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['emailR'] = "Eso no es un correo";
        }

        if (empty($pass)) {
            $errors['passwordR'] = "Revisa tu contraseña";
        }

        if (count($errors) > 0) {
            $_SESSION['status_error'] = "Ya estas registrado no mms";
            header("Location: ../dashAdmin.php");
            exit();
        }*/
    }

    header('Location: ../dashAdmin.php');

?>