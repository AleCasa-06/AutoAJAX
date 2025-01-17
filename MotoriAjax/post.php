<?php
session_start(); 

$mysqli = new mysqli('localhost', 'root', '', 'auto_ajax');


$queryId = $mysqli->query("SELECT utenti.id FROM utenti WHERE utenti.nome = '$_SESSION[nome]'  " ); 
$id = $queryId->fetch_all(MYSQLI_ASSOC);



if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['insert'])){
    
    $id_user = $id[0]['id']; 
    $marca = $_POST['marca']; 
    $modello = $_POST['modello']; 
    $anno = $_POST['anno']; 
    $prezzo = $_POST['prezzo']; 
    $chilometri = $_POST['chilometraggio']; 
    $colore = $_POST['colore']; 
    $stato = $_POST['stato']; 

    $stm = $mysqli->prepare("INSERT INTO dati(marca, modello, anno, prezzo, chilometri, colore, stato, id_user) VALUES (?, ?, ?, ?, ?, ?, ?, ?)"); 
    $stm->bind_param("ssiiissi", $marca, $modello, $anno, $prezzo, $chilometri, $colore, $stato, $id_user);

    $stm->execute(); 


    
}

$resultData = $mysqli->query("
    SELECT * FROM dati INNER JOIN utenti ON dati.id_user = utenti.id
    ");

    $DataDB = $resultData->fetch_all(MYSQLI_ASSOC); 
    
     

    for ($i = 0; $i < count($DataDB); $i++){

        $esercizio = $DataDB[$i];
        
        $utente = $esercizio['nome'];

        echo "<h2>Nome Utente</h2>";
        echo "<p>".$utente."</p>";

        echo "<h2>Marca</h2>";
        echo "<p>".$esercizio['marca']."</p>";
        
        echo "<h2>Modello</h2>";
        echo "<p>".$esercizio['modello']."</p>";

        echo "<h2>Anno</h2>";
        echo "<p>".$esercizio['anno']."</p>";

        echo "<h2>Prezzo</h2>";
        echo "<p>".$esercizio['prezzo']."</p>";

        echo "<h2>Chilometri</h2>";
        echo "<p>".$esercizio['chilometri']."</p>";

        echo "<h2>Colore</h2>";
        echo "<p>".$esercizio['colore']."</p>";

        echo "<h2>Stato</h2>";
        echo "<p>".$esercizio['stato']."</p>";

    }





?>

<html>
    <head>
        <title>Post</title>
    </head>
        <body>

        </body>
</html>