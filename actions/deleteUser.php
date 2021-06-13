<?php
    if(isset($_GET['delId'])){
        
        require_once '../functions/conexion.php';

        if (!isset($_SESSION)) {
            session_start();
        }

        $idUser = $_GET['delId'];
        $db = getConn();

        $delUser = $db->prepare("DELETE FROM users WHERE id_user = :id_user");
        //$delUser = $db->prepare("SELECT * FROM users where email = :email");
        $delUser->bindParam(":id_user", $idUser);
        $delUser->execute();

        if($idUser){
            $_SESSION['delete'] = 'Usuario eliminado correctamente';
            header("Location: ../dashAdmin.php");
            exit();
        }else{
            $_SESSION['error'] = 'Error al eliminar';
        }
    }

    header('../dashAdmin.php');

?>