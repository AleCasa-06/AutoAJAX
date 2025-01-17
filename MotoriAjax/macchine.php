<?php
session_start(); 

$mysqli = new mysqli('localhost', 'root', '', 'auto_ajax');


$queryId = $mysqli->query("SELECT utenti.id FROM utenti WHERE utenti.nome = '$_SESSION[nome]'  " ); 
$id = $queryId->fetch_all(MYSQLI_ASSOC);

$resultData = $mysqli->query("
    SELECT * FROM dati INNER JOIN utenti ON dati.id_user = utenti.id
    ");

    $DataDB = $resultData->fetch_all(MYSQLI_ASSOC); 

   echo json_encode($DataDB); 
    

?>