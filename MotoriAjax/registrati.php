<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auto_ajax";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); 
    
    
    $sql = "SELECT * FROM utenti WHERE nome = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Il nome utente esiste già. Scegli un altro nome.";
    } else {
        
        $sql = "INSERT INTO utenti (nome, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            
            
            header('Location: index.php');
        } else {
            echo "Errore nella registrazione.";
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../style/insert.css?v=0">
    <title>Registrazione</title>
</head>
<body>
    
    <form action="registrati.php" method="POST">
        <label for="username">Nome utente:</label>
        <input type="text" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>

        <button type="submit">Registrati</button>
        
    </form>
    
</body>
</html>