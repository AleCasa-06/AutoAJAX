<html>
    <head>
        <title>Inserimento</title>
    </head>

        <body>
            <form method="post" action="index.php">
                <label for="marca">Marca</label>
                <input type="text" id="marca" name="marca" required><br>

                <label for="modello">Modello</label>
                <input type="text" id="modello" name="modello" required><br>

                <label for="anno">Anno di Produzione</label>
                <input type="number" id="anno" name="anno" min="1900" max="2025" required><br>

                <label for="prezzo">Prezzo (€)</label>
                <input type="number" id="prezzo" name="prezzo" step="500" required><br>

                <label for="chilometraggio">Chilometraggio (km)</label>
                <input type="number" id="chilometraggio" name="chilometraggio" required><br>

                <label for="colore">Colore</label>
                <input type="text" id="colore" name="colore" required><br>

                <label for="stato">Stato</label>
                <select id="stato" name="stato" required>
                    <option value="nuova">Nuova</option>
                    <option value="usata">Usata</option>
                </select><br>
                <button type="submit" value="insert">Inserisci</button>
            </form>
        </body>

</html>


<?php 

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $marca = $_POST['marca']; 
    $modello = $_POST['modello']; 
    $anno = $_POST['anno']; 
    $prezzo = $_POST['prezzo']; 
    $chilometri = $_POST['chilometraggio']; 
    $colore = $_POST['colore']; 
    $stato = $_POST['stato']; 



    $mysql = new mysqli("localhost", "root", "", "auto_ajax", 3306); 
    $stm = $mysql->prepare("INSERT INTO dati(marca, modello, anno, prezzo, chilometri, colore, stato) VALUES (?, ?, ?, ?, ?, ?, ?)"); 
    $stm->bind_param("ssiiiss", $marca, $modello, $anno, $prezzo, $chilometri, $colore, $stato);

    $stm->execute(); 
}

?>