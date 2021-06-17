<?php 
require_once '../functions/conexion.php';

function getModelos(){

    $db=getConn();
    $id = $_POST['idM'];
    $query = $db->prepare("SELECT * FROM modelo WHERE id_marca = :id");
    $query->bindParam(":id", $id);
    $query->execute();
    $videos = '<option hidden selected">Elige una opción</option>';
    while($row = $query->fetch(PDO::FETCH_ASSOC)){
        $videos .= "<option value='$row[id_modelo]'>$row[namMdelo]</option>";
    }
    return $videos;
}

echo getModelos();