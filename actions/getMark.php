<?php 
require_once '../functions/conexion.php';

function getmarcas(){

  $db=getConn();
  $query = $db->prepare("SELECT * FROM marca ORDER BY naMarca ASC");
  $query->execute();

  $listas = '<option hidden selected>Elige una opción</option>';
  while($row = $query->fetch(PDO::FETCH_ASSOC)){
    $listas .= "<option value='$row[id_marca]'>$row[naMarca]</option>";
  }
  return $listas;
}

echo getmarcas();