<?php
session_start(); 
$servername = "localhost";
$usernameDB = "root";
$passwordDB = "";
$dbname = "auto_ajax";

$conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);


if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    
    // Verifica se l'utente esiste nel database
    $sql = "SELECT * FROM utenti WHERE nome = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    

    
    if ($result->num_rows > 0) {
        
        $row = $result->fetch_assoc();
        
        if (password_verify($password, $row['password'])) {
           
            echo "Login effettuato con successo. Benvenuto " . $username . "!";
            $_SESSION["nome"] = $username; 
            header('Location: Insert.php'); 
            
            exit();
        } else {
            
            echo "Password errata!";
        }
    } else {
        
        header('Location: registrati.php');
        exit();
    }
        
}
?>


<!DOCTYPE html>
<html>
<head>
    

    <title>Login</title>
</head>
<body>
    
    <form action="index.php" method="POST">
        <label for="username">Nome utente:</label>
        <input type="text" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
        <button type="button" onclick="vaiAPagina()">Devo registrarmi</button>
        <button type="button" onclick="ospite()">Ospite</button>
        
    </form>
    <script>
        function vaiAPagina() {
            window.location.href = 'registrati.php'; 
        }
        function ospite(){
            window.location.href = 'post.php'; 
        }
    </script>
</body>
</html>