<?php

/*$mysqli = new mysqli ("localhost", "root", "", "mopspecific");

if($mysqli->connect_errno){
    echo '<p>!Error!: <mark>'.$e->getMessage().'</mark></p>';
    die();*/

function getConn(){
    $dsn = 'mysql:host=localhost;dbname=mopspecific2';
    $user = 'root';
    $pass = '';
    
    try{
        $db = new PDO($dsn, $user, $pass);
        //echo 'conectado <br>';
        return $db;
    }catch(PDOException $e){
        echo '<p>!Error!: <mark>'.$e->getMessage().'</mark></p>';
        die();
    }
};
