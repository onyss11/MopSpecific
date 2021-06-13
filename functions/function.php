<?php

function showError($errors, $field){
    $alert = '';
    if(isset($errors[$field]) && !empty($field)){
        $alert = "<div class='alert alertError'>$errors[$field]</div>";
    }
    return $alert;
}

function clearErrors(){
    if(isset($_SESSION['error'])) $_SESSION['error'] = null;
    if(isset($_SESSION['update'])) $_SESSION['update'] = null;
    if(isset($_SESSION['delete'])) $_SESSION['delete'] = null;
    if(isset($_SESSION['message'])) $_SESSION['message'] = null;


    return true;
}

function clearForm(){
    if(isset($_SESSION['username'])) $_SESSION['username'] = null;
    if(isset($_SESSION['useremail'])) $_SESSION['useremail'] = null;
    if(isset($_SESSION['userpass'])) $_SESSION['userpass'] = null;

    return true;

}

?>